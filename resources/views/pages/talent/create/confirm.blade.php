@extends('layout.default')

@section('content')
<div class="medium-6 medium-centered large-4 large-centered columns">

    {{ Form::open(array('url' => '/talent/create/confirm')) }}
        <div class="row column log-in-form">
            <h4 class="text-center">ページ登録画面(確認)</h4>
            <label>こちらでよろしいですか？<label>
                <blockquote>
                    somebody@example.com
                </blockquote>

            </label>
            <input type="submit" class="button expanded">
        </div>
    {{Form::close()}}

</div>
    <a href="/login/reminder/done">完了画面へ</a>
@endsection