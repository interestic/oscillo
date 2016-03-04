@extends('layout.default')

@section('content')

    <div class="row collapse">
        <div class="medium-3 columns">
            <ul class="tabs vertical" id="example-vert-tabs" data-tabs>
                <li class="tabs-title is-active"><a href="#panel1v" aria-selected="true">プロフィール</a></li>
                <li class="tabs-title"><a href="#panel2v">アカウント</a></li>
                <li class="tabs-title"><a href="#panel3v">ソーシャル</a></li>
            </ul>
        </div>
        <div class="medium-9 columns">
            <div class="tabs-content vertical" data-tabs-content="example-vert-tabs">
                <div class="tabs-panel is-active" id="panel1v">
                    <ul>
                        <li>avtar</li>
                        <li>name</li>
                        <li>Email</li>
                        <li>URL</li>
                        <li>Company</li>
                        <li>Location</li>
                    </ul>
                </div>
                <div class="tabs-panel" id="panel2v">
                    old password
                    <input type="text">
                    new password
                    <input type="text">
                    confirm password
                    <input type="text">
                </div>
                <div class="tabs-panel" id="panel3v">

                    <a href="{{--$facebook_link--}}">
                        <div class="button"><i class="fi-social-facebook"></i> facebook連携</div>
                    </a>
                    <br>
                    <a href="{{--$github_link--}}">
                        <div class="button"><i class="fi-social-google-plus"></i> google+連携</div>
                    </a>
                    <br>
                    <a href="{{--$twitter_link--}}">
                        <div class="button"><i class="fi-social-twitter"></i> twitter連携</div>
                    </a>
                    <br>
                    <a href="{{--$twitter_link--}}">
                        <div class="button"><i class="fi-social-twitter"></i> moves連携</div>
                    </a>
                    <br>
                </div>
            </div>
        </div>
    </div>
@endsection