@extends('layout.default')

@section('content')

    <div class="row">
        <div class="medium-6 medium-centered large-4 large-centered columns">

            <div class="row column">
                <h4 class="text-center">今どんな気分？</h4>

                <div class="floor">

                </div>

                <div class="button_menu">
                    <div class="row">
                        <div class="small-2 columns">
                            <span class="button alert hollow fontelico-emo-angry seed" value="1"></span>
                        </div>
                        <div class="small-2 columns">
                            <span class="button secondary hollow fontelico-emo-unhappy seed" value="2"></span>
                        </div>
                        <div class="small-2 columns">
                            <span class="button  hollow fontelico-emo-tongue seed" value="3"></span>
                        </div>
                        <div class="small-2 columns">
                            <span class="button hollow fontelico-emo-cry seed" value="4"></span>
                        </div>
                        <div class="small-2 columns">
                            <span class="button alert hollow fontelico-emo-devil seed" value="5"></span>
                        </div>
                        <div class="small-2 columns">
                            <span class="button secondary hollow fontelico-emo-displeased seed" value="6"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="small-2 columns">
                            <span class="button warning hollow fontelico-emo-grin seed" value="7"></span>
                        </div>
                        <div class="small-2 columns">
                            <span class="button success hollow fontelico-emo-happy seed" value="8"></span>
                        </div>
                        <div class="small-2 columns">
                            <span class="button warning hollow fontelico-emo-laugh seed" value="9"></span>
                        </div>
                        <div class="small-2 columns">
                            <span class="button secondary hollow fontelico-emo-sleep seed" value="10"></span>
                        </div>
                        <div class="small-2 columns">
                            <span class="button warning hollow fontelico-emo-squint seed" value="11"></span>
                        </div>
                        <div class="small-2 columns">
                            <span class="button success hollow fontelico-emo-surprised seed" value="12"></span>
                        </div>
                    </div>
                </div>
                {{--<span class="button success hollow fontelico-emo-wink"></span>--}}
                {{--<span class="button success hollow fontelico-emo-beer"></span>--}}
                {{--<span class="button success hollow fontelico-emo-coffee"></span>--}}
                {{--<span class="button success hollow fontelico-emo-saint"></span>--}}
                {{--<span class="button success hollow fontelico-emo-sunglasses"></span>--}}
                {{--<span class="button success hollow fontelico-emo-thumbsup"></span>--}}
                {{--<span class="button success hollow fontelico-emo-wink2"></span>--}}

                {{--<a href="/talent/search">探す</a>--}}

            </div>

            {{--<div id="wheelDiv"></div>--}}
        </div>
    </div>

@endsection

@section('js')
    <script>
        $(function () {
            $('.seed').on('click', function () {
                var seed_value = $(this).attr('value');
                $.ajax({
                    url: '/api/seedlog',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        user_id: <?php echo $user_id?>,
                        seed: seed_value,
                        _token: '<?php echo csrf_token();?>'
                    },
                    timeout: 10000,
                    success: function (data) {
                        if (data['status'] == true) {

                            var attr_class = $('span[value $= '+data['seed']+']').attr('class');
                            var seed = '<span class="'+attr_class+'"></span><span class="badge">'+data['count']+'</span><br>';
//                            $('.floor').hide();
                            $('.floor').prepend(seed).fadeIn('slow');
//                            $('.floor').slidetoggle();
                            console.log(data['seed'], data['count']);
                        }
                    },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        alert("error");
                    }
                })
            })
        })
    </script>
@endsection
