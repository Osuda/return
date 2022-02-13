<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>You must return!</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    
    @extends('layouts.app')　
    @section('content')
    
    <body>
        <h2 class='main'><i class="far fa-lightbulb"></i><span>{{ $who }}から借りたもの一覧</span></h2>
                
        <div class='things_index'>
            
            <div class='things_type'>
            <h3 class='type_thing'><もの></h3>
            <h3 class='type_money'><お金></h3>
            </div>
            <div class='things_of_all'>
            
            <!--もの-->
            <div class='thing_of_things'>
            @foreach ($things as $index=>$thing)
                
                @if ($thing->type == 'もの')
                    <div class='box_1'>
                    <div class="box_1_tape"> </div>
                    <p class="box_1_title"><p class='thing_id'>{{ $index+1 }}</p></p>
                    <p class="box_1_text">
                        <p class='thing'>何を：{{ $thing->thing }}</p>
                        <p class='to_when'>返す日：{{ $thing->to_when }}</p>
                        [<a href='/things/{{ $thing->id }}'>詳細</a>]
                    </div>    
                @endif
                    
            @endforeach
            </div>
    
            
            <!--お金-->
            <div class='money_of_things'>
            
                <div class='総計'>[総計:{{$things_total_cost}}円]</div>
                
            @foreach ($things as $index=>$thing)
                
                @if ($thing->type == 'お金')
                    <div class='box_1'>
                    <div class="box_1_tape"> </div>
                    <p class="box_1_title"><p class='thing_id'>{{ $index+1 }}</p></p>
                    <p class="box_1_text">
                        <p class='costs'>金額：{{ $thing->costs }}円</p>
                        <p class='to_when'>返す日：{{ $thing->to_when }}</p>
                    [<a href='/things/{{ $thing->id }}'>詳細</a>]
                    </div>
                @endif
                    
            @endforeach
            </div>
        </div>       
        <div class='戻る'>[<a href='/things'>戻る</a>]</class></div>
    </body>
    @endsection
</html>