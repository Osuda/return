<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>You must return!</title>
        <!-- Fonts -->
        <link href="https:fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/style_things.css') }}">
    </head>
    
    @extends('layouts.app')　
    @section('content')
    
    <body class='things_index'>
        <h2 class='main'><i class="far fa-lightbulb"></i><span>借りもの一覧</span></h2>
        <div class='returned_things'>[<a href='/things/returned'>返却済み一覧</a>]</class></div>
            
            <div class='things_type'>
            <h3 class='type_thing'><もの></h3>
            <h3 class='type_money'><お金></h3>
            </div>
        <div class='things_of_all'>
            <!--もの-->
            <div class='thing_of_things'>
           
            @foreach ($things as $index=>$thing)

                <div class='box_1'>
                <div class="box_1_tape"> </div>
                <p class="box_1_title"><p class='thing_id'>{{ $index+1 }}</p></p>
                <p class="box_1_text">   
                        <p class='thing'>何を:{{ $thing->thing }}</p>
                        <p class='from_who'>誰から：<a href='/things/who/{{$thing->from_who}}'>{{ $thing->from_who }}</p></a>
                        [<a href='/things/{{ $thing->id }}'>詳細</a>]</p>
                </div>
                @endforeach
            </div>
    
            <!--お金-->
            
            
            <div class='money_of_things'>
            <div class='total_count'>総計:{{$total_count}}円</div>　　
            @foreach ($sums as $index=>$sum)
                <div class='box_1'>
                <div class="box_1_tape"> </div>
                <p class="box_1_title"><p class='thing_id'>{{ $index+1 }}</p></p>
                <p class="box_1_text">
                    <p class='cost_sum'>金額：{{ $sum->cost_sum }}円</p>
                    <p class='from_who'>誰から：<a href='/things/who/{{$sum->from_who}}'>{{ $sum->from_who }}</p></a>
                </div>       
            @endforeach
            </div>
        </div>
        <div class='back'>[<a href='/'>戻る</a>]</class></div>
    </body>
    @endsection
</html>