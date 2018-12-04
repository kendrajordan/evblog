<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
          <link href='https://fonts.googleapis.com/css?family=Electrolize' rel="stylesheet"type="text/css">
          <link href="https://fonts.googleapis.com/css?family=Electrolize|Roboto:400,700" rel="stylesheet">
        <!-- Styles -->
        <style>
            html, body {
                background-image: url(https://c1cleantechnicacom-wpengine.netdna-ssl.com/files/2017/09/electric-car-fleet.jpg);
                background-repeat:no-repeat;
                background-size:contain;
                background-position:center;
                background-size: cover;
                height: auto;
                width: 100%;
                color: #FCBA04;
                font-family: 'Electrolize', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
                position: relative;
            }
            .color-overlay{
              background-color:#008ED1;
              width:100%;
              height: 100%;
              opacity: .3;
              position: absolute;
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
                z-index: 5;
            }

            .content {
                text-align: center;
                z-index: 5;
            }

            .title {
                font-size: 84px;
                z-index: 10;
            }


            .links > a {
                color: #FCBA04;
                padding: 0 25px;
                font-size: 1.2rem;
                font-weight: bold;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
                font-weight: bold;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>

        <div class="flex-center position-ref full-height opacity">

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
            <div class="color-overlay"></div>
            <div class="content">
                <div class="title m-b-md ">
                  Electric Drift
                </div>



            </div>
        </div>

    </body>
</html>
