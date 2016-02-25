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
        <a href="/">
            <ul class="menu">
                <li class="menu-text oscillo_logo">oscillo</li>
            </ul>
        </a>
    </div>
    <div class="top-bar-right">
        <ul class="menu">
            <!-- Authentication Links -->
            @if (Auth::guest())
                <a href="{{ url('/register') }}" class="button success">Sign up</a>
                <a href="{{ url('/login') }}" class="button">Login</a>
            @else
                <span data-toggle="account-dropdown">{{ Auth::user()->name }} <i class="fi-torso header_icon"></i></span>
            @endif
        </ul>
    </div>
</div>

<div class="dropdown-pane bottom small" id="account-dropdown" data-dropdown data-auto-focus="false">
    <a href="{{ url('/home') }}"><i class="fi-graph-trend"></i> <small>Dashboard</small></a><br>
    <a href="{{ url('/settings') }}"><i class="fi-widget"></i> <small>settings</small></a>
    <hr>
    <a href="{{ url('/logout') }}"><i class="fi-power"></i> <small>Logout</small></a>
</div>
