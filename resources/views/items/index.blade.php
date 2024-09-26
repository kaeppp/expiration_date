<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>expiration_date</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    </head>
    
    <body>
        <h1>防災用食品管理リスト</h1>
        <div class="items">
            @foreach($items as $item)
                <div class="item">
                    <h2 class="name">{{ $item->name }}</h2>
                    <p class="stock">個数：{{ $item->stock }}個</p>
                    <p class="expiration_date">賞味・消費期限：{{ $item->expiration_date }}</p>
                    <p class="memo">メモ：{{ $item->memo }}</p>
                    <p class="updated_at">最終更新日：{{ $item->updated_at }}</p>
                </div>
            @endforeach
        </div>
        <div class="paginate">{{ $items->links() }}</div>
    </body>
</html>