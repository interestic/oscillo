@extends('layout.default')

@section('content')
<div class="row">
    <div class="medium-6 medium-centered large-4 large-centered columns">

        <form>
            <div class="row column log-in-form">
                <h4 class="text-center">リマインダー画面(入力)</h4>
                <label>Email
                    <input type="text" placeholder="somebody@example.com">
                </label>
                <p><a type="submit" class="button expanded">確認</a></p>
            </div>
        </form>

    </div>
</div>

    <a href="/login/reminder/confirm">確認画面へ</a>
@endsection