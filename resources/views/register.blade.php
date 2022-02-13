<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>You must return!</title>

        <!-- Fonts -->
        <!--<link href="https:fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">-->
        <link href="https:fonts.googleapis.com/css?family=Alegreya+Sans+SC:300" rel="stylesheet">
        <link href="{{secure_asset('/assets/css/styles.css')}}" rel="stylesheet">

    </head>
    
    @extends('layouts.app')　
    @section('content')
    
    <body class='register' >
        <h2 class='main'><i class="far fa-lightbulb"></i><span>You must returne!</span></h2>
        　　<form action="/" method="POST">
        　　      @csrf
                <br>
          　<div class='form'>
                <p>誰から</dr>
                    <input type="text" name="thing[from_who]" placeholder="山田さん"/>
                <p>借りもの</dr>
                    <input type="text" name="thing[thing]" placeholder="お金"/>
                <p>種別</dr>
                    <select id="selbox" name="thing[type]" onchange="change();">
                        <option value="お金">お金</option>
                        <option value="もの">もの</option>
                    </select>
                    
                    <script>
                    function change() {
                        if (document.getElementById("selbox")) {
                        selboxValue = document.getElementById("selbox").value;
                            if (selboxValue == "お金") {
                                document.getElementById("text").style.display = "";
                                document.getElementById("input").style.display = "";
                            } else if (selboxValue == "もの") {
                            document.getElementById("text").style.display = "none";
                            document.getElementById("input").style.display = "none";
                            }
                        }
                    }
                    </script>
                
                <p id="text">金額</dr>
                    <input id= "input" type="number" name="thing[costs]" placeholder="1000"/>
                <p>借りた日</dr>
                    <input type="datetime-local" name="thing[from_when]"/>
                <p>返す日</dr>
                    <input type="datetime-local" name="thing[to_when]"/>
            </div>       
                <p><input type="submit" value="登録"/></p>
                    <div class='借りもの一覧'>[<a href='/things'>借りもの一覧</a>]</class></div>

　　　　　　</form>
          
          
    </body>
    @endsection
</html>