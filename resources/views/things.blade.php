<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>借りもの一覧</h1>
                  <div class='お金のやり取り'>[<a href='/things/sums'>お金のやり取り</a>]</class></div>
        <div class='things'>
            @foreach ($things as $thing)
                 
                  <div class='thing'>
                
                    <p class='id'>{{ $thing->id }}</p>
                    <p>種別</dr>
                       <class='type'>{{ $thing->type}}</p>
                    <p>何を</dr>
                       <class='thing'>{{ $thing->thing}}
                    <p>金額</dr>
                       <class='cost'>{{ $thing->cost}}</p>
                    <p>誰から</dr>
                       <class='from_who'>{{ $thing->from_who}}</p>
                    <p>何時から</dr>
                       <class='from_when'>{{ $thing->from_when}}</p>
                    <p>何時まで</dr>
                       <class='to_when'>{{ $thing->to_when}}</p>
                    
                  </div>
            @endforeach
            
        　　<div class='戻る'>[<a href='/'>戻る</a>]</class></div>
        </div>
    </body>
</html>