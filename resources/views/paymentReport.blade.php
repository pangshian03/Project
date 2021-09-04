<!DOCTYPE html>
<html>
<head>
    <title>Southern Cart</title>

    <style>
        table {
            border: 1px solid black;
            text-align: center;
            border-collapse: collapse;
        }

        th {
            border: 1px solid black;
            padding: 5px;
        }

        td {
            border: 1px solid black;
            padding: 5px;
        }
    </style>
</head>
<body>
    
<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
        <br><br>
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Payment Report</h2></div>
                    <div class="col-sm-4">
                    </div>
                </div> 
            </div>
            <table class="table table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>IC Number</th>
                        <th>Amount</th>
                        <th>Date Time</th>
                    </tr>
                </thead>
             
                <tbody>
                    @foreach($payments as $payment)
                    <tr>
                        <td style="text-align:center;">{{$payment->id}}</td>
                        <td style="text-align:center;">{{$payment->icNo}}</td>
                        <td style="text-align:center;">{{$payment->amount}}</td>
                        <td style="text-align:center;">{{$payment->created_at}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-sm-1"></div>
</div>
</body>
</html>