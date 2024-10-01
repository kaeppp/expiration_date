<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>新しく追加する</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>防災用食品を新しく更新する</h1>
        <form action="/items/{{ $item->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="name">
                <h3>商品名</h3>
                <input type="text" name="item[name]" placeholder="商品名" value="{{ $item->name }}"/>
                <p class="name_error" style="color:red">{{ $errors->first('item.name') }}</p>
            </div>
            <div class="stock">
                <h3>個数</h3>
                <input type="text" name="item[stock]" value="{{ $item->stock }}" >個</input>
                <p class="stock_error" style="color:red">{{ $errors->first('item.stock') }}</p>
            </div>
            <div class="expiration_date">
                <h3>賞味・消費期限</h3>
                <input type="date" name="item[expiration_date]" value="{{ $item->expiration_date }}"/>
                <p class="expiration_date_error" style="color:red">{{ $errors->first('item.expiration_date') }}</p>
            </div>
            <div class="memo">
                <h3>メモ</h3>
                <textarea name="item[memo]">{{ $item->memo }}</textarea>
            </div>
            <input type="submit" value="更新"/>
        </form>
        
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
    
</html>

