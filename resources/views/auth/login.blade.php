

<!DOCTYPE html>



<html>



    <style>img[alt="www.000webhost.com"]{display:none;}.disclaimer{

		      opacity: 0;



		}</style>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description"

        content="Erratum – Multi purpose error page template for Service, corporate, agency, Consulting, startup.">

    <meta name="keywords" content="Error page 404, page not found design, wrong url">

    <meta name="author" content="Ashishmaraviya">

    <link rel="icon" href="{{ asset('assets/images/icon.png') }}" type="image/x-icon" />

    <link rel="shortcut icon" href="{{ asset('assets/images/icon.png') }}" type="image/x-icon" />

    <title>Xác Nhận</title>

    <!--Google font-->

    <link

        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;F8AFAB1,300&display=swap"

        rel="stylesheet">

    <!-- Bootstrap css -->

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/fontawesome.css') }}">

    <!-- Theme css -->

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/login.css') }}">

</head>



<body>

    <!-- 01 Preloader -->

    <div class="loader-wrapper" id="loader-wrapper">

        <div class="loader"></div>

    </div>

    <!-- Preloader end -->

    <!-- 02 Main page -->

    <section class="page-section login-page">

        <div class="full-width-screen">

            <div class="container-fluid p-0">

                <div class="particles-bg" id="particles-js">

                    <div class="content-detail">

                        <!-- Login form -->

                        <form action="{{ route('login') }}" class="login-form" method="post" style='background:#DCCCBD'>

                            @csrf

                            <div class="imgcontainer">

                                <img src="{{ asset('assets/images/logo-01.png') }}" style='width:80%' alt="Avatar" class="avatar">

                            </div>

                            <div class="input-control">

                                <div class="mb-3 row">

                                    <div class="col-md-12">

                                        <input placeholder="Nhập Email" id="email" style='background:#F4E5D7' type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')

                                            <span class="invalid-feedback" role="alert">

                                                <strong>{{ $message }}</strong>

                                            </span>

                                        @enderror

                                    </div>

                                </div>

                                <div class="mb-3 row">

                                    <div class="col-md-12">

                                        <input placeholder="Nhập Pass" id="password" type="password" style='background:#F4E5D7' class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                        @error('password')

                                            <span class="invalid-feedback" role="alert">

                                                <strong>{{ $message }}</strong>

                                            </span>

                                        @enderror

                                    </div>

                                </div>

                                <div class="login-btns" style='width:100%'>

                                    <button type="submit" name='login' style='background:black;'>Xác Nhận</button>

                                </div>



                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- latest jquery-->

    <script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>

    <!-- theme particles script -->

    <script src="{{ asset('assets/js/particles.min.js') }}"></script>

    <script src="{{ asset('assets/js/app.js') }}"></script>

    <!-- Theme js-->

    <script src="{{ asset('assets/js/script.js') }}"></script>

</body>



</html>

