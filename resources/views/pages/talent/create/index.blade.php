@extends('layout.default')

@section('content')
    <div class="row">
        <div class="medium-6 medium-centered large-4 large-centered columns">
            <h1>ページ登録画面</h1>
            <div class="row column log-in-form">
                {{ Form::open(array('url' => '/talent/create')) }}
                <label>名前
                    <input type="text" placeholder="孫正義">
                </label>

                <label><i class="fi-social-twitter"></i> <span data-tooltip aria-haspopup="true" class="has-tip right"
                                                               data-disable-hover='false' tabindex=1
                                                               title="正しい場合入力してください">twitter公式アカウント</span>
                    <div class="input-group">
                        <span class="input-group-label">@</span>
                        <input class="input-group-field" type="text" placeholder="masason">
                        <a class="input-group-button button" data-open="twitterModal">確認</a>
                    </div>
                </label>

                <label><i class="fi-social-facebook"></i> <span data-tooltip aria-haspopup="true" class="has-tip right"
                                                                data-disable-hover='false' tabindex=1
                                                                title="正しい場合入力してください">facebook公式アカウント</span>
                    <div class="input-group">
                        <input class="input-group-field" type="text" placeholder="masason">
                        <a class="input-group-button button" data-open="facebookModal">確認</a>
                    </div>
                </label>

                <label><i class="fi-social-instagram"></i> <span data-tooltip aria-haspopup="true" class="has-tip right"
                                                                 data-disable-hover='false' tabindex=1
                                                                 title="正しい場合入力してください">instagram公式アカウント</span>
                    <div class="input-group">
                        <input class="input-group-field" type="text" placeholder="masason">
                        <a class="input-group-button button" data-open="instagramModal">確認</a>
                    </div>
                </label>

                <label><i class="fi-page-multiple"></i> <span data-tooltip aria-haspopup="true" class="has-tip right"
                                                              data-disable-hover='false' tabindex=1
                                                              title="正しい場合入力してください">公式ブログURL</span>
                    <div class="input-group">
                        <input class="input-group-field" type="url" placeholder="http://softbank.co.jp">
                        <a class="input-group-button button" data-open="blogModal">確認</a>
                    </div>
                </label>

                {{Form::token()}}
                <button class="button" type="submit">確認</button>
                {{ Form::close() }}
            </div>
        </div>
    </div>
    <a href="/login/reminder/confirm">確認画面へ</a>

    <div class="reveal" id="twitterModal" data-reveal>
        <img class="float-center" src="http://i1.wp.com/cdnjs.cloudflare.com/ajax/libs/galleriffic/2.0.1/css/loader.gif?resize=48%2C48">
    </div>

    <div class="reveal" id="facebookModal" data-reveal>
        <img class="float-center" src="http://i1.wp.com/cdnjs.cloudflare.com/ajax/libs/galleriffic/2.0.1/css/loader.gif?resize=48%2C48">
    </div>

    <div class="reveal" id="instagramModal" data-reveal>
        <img class="float-center" src="http://i1.wp.com/cdnjs.cloudflare.com/ajax/libs/galleriffic/2.0.1/css/loader.gif?resize=48%2C48">
    </div>

    <div class="reveal" id="blogModal" data-reveal>
        <img class="float-center" src="http://i1.wp.com/cdnjs.cloudflare.com/ajax/libs/galleriffic/2.0.1/css/loader.gif?resize=48%2C48">
    </div>
@endsection

@section('js')
    <script>
        $(function(){
           $('.input-group-button').on('click',function(){
               var target_modal = $(this).attr('data-open');
               var input_val = $(this).parent().children(':input').val();
               var html ='';
               if(input_val.length>0){

//                   $.get("https://api.twitter.com/1.1/users/show.json",
//                           { screen_name: input_val},
//                           function(data){
//                               //リクエストが成功した際に実行する関数
//                               html = data;
//                           }
//                   );

                   html ='Tweets by @'+input_val;
               }else{
                   html = '<i class="fi-alert"></i>アカウント名が入力されていません';
               }

               $("#"+target_modal).html(html);
           });
        });
    </script>
@endsection