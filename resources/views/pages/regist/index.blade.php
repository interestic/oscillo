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

                    <label>Email
                        <input name="email" type="text" placeholder="somebody@example.com">
                    </label>
                    <label>Password
                        <input name="password" type="text" placeholder="Password">
                    </label>
                    <input id="show-password" type="checkbox"><label for="show-password">Show password</label>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"><br>
                    <button class="small button" name="Send" type="submit">SEND IN YOUR RESERVATION</button><br>
                    <button class="small button [success secondary alert]" name="reset" type="reset">CLEAR FORM</button>


                    <p class="text-center"><a target="_blank" href="/login/reminder">パスワードを忘れた方はこちら</a></p>
                </div>
            </form>

        </div>
    </div>

    <a href="/regist/signup">登録を開始する</a>
@endsection