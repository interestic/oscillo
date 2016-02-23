@extends('layout.default')

@section('content')
<div class="row">
    <div class="medium-6 medium-centered large-4 large-centered columns">

        {{ Form::open(array('url' => '/regist/signup')) }}
        <div class="row column log-in-form">
            <h4 class="text-center">登録画面(入力)</h4>

            <label>Email
                {{Form::text('email', \Illuminate\Support\Facades\Input::old('email'),['placeholder'=>'somebody@example.com'])}}
            </label>
            <label>Password
                {{Form::password('password', \Illuminate\Support\Facades\Input::old('password'),['placeholder'=>'Password'])}}
            </label>
            {{Form::token()}}

            <button class="small button" name="Send" type="submit">SEND IN YOUR RESERVATION</button><br>
            <button class="small button [success secondary alert]" name="reset" type="reset">CLEAR FORM</button>

        </div>
        {{ Form::close() }}

    </div>
</div>

    <a href="/regist/signup/confirm">確認画面へ</a>
@endsection