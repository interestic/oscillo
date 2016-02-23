<!doctype html>
<html class="no-js" lang="ja">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>oscillo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/foundation/6.1.2/foundation.min.css">
    <link rel="stylesheet" crossorigin="anonymous" integrity="sha256-RYMme8QITYCPWDLzOXswkTsPu1tjeAE2Myb7Kid/JBY="
          href="https://cdn.jsdelivr.net/foundation-icons/3.0/foundation-icons.min.css">
    <link href='https://fonts.googleapis.com/css?family=Josefin+Sans:700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="/css/app.css">
    <style>

    </style>
</head>
<body>

<div class="top-bar">
    <div class="top-bar-left">
        <ul class="menu">
            <li class="menu-text oscillo_logo">oscillo</li>
        </ul>
    </div>
    <div class="top-bar-right">
        <ul class="menu">
            <!-- Authentication Links -->
            @if (Auth::guest())
                <a href="{{ url('/register') }}" class="button success">Sign up</a>
                <a href="{{ url('/login') }}" class="button">Login</a>
            @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                    </ul>
                </li>
            @endif

        </ul>
    </div>
</div>