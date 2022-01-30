<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>{{ $things->from_who }}から借りたもの一覧</h1>
                
        <div class='things'>
            
            <h2>もの</h2>
           
            @foreach ($things as $thing)
                 
                <div class='thing'>
                
                    <p class='id'>{{ $thing->id }}</p>
                    
                    <p>何を</p>
                        <p class='thing'>{{ $thing->thing }}</p>
                    <p>何時まで</p>
                        <p class='to_when'>{{ $thing->to_when }}</p>
                    
                    [<a href='/things/{{ $thing->id }}'>詳細</a>]
                    
            @endforeach
    
            
            <h2>お金</h2>
            
            　　<div class='総計'>[<a href='/things/sums'>総計</a>]</class></div>
            　　
            @foreach ($sums as $sum)
                    
                    <p class='id'>{{ $sum->id }}</p>
                    
                    <p>金額</p>
                        <p class='costs'>{{ $sum->costs }}</p>
                    <p>何時まで</p>
                        <p class='to_when'>{{ $thing->to_when }}</p>
                   
                    [<a href='/things/{{ $sum->id }}'>詳細</a>]
                    
            @endforeach
            
                </div>
                
        　　<div class='戻る'>[<a href='/things'>戻る</a>]</class></div>
        </div>
    </body>
</html>