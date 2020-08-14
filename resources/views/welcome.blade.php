<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .banner {
                position: relative;
                z-index: 5;
                height: 300px;
                width: full;
                color: #000;
                font-size: 400%;
                padding: 20px;
            }

            .banner .bg {
                position: absolute;
                z-index: -1;
                top: 0;
                bottom: 0;
                left: 0;
                right: 0;
                background: url(https://www.lecontemedicalcenter.com/wp-content/uploads/sites/2/2018/08/Untitled-design-9.png) center center;
                opacity: .4;
                    width: 100%;
                    height: 100%;
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
                font-size: 88px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 100px;
            }
        </style>
    </head>
    <body>
        <div class="banner">
        <div class="flex-center position-ref full-height">
                <div class="bg"></div>            
            
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Shinier App
                </div>

                <div class="links">
                    <a href="https://shinier.com.br/">Shinier</a>
                    <a href="https://github.com/alysson-oliveira/Shinier-Challenge">GitHub</a>
                </div>
            </div>
        </div>
        </div>
    </body>
</html>
