<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>防災用食品管理リスト一覧</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
    </head>
    
    <body>
        <div class="bg-yellowkou pt-10 px-14 pb-14">
            <div class="p-6 px-20 bg-yelloekou_2">
                <h1 class="text-center xt-2xl md:text-4xl lg:text-8xl font-dela md:mx-auto container pt-8 pl-6">防災用食品管理リスト</h1>
                {{--<a href="/items/create">新規追加</a>--}}
                <form action="/items/create" method="post">
                    @csrf
                    <div class="tracking-wider font-dela sm:text-4xl w-80 my-16 ml-7 mr-7 px-7 py-7 bg-brown25l rounded-full text-black hover:bg-brown cursor-pointer">
                        <button type="button" onclick="location.href='/items/create'" class="border-dashed border-4 rounded-full px-10 py-4 border-white w-full">新規追加</button>
                    </div>
                </form>
                
                
                <div class="flex flex-col gap-4 sm:text-xl justify-center font-zenkaku">
                    @foreach($items as $item)
                        <div class="flex gap-4 justify-center mb-8">
                            <!--<div class=item>-->
                                <div class="item block w-2/3 p-8 bg-white border-2 border-brown25l shadow-md justify-center">
                                    <h2 class="text-xl pb-3 font-bold">{{ $item->name }}</h2>
                                    <p class="pb-2">個数：{{ $item->stock }}個</p>
                                    <p class="expiration_date pb-2">賞味・消費期限：{{ $item->expiration_date }}</p>
                                    <p class="pb-2 truncate">メモ：{{ $item->memo }}</p>
                                    <p class="pt-6 pb-2 text-right text-gray-500">最終更新日：{{ $item->updated_at }}</p>
                                </div>
                            <!--</div>-->
                            <div class="w-36 flex flex-col gap-8 rounded-full justify-center ">
                                <form action="/items/{{ $item->id }}/edit" method="get">
                                    <div class="size-32 font-dela border border-blue1 bg-blue1 rounded-full flex justify-center items-center shadow-md hover:bg-blue2">
                                        <button type="submit" class="tracking-wider text-2xl size-28 border-dashed border-4 rounded-full border-white">編集</button>
                                    </div>
                                </form>
                                <form action="items/{{ $item->id }}" id="form_{{ $item->id }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <div class="size-32 font-dela border border-blue1 bg-blue1 rounded-full flex justify-center items-center shadow-md p-2 hover:bg-blue2">
                                        <button type="button" onclick="deleteItem({{ $item->id }}) " class="tracking-wider text-2xl size-28 border-dashed border-4 rounded-full border-white">削除</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="paginate">{{ $items->links() }}</div>
            </div>
        </div>
        
        <script>
            function deleteItem(id){
                'use strict'
                
                if (confirm('削除すると復元でません。 \n本当に削除しますか？')) {
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
