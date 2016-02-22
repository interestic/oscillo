@extends('layout.default')

@section('content')



    <div class="row">
        <div class="medium-6 medium-centered large-4 large-centered columns">

            <form>
                <div class="row column log-in-form">
                    <h4 class="text-center">登録開始画面</h4>
                    <label>Email
                        <input type="text" placeholder="somebody@example.com">
                    </label>
                    <label>Password
                        <input type="text" placeholder="Password">
                    </label>
                    <input id="show-password" type="checkbox"><label for="show-password">Show password</label>
                    <p><a type="submit" class="button expanded">Log In</a></p>
                    <p class="text-center"><a target="_blank" href="/login/reminder">パスワードを忘れた方はこちら</a></p>
                </div>
            </form>

        </div>
    </div>

    <a href="/regist/signup">登録を開始する</a>
@endsection