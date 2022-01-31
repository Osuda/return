<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>{{ $who }}から借りたもの一覧</h1>
                
        <div class='things'>
            
            <h2>もの</h2>
           
            @foreach ($things as $thing)
                
                @if ($thing->type == 'もの')
                    <div class='thing'>
                
                        <p class='id'>{{ $thing->id }}</p>
                    
                        <p>何を</p>
                        <p class='thing'>{{ $thing->thing }}</p>
                        <p>何時まで</p>
                        <p class='to_when'>{{ $thing->to_when }}</p>
                    
                        [<a href='/things/{{ $thing->id }}'>詳細</a>]
                    </div>    
                @endif
                    
            @endforeach
    
            
            <h2>お金</h2>
            
                @if ($thing->where('from_who', $who)->where('type', 'お金')->exists())
                    <div class='総計'>[総計:{{$sum->cost_sum}}]</div>
                @else
                    <div class='総計'>[総計:0]</div>
                @endif
                
                

            　　

            
            @foreach ($things as $thing)
                
                @if ($thing->type == 'お金')
                <div class='thing'>
                
                    <p class='id'>{{ $thing->id }}</p>
                    
                    <p>金額</p>
                        <p class='costs'>{{ $thing->costs }}</p>
                    <p>何時まで</p>
                        <p class='to_when'>{{ $thing->to_when }}</p>
                    
                    [<a href='/things/{{ $thing->id }}'>詳細</a>]
                @endif
                    
            @endforeach
            
                </div>
                
        　　<div class='戻る'>[<a href='/things'>戻る</a>]</class></div>
        </div>
    </body>
</html>