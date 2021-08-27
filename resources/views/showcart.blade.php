<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <title>Klassy Cafe - Restaurant HTML Template</title>
    <!--
    
TemplateMo 558 Klassy Cafe

https://templatemo.com/tm-558-klassy-cafe

-->
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-klassy-cafe.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">

</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->


    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">
                            <img src="assets/images/klassy-logo.png" align="klassy cafe html template">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="{{url('/redirect')}}" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="{{url('/redirect')}}">About</a></li>

                            <li class="scroll-to-section"><a href="{{url('/redirect')}}">Menu</a></li>
                            <li class="scroll-to-section"><a href="{{url('/redirect')}}">Chefs</a></li>
                           
                            <!-- <li class=""><a rel="sponsored" href="https://templatemo.com" target="_blank">External URL</a></li> -->
                            <li class="scroll-to-section"><a href="#reservation">Contact Us</a></li>

                            <li> @if (Route::has('login'))
                                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                                    @auth
                            <li>
                                <x-app-layout></x-app-layout>
                            </li>
                            @else
                            <li> <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a> </li>

                            @if (Route::has('register'))
                            <li> <a href="{{ route('register') }}"
                                    class="ml-4 text-sm text-gray-700 underline">Register</a> </li>
                            @endif
                            @endauth
                </div>
                @endif
                </li>
                </ul>
                <!-- <a class='menu-trigger'>
                            <span>Menu</span>
                        </a> -->
                <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->


    <div id="top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12" id="table_form" style="margin:auto;display:block; align:center;">
                    <div class="col-md-8 center">
                        <table class="table thead-dark table-striped">
                            <thead>
                                <tr>
                                    <th>Action</th>
                                    <th>Food name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $total =0;
                                @endphp
                                @foreach($data as $data)
                                @php
                                $_total = ($data->quantity)*($data->price);
                                $total = $total+$_total;
                                @endphp
                                <tr>
                                    <td><a href="{{url('/removecart',$data->cid)}}">Remove</a></td>
                                    <td>{{$data->title}}</td>
                                    <td>${{$data->price}}</td>
                                    <td>{{$data->quantity}}</td>
                                    <td>${{$_total}}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="4"><b>Total Price</b></td>
                                    <td>${{$total}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-4">
                        <input type="button" value="Order Now" id="order_now"
                            style="background: #fb5849; color: aliceblue;padding: 5px;">
                    </div>
                </div>
                <div class="col-md-6" style="display:none; align:center;" id="order_form">
                    <form action="{{url('/order')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name"
                                aria-describedby="name" placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea type="text" class="form-control" name="address" rows="3" id="address"
                                aria-describedby="address" placeholder="Enter Address"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="tel" class="form-control" name="phone" id="phone"
                                aria-describedby="phone" placeholder="Enter phone">
                        </div>
                        <input type="submit" class="btn btn-success" name="submit" value="Order Confirm">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-xs-12">
                    <div class="right-text-content">
                        <ul class="social-icons">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="logo">
                        <a href="index.html"><img src="assets/images/white-logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-4 col-xs-12">
                    <div class="left-text-content">
                        <p>© Copyright Klassy Cafe Co.

                            <br>Design: TemplateMo
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script>
        $("#order_now").click(function(){
            $("#order_form").show();
            $("#table_form").hide();
        })
    </script>
    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/datepicker.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/lightbox.js"></script>
    <script src="assets/js/isotope.js"></script>

    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>
    <script>
    $(function() {
        var selectedClass = "";
        $("p").click(function() {
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
            $("#portfolio div").not("." + selectedClass).fadeOut();
            setTimeout(function() {
                $("." + selectedClass).fadeIn();
                $("#portfolio").fadeTo(50, 1);
            }, 500);

        });
    });
    </script>
</body>

</html>