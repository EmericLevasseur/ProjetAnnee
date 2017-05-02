<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                color: white;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
                background: #2980b9 url('http://static.tumblr.com/03fbbc566b081016810402488936fbae/pqpk3dn/MRSmlzpj3/tumblr_static_bg3.png') repeat 0 0;
                -webkit-animation: 10s linear 0s normal none infinite animate;
                -moz-animation: 10s linear 0s normal none infinite animate;
                -ms-animation: 10s linear 0s normal none infinite animate;
                -o-animation: 10s linear 0s normal none infinite animate;
                animation: 10s linear 0s normal none infinite animate;
            }


            @-webkit-keyframes animate {
            	from {background-position:0 0;}
            	to {background-position: 500px 0;}
            }

            @-moz-keyframes animate {
            	from {background-position:0 0;}
            	to {background-position: 500px 0;}
            }

            @-ms-keyframes animate {
            	from {background-position:0 0;}
            	to {background-position: 500px 0;}
            }

            @-o-keyframes animate {
            	from {background-position:0 0;}
            	to {background-position: 500px 0;}
            }

            @keyframes animate {
            	from {background-position:0 0;}
            	to {background-position: 500px 0;}
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: white;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Accueil</a>
                        <a href="{{ url('/article') }}">Articles</a>
                    @else
                        <a href="{{ url('/login') }}">Connexion</a>
                        <a href="{{ url('/register') }}">Inscription</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Forum des articles de l'IIM
                </div>
            </div>
        </div>
    </body>
</html>
