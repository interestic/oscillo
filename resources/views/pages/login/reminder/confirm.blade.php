@extends('layout.default')

@section('content')
<div class="medium-6 medium-centered large-4 large-centered columns">

    <form>
        <div class="row column log-in-form">
            <h4 class="text-center">リマインダー画面(確認)</h4>
            <label>こちらでよろしいですか？<label>
                <blockquote>
                    somebody@example.com
                </blockquote>

            </label>
            <p><a type="submit" class="button expanded">送信</a></p>
        </div>
    </form>

</div>
    <a href="/login/reminder/done">完了画面へ</a>
@endsection