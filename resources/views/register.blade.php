<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>You must return!</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">


    </head>
    <body>
        <h1>You must return!</h1>
        　　<form action="/" method="POST">
        　　      @csrf
                <br>
          　
                <p>誰から</dr>
                    <input type="text" name="thing[from_who]" placeholder="山田さん"/>
                <p>借りもの</dr>
                    <input type="text" name="thing[thing]" placeholder="お金"/>
                <p>種別</dr>
           　  　     <select name="thing[type]">
                        <option value="お金">お金</option>
                        <option value="もの">もの</option>
                    </select>
          
                <p>金額</dr>
                    <input type="number" name="thing[costs]" placeholder="1000"/>
                <p>何時から</dr>
                    <input type="datetime-local" name="thing[from_when]"/>
                <p>何時まで</dr>
                    <input type="datetime-local" name="thing[to_when]"/>
                   
                <p><input type="submit" value="登録"/></p>
                    <div class='借りもの一覧'>[<a href='/things'>借りもの一覧</a>]</class></div>

　　　　　　</form>
          
          
    </body>
</html>