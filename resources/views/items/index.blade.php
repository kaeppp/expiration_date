<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>防災用食品管理リスト一覧</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    </head>
    
    <body>
        <h1>防災用食品管理リスト</h1>
        <a href="/items/create">新規追加</a>
        <div class="items">
            @foreach($items as $item)
                <div class="item">
                    <h2 class="name">{{ $item->name }}</h2>
                    <p class="stock">個数：{{ $item->stock }}個</p>
                    <p class="expiration_date">賞味・消費期限：{{ $item->expiration_date }}</p>
                    <p class="memo">メモ：{{ $item->memo }}</p>
                    <p class="updated_at">最終更新日：{{ $item->updated_at }}</p>
                </div>
                    {{-- <div class="edit">
                        <a href="/items/{{ $item->id }}/edit">編集</a>
                    </div>  --}}
                <form action="/items/{{ $item->id }}/edit" method="get">
                    <button type="submit" >編集</button>
                </form>
                <form action="items/{{ $item->id }}" id="form_{{ $item->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="deleteItem({{ $item->id }})">削除</button>
                </form>
            @endforeach
        </div>
        <div class="paginate">{{ $items->links() }}</div>
        <script>
            function deleteItem(id){
                'use strict'
                
                if (confirm('削除すると復元できません。 \n本当に削除しますか？')) {
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const items = document.querySelectorAll('.item');
                const today = new Date();

                items.forEach(function(item) {
                    const expirationDateElement = item.querySelector('.expiration_date');
                    const expirationDateText = expirationDateElement.textContent.replace('賞味・消費期限：', '');
                    const expirationDate = new Date(expirationDateText);
                    /*const today = new Date();*/
                    const timeDiff = expirationDate - today;
                    const daysDiff = Math.ceil(timeDiff / (1000 * 60 * 60 * 24));
    
                    if (daysDiff <= 0) {
                        expirationDateElement.style.color = 'red';
                    } else if (daysDiff <= 7) {
                        expirationDateElement.style.color = 'orange';
                    }
                });
            });
        </script>
    </body>
</html>
