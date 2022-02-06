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
        <h1>借りもの（返却済み）詳細</h1>
                  
        <div class='things'>
                 
                <div class='thing'>
                
                    <p class='id'>{{ $thing->id }}</p>
                    <p>種別</p>
                       <p class='type'>{{ $thing->type }}</p>
                    <p>何を</p>
                       <p class='thing'>{{ $thing->thing }}</p>
                    <p>金額</p>
                       <p class='costs'>{{ $thing->costs }}</p>
                    <p>誰から</p>
                       <p class='from_who'>{{ $thing->from_who }}</p>
                    <p>何時から</p>
                       <p class='from_when'>{{ $thing->from_when }}</p>
                    <p>何時まで</p>
                       <p class='to_when'>{{ $thing->to_when }}</p>
                    
                </div>
            
        　　<div class='back'>[<a href='/things/returned'>戻る</a>]</class></div>
        　　
        </div>
    </body>
    @endsection
</html>