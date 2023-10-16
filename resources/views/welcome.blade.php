<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Global Services</title>

      <style>
        html, body {
            background-color: #fffff9;
            color: #636b6f;
            font-family: 'Open Sans', sans-serif !important;
            font-weight: 700;
            height: 100vh;
            margin: 0;
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
            font-size: 45px;
        }

        .title a {
            font-family: "Open Sans";
            font-weight: 900;

        }

        .title img{
            width: 100%;
        }

        @media only screen and (max-width: 767px){
         .title img{
            width: 100%;
        }   
        
        .links a{
            font-size:18px!important;
        }
    }

    .links a {
        color: #fff;
        padding: 0 35px;
        font-size: 20px;
        font-weight: bold;
        text-decoration: none;
        text-transform: uppercase;
        font-family:'Open sans';
        background:#00a1c3;
        padding:0.5em 1.5em;
        border-radius:0px;
        letter-spacing:1.5px;
    }
    
    .links a:hover{
        
        background:#ec3e02;
        
    }


        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
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
                <div class="title">
                    <div>
                        <div style="margin-bottom: -1%">
                            <img src="{{ URL::to('img/logo.jpeg') }}">
                        </div>

                        <div class="links" style="margin-left: -8%">

                            <a href="localhost:8000/admin/" target="_blank"> Administration </a>

                        </div>
                    </div>
                </div>
    </body>
</html>
