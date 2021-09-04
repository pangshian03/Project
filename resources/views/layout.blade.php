<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Southern Hospital</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
    .background-image {
        background-image: url("https://aws1.discourse-cdn.com/pocketgems/uploads/episodeinteractive/optimized/3X/0/b/0b895600d51df923cba932bdcaff2cbad8816d95_2_690x366.jpeg");
        min-height: 450px;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        position: relative;
    }

    .mask {
        background-image: url("https://www.solidbackgrounds.com/images/1920x1080/1920x1080-black-solid-color-background.jpg");
        width: 100%;
        opacity: 0.7;
    }

    .containerA {
        margin: 20px;
        width: auto;
        position: absolute;
    }

    .navbar-nav {
        overflow: hidden;
    }

    .navbar-nav a {
        color: #f2f2f2;
        text-decoration: none;
        font-size: 17px;
    }

    .navbar-nav a:hover {
        color: grey;
    }

    .icons a {
        text-decoration: none;
    }

    .landing-page-text {
        display: flex;
        justify-content: center;
        font-size: 60px;
        padding: 70px 0;
        color: white
    }
    </style>
</head>

<body>
    <div class="background-image" style="display: flex;justify-content: center;">
        <div class="mask" style="display: flex;justify-content: center;">
            <div class="containerA">
                <div class="navbar-nav navbar-expand-lg">
                    <img src="data:image/png;base64,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"
                        alt="" class="rounded-circle" width="70">&nbsp
                    <p class="navbar-brand" style="font-size: 22px;color: white;">Southern Hospital</p>
                    <a class="nav-link ml-3" href="Home">HOME</a>
                    <a class="nav-link ml-5" href="insertPatient">PATIENT</a>
                    <a class="nav-link ml-5" href="insertBed">HOSPITAL BED</a>
                    <a class="nav-link ml-5" href="makePayment">PAYMENT</a>

                    <form class="form-inline my-2 my-lg-0 ml-5" action="{{route('search.patient')}}" method="post">
                        @csrf
                        <input class="form-control" type="search" name="keyword" id="keyword" placeholder="Search here"
                            aria-label="search">
                        <button class="btn btn-outline-dark my-2 my-sm-0 ml-2" type="submit"><i
                                class="fa fa-search"></i></button>
                    </form>
                </div>
                <br>
                <div id="welcome-text"></div>
            </div>
        </div>
    </div>
    @yield('content')
    <footer class="text-center text-white" style="background-color: #111f26;">
        <div class="text-center p-4">
            <p><i class="fa fa-mobile" aria-hidden="true"></i>&nbspContact Us</p>
            <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" width="170px">
            <div class="row">
                <div class="col-2 text-center mb-4">
                    <a href="#"><i class="fa fa-facebook fa-3x text-info"></i></a>
                </div>
                <div class="col-2 text-center mb-4">
                    <a href="#"><i class="fa fa-youtube fa-3x text-danger"></i></a>
                </div>
                <div class="col-2 text-center mb-4">
                    <a href="#"><i class="fa fa-instagram fa-3x text-warning"></i></a>
                </div>
                <div class="col-2 text-center mb-4">
                    <a href="#"><i class="fa fa-weixin fa-3x text-success"></i></a>
                </div>
                <div class="col-2 text-center mb-4">
                    <a href="#"><i class="fa fa-linkedin-square fa-3x text-info"></i></a>
                </div>
                <div class="col-2 text-center mb-4">
                    <a href="#"><i class="fa fa-twitter fa-3x text-primary"></i></a>
                </div>
            </div>
            <div class="feedback mb-4">
                <p><i class="fa fa-commenting-o text-center" aria-hidden="true"></i>&nbspFeedback</p>
                <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" width="170px">
                <div class="form-floating">
                    <div class="row">
                        <div class="col-4"></div>
                        <div class="col-4">
                            <textarea class="form-control w-100 h-400" placeholder="Leave a comment here"
                                id="comments"></textarea>
                            <div class="p-3">
                                <button class="btn btn-outline-light my-2 my-sm-0" type="submit"><i
                                        class="fa fa-edit"></i></button>
                            </div>
                        </div>
                        <div class="col-4"></div>
                    </div>
                </div>
            </div>
            <div class="resources">
                <p><i class="fa fa-info-circle" aria-hidden="true"></i>&nbspResources</p>
                <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" width="170px">
                <div class="row d-flex justify-content-center">
                    <div class="col-auto">
                        <p class="text-center" style="float: left;">Subscribe to our new letter</p>&nbsp
                    </div>
                    <form class="form-inline my-2 my-lg-0" action="" method="post">
                        <div class="col-md-5 col-12">
                            <input class="form-control" type="text" name="email" id="email"
                                placeholder="Enter email address">
                        </div>
                        <div class="col-md-5 col-12 ml-2">
                            <button class="btn btn-outline-light my-2 my-sm-0 ml-5" type="submit"><i
                                    class="fa fa-envelope"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="text-center p-2" style="background-color:#0F1B22;">
            <p>All contents © Southern Hospital</p>
        </div>
    </footer>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>

</body>

</html>