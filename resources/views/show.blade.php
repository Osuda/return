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
        <h2 class='main'><i class="far fa-lightbulb"></i><span>借りもの詳細</span></h2>
                  
        <div class='thing_show'>
                 
                <div class="box_2">
                <div class="sen14">
                
                    <p class='thing'>何を：{{ $thing->thing }}</p>
                    @if ($thing->type == 'お金')
                        <p class='costs'>金額：{{ $thing->costs }}円</p>
                    @endif
                    <p class='from_who'>誰から：{{ $thing->from_who }}</p>
                    <p class='from_when'>借りた日：{{ $thing->from_when }}</p>
                    <p class='to_when'>返す日：{{ $thing->to_when }}</p>
                </div>    
                </div>
        </div>   
            <form action="/things/{{ $thing->id }}" id="form_delete" method="post">
                        @csrf
                        @method('delete')
                <input type="submit" style="display:none">
                <p class='delete_1'>[<span onclick="return deletePost(this);">返却済みにする</span>]</p>
            </form>
            
        　　<div class='back'>[<a href='/things'>戻る</a>]</class></div>
        　　
        　　<script>
                
                function deletePost(e) {
                    'use strict';
                    if (confirm('返却済みにしますか？'))　{
                        document.getElementById('form_delete').submit();
                    }
                }
        
            </script>
    </body>
    @endsection
</html>