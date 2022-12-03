<!doctype html>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Payment checkout</title>
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css' rel='stylesheet'>
    <link href='' rel='stylesheet'>
    <style>
        @import url(https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap);

        body {
            background: #f5f5f5;
        }

        @media only screen and (max-width: 767px) {
            .hide-on-mobile {
                display: none;
            }
        }

        .login-box {
            background: url('https://paytech.sn/assets/srcs/img/bannerimg2.png');
            background-size: cover;
            background-position: center;
            padding: 50px;
            margin: 50px auto;
            min-height: 700px;
            -webkit-box-shadow: 0 2px 60px -5px rgba(0, 0, 0, 0.1);
            box-shadow: 0 2px 60px -5px rgba(0, 0, 0, 0.1);
        }

        .logo {
            font-family: "Script MT";
            font-size: 54px;
            text-align: center;
            color: #888888;
            margin-bottom: 50px;
        }

        .logo .logo-font {
            color: #3BC3FF;
        }

        @media only screen and (max-width: 767px) {
            .logo {
                font-size: 34px;
            }
        }

        .header-title {
            text-align: center;
            margin-bottom: 50px;
        }

        .login-form {
            max-width: 300px;
            margin: 0 auto;
        }

        .login-form .form-control {
            border-radius: 5px 5px;
            margin-bottom: 30px;
        }

        .login-form .form-group {
            position: relative;
        }

        .login-form .form-group .forgot-password {
            position: absolute;
            top: 6px;
            right: 15px;
        }

        .login-form .btn {
            border-radius: 0;
            -webkit-box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        .login-form .btn.btn-primary {
            background: #3BC3FF;
            border-color: #31c0ff;
        }

        .slider-feature-card {
            background: #fff;
            max-width: 280px;
            margin: 0 auto;
            padding: 30px;
            text-align: center;
            -webkit-box-shadow: 0 2px 25px -3px rgba(0, 0, 0, 0.1);
            box-shadow: 0 2px 25px -3px rgba(0, 0, 0, 0.1);
        }

        .slider-feature-card img {
            height: 100px;
            object-fit: cover;
            margin-top: 30px;
            margin-bottom: 30px;
        }

        .slider-feature-card h3,
        .slider-feature-card p {
            margin-bottom: 30px;
        }

        .carousel-indicators {
            bottom: -50px;
        }

        .carousel-indicators li {
            cursor: pointer;
        }
    </style>
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js'></script>
    <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js'>
    </script>
</head>

<body oncontextmenu='return false' class='snippet-body'>
    <section class="body">
        <div class="container">
            <div class="login-box">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-sm-5">
                        <div class="logo">
                            {{-- <span class="logo-font">Go</span>Snippets --}}
                            <img width="60%" height="50%" src="https://paytech.sn/assets/srcs/img/logo_paytech.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-sm-5 card">
                        <br>
                        <h3 class="header-title">Validation de Commande</h3>
                        <form class="login-form" action="{{ route('payment.submit') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="product_name" value="HP EliteBook 1030 G5" class="form-control" placeholder="Nom du produit">
                            </div>
                            <div class="form-group">
                                <input type="number" name="price" value="380000" class="form-control" placeholder="Montant">
                            </div>
                            <div class="form-group">
                                <input type="number" name="qty" value="1" class="form-control" placeholder="Quantité">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Effectuer le Paiement</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-6 hide-on-mobile">
                        <div id="demo" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ul class="carousel-indicators">
                                <li data-target="#demo" data-slide-to="0" class="active"></li>
                                <li data-target="#demo" data-slide-to="1"></li>
                            </ul>
                            <!-- The slideshow -->
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="slider-feature-card">
                                        <img src="https://paytech.sn/assets/srcs/img/ScreenshotForSlick/mobile-sc1.png" alt="">
                                        <h3 class="slider-title">Plusieurs moyens d'intégration</h3>
                                        <p class="slider-description">Nous offrons plusieurs options d’intégration simples et sécurisées pour effectuer des paiements partout dans le monde.</p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="slider-feature-card">
                                        <img src="https://paytech.sn/assets/srcs/img/new-image/paytech-7.png" alt="">
                                        <h3 class="slider-title">PAYTECH, Paiement
                                            rapide et sécurisé</h3>
                                        <p class="slider-description">PayTech propose sa plateforme sécurisée de paiement en ligne pour faciliter les transactions entre les professionnels et leurs clients, avec ou sans site Web sans redirection.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Left and right controls -->
                            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </a>
                            <a class="carousel-control-next" href="#demo" data-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script type='text/javascript'></script>
</body>

</html>
