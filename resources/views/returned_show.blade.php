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
    
    <body class='returned_show'>
        <h2 class='main'><i class="far fa-lightbulb"></i><span>借りもの（返却済み）詳細</span></h2>
                  
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
            <form action="/things/returned/{{ $thing->id }}" id="form_delete" method="post">
                        @csrf
                        @method('forceDelete')
                <input type="submit" style="display:none">
                <p class='delete_2'>[<span onclick="return deletePost(this);">削除</span>]</p>
            </form>
            
        　　<div class='back'>[<a href='/things/returned'>戻る</a>]</class></div>
        　　
        　　<script>
                
                function deletePost(e) {
                    'use strict';
                    if (confirm('削除すると元に戻せません。\n返却済みリストから削除しますか？'))　{
                        document.getElementById('form_delete').submit();
                    }
                }
        
            </script>
        　　
    </body>
    @endsection
</html>