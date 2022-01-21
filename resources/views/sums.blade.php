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
        <h1>お金のやり取り</h1>
        　　<form action="/things" method="POST">
          　　　　 <p>
          　　　　 </p>
          　　　　 <p>誰から</dr>
          　　　    　 <input type="text" name="user_id" placeholder="山田さん"/>
          　　　　 <p>借りもの</dr>
         　　　　　　　　  <input type="text" name="thing" placeholder="お金"/>
           　  　 <p>種別</dr>
           　  　     <select name="borrowed_thing">
                       <option value="money">お金</option>
                       <option value="object">もの</option>
                       <option value="else">その他</option>
              　 <p>
          
           　     <p>金額</dr>
                    <input type="text" name="cost" placeholder="1,000円"/>
                 <p>何時から</dr>
                    <input type="text" name="from_when" placeholder="1/1"/>
                 <p>何時まで</dr>
                    <input type="text" name="to_when" placeholder="1/5 17時からの飲み会"/>
                   
                 <p><button type="button">登録</button></p>

　　　　　　</form>
          
          
    </body>
</html>