<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>新しく追加する</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>防災用食品を新しく追加する</h1>
        <form action="/items" method="POST">
            @csrf
            <div class="name">
                <h3>商品名</h3>
                <input type="text" name="item[name]" placeholder="商品名"/>
            </div>
            <div class="stock">
                <h3>個数</h3>
                <input type="text" name="item[stock]">個</input>
            </div>
            <div class="expiration_date">
                <h3>賞味・消費期限</h3>
                <input type="date" name="item[expiration_date]"/>
            </div>
            <div class="memo">
                <h3>メモ</h3>
                <textarea name="item[memo]"></textarea>
            </div>
            <input type="submit" value="追加"/>
        </form>
        
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
    
</html>

