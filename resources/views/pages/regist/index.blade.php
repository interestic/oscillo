@extends('layout.default')

@section('content')

    <div class="row">
        <div class="medium-6 medium-centered large-4 large-centered columns">

            <form action="/regist" method="post">
                <div class="row column log-in-form">
                    <h4 class="text-center">登録開始画面</h4>

                    <a href="{{$facebook_link}}"><i class="fi-social-facebook"></i> facebookで登録</a><br>
                    <a href="{{$github_link}}"><i class="fi-social-github"></i> githubで登録</a><br>
                    <a href="{{$twitter_link}}"><i class="fi-social-twitter"></i> twitterで登録</a><br>
                    <a href="/regist/signup"><i class="fi-mail"></i> メールアドレスで登録</a><br>

                </div>
            </form>

        </div>
    </div>

    <a href="/regist/signup">登録を開始する</a>
@endsection