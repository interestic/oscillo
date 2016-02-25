@extends('layout.default')

@section('content')
    <div class="medium-6 medium-centered large-4 large-centered columns">
        <div class="row column log-in-form">
            <h1>検索画面</h1>

            {{ Form::open(array('url' => '/talent/search')) }}
            {{Form::token()}}
            <button class="button" type="submit">検索する</button>
            {{ Form::close() }}
        </div>
    </div>
@endsection