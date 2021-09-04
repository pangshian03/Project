@extends('layout')
@section('content')
<script>
function cal() {
    var name = document.getElementsByName('subtotal[]');
    var subtotal = 0;
    var tax = 0;
    var total = 0;
    var cboxes = document.getElementsByName('cid[]');
    var len = cboxes.length;
    for (var i = 0; i < len; i++) {
        if (cboxes[i].checked) {
            subtotal = parseFloat(name[i].value) + parseFloat(subtotal);
        }
    }
    document.getElementById('sub').value = subtotal.toFixed(2);
}
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@if(Session::has('success'))
<div class="alert alert-success" role="alert">
    {{Session::get('success')}}
</div>
@endif
<div class="container">
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <table class="table">
                <h3 class="text-center p-3">Payment List</h3>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>IC Number</th>
                        <th>Amount</th>
                        <th>Note</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <form action="{{ route('payment.post') }}" method="post" class="require-validation"
                    data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                    @csrf
                    <tbody>
                        @foreach($payments as $payment)
                        <tr>
                            <td><input type="checkbox" name="cid[]" id="cid[]" value="{{$payment->id}}"
                                    onclick="cal()"><input type="hidden" name="subtotal[]" value="{{$payment->amount}}">
                            </td>
                            <td>{{$payment->icNo}}</td>
                            <td>{{$payment->amount}}</td>
                            <td>{{$payment->note}}</td>
                            <td>
                                <a href="{{route('delete.Record',['id'=>$payment->id]) }}" class="delete btn btn-danger" title="Delete"
                                    data-toggle="tooltip"><i class="fa fa-trash" aria-hidden="true">&nbsp Delete</i></a>
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="3"></td>
                            <td align="right">Total:</td>
                            <td>RM<input type="text" value="0.00" name="sub" id="sub" size="7" readonly></td>
                        </tr>
                    </tbody>
            </table>
            <div class="col-sm-1"></div>

            <div class="col-sm-12">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="panel panel-default credit-card-box">
                            <div class="panel-heading">
                                <div class="row">
                                    <h3>Card Payment</h3>
                                </div>
                            </div>
                            <div class="panel-body">
                                <br>
                                <div class='form-row row'>
                                    <div class='col-xs-12 col-md-6 form-group required'>
                                        <label class='control-label'>Name on Card</label>
                                        <input class='form-control' size='4' type='text'>
                                    </div>
                                    <div class='col-xs-12 col-md-6 form-group required'>
                                        <label class='control-label'>Card Number</label>
                                        <input autocomplete='off' class='form-control card-number' size='20'
                                            type='text'>
                                    </div>
                                </div>
                                <div class='form-row row'>
                                    <div class='col-xs-12 col-md-4 form-group cvc required'>
                                        <label class='control-label'>CVC</label>
                                        <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311'
                                            size='4' type='text'>
                                    </div>
                                    <div class='col-xs-12 col-md-4 form-group expiration required'>
                                        <label class='control-label'>Expiration Month</label>
                                        <input class='form-control card-expiry-month' placeholder='MM' size='2'
                                            type='text'>
                                    </div>
                                    <div class='col-xs-12 col-md-4 form-group expiration required'>
                                        <label class='control-label'>Expiration Year</label>
                                        <input class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                            type='text'>
                                    </div>
                                </div>
                                {{--
                                    <div class='form-row row'>
                                        <div class='col-md-12 error form-group hide'>
                                            <div class='alert-danger alert'>Please correct the errors and try again.</div>
                                        </div>
                                    </div> 
                                --}}
                                <div class="form-row row">
                                    <div class="col-xs-12">
                                        <button class="btn btn-primary btn-xs btn-block" type="submit">Pay Now</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </br>
            </div>
        </div>
        </form>
    </div>
</div>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
$(function() {
    var $form = $(".require-validation");
    $('form.require-validation').bind('submit', function(e) {
        var $form = $(".require-validation"),
            inputSelector = ['input[type=email]', 'input[type=password]', 'input[type=text]',
                'input[type=file]', 'textarea'
            ].join(', '),
            $inputs = $form.find('.required').find(inputSelector),
            $errorMessage = $form.find('div.error'),
            valid = true;
        $errorMessage.addClass('hide');
        $('.has-error').removeClass('has-error');
        $inputs.each(function(i, el) {
            var $input = $(el);
            if ($input.val() === '') {
                $input.parent().addClass('has-error');
                $errorMessage.removeClass('hide');
                e.preventDefault();
            }
        });
        if (!$form.data('cc-on-file')) {
            e.preventDefault();
            Stripe.setPublishableKey($form.data('stripe-publishable-key'));
            Stripe.createToken({
                number: $('.card-number').val(),
                cvc: $('.card-cvc').val(),
                exp_month: $('.card-expiry-month').val(),
                exp_year: $('.card-expiry-year').val()
            }, stripeResponseHandler);
        }
    });

    function stripeResponseHandler(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            /* token contains id, last4, and card type */
            var token = response['id'];
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }
});
</script>
@endsection