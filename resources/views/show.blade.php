<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>借りもの詳細</h1>
                  
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
           
            <form action="/things/{{ $thing->id }}" id="form_delete" method="post">
                        @csrf
                        @method('delete')
                <input type="submit" style="display:none">
                <p class='delete'>[<span onclick="return deletePost(this);">削除</span>]</p>
            </form>
            
        　　<div class='back'>[<a href='/things'>戻る</a>]</class></div>
        　　
        　　<script>
                
                function deletePost(e) {
                    'use strict';
                    if (confirm('本当に削除しますか？'))　{
                        document.getElementById('form_delete').submit();
                    }
                }
        
            </script>
        　　
        </div>
    </body>
</html>