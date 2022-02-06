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
        <h1>返却済み一覧</h1>
                
        <div class='things'>
            
            <h2>もの</h2>
           
            @foreach ($things as $thing)
                 
                <div class='thing'>
                
                    <p class='id'>{{ $thing->id }}</p>
                    
                    <p>日時</p>
                    <p class='created_at'>{{$thing->created_at}}</p>
                    <p>何を</p>
                    <p class='thing'>{{ $thing->thing}}</p>
                    <p>誰から</p>
                    <a href='/things/who/{{$thing->from_who}}'><p class='from_who'>{{ $thing->from_who }}</p></a>
                    
                        
                    [<a href='/things/returned/{{ $thing->id }}'>詳細</a>]
                    
            @endforeach
    
            
            <h2>お金</h2>
            
            　　<div class='総計'>[<a href='/things/sums'>総計</a>]</class></div>
            　　
            @foreach ($sums as $sum)
                    
                    <p class='id'>{{ $sum->id }}</p>
                    
                    <p>金額</p>
                        <p class='cost_sum'>{{ $sum->cost_sum }}</p>
                    <p>誰から</p>
                    <a href='/things/who/{{$sum->from_who}}'><p class='from_who'>{{ $sum->from_who }}</p></a>
                        
                    <!--[<a href='/things/{{ $sum->id }}'>詳細</a>]-->
                    
            @endforeach
            
                </div>
                
        　　<div class='戻る'>[<a href='/things'>戻る</a>]</class></div>
        </div>
    </body>
    @endsection
</html>