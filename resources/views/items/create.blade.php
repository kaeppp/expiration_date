<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>防災用食品新規追加</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
         @vite(['resources/css/app.css', 'resources/js/app.js'])
        
    </head>
    <body>
        <div class="bg-yellowkou pt-10 px-14 pb-14">
            <div class="p-6 px-20 bg-yelloekou_2">
                <h1 class="text-center text-2xl md:text-4xl lg:text-6xl font-dela mx-auto container pt-8 pl-6">防災用食品を新しく追加する</h1>
                <form action="/items" method="POST" class="justify-center">
                    @csrf
                    <div class="block w-5/6 mx-auto mt-20 mb-8">
                        <h3 class="sm:text-2xl font-dela tracking-wider">商品名</h3>
                        <div class="bg-white border-4 border-brown25l h-16 rounded-lg ">
                            <input type="text" name="item[name]" placeholder="商品名" value="{{ old('item.name') }}" class="pl-4 block h-full w-full text-xl justify-items-stretch"/>
                            <p class="name_error" style="color:red">{{ $errors->first('item.name') }}</p>
                        </div>
                    </div>
                    <div class="block w-5/6 mx-auto mb-8">
                        <h3 class="sm:text-2xl font-dela tracking-wider">個数</h3>
                        <div class="bg-white border-4 border-brown25l h-16 rounded-lg">
                            <input type="number" name="item[stock]" placeholder="個" value="{{ old('item.stock') }}" class="pl-4 block h-full w-full text-xl justify-items-stretch"/>
                            <p class="stock_error" style="color:red">{{ $errors->first('item.stock') }}</p>
                        </div>
                    </div>
                    <div class="block w-5/6 mx-auto mb-8">
                        <h3 class="sm:text-2xl font-dela tracking-wider">賞味・消費期限</h3>
                        <div class="bg-white border-4 border-brown25l h-16 rounded-lg">
                            <input type="date" name="item[expiration_date]" value="{{ old('item.expiration_date') }}" class="pl-4 block h-full w-full text-xl justify-items-stretch"/>
                            <p class="expiration_date_error" style="color:red">{{ $errors->first('item.expiration_date') }}</p>
                        </div>
                    </div>
                    <div class="block w-5/6 mx-auto mb-8">
                        <h3 class="sm:text-2xl font-dela tracking-wider">メモ</h3>
                        <div class="bg-white border-4 border-brown25l h-32 rounded-lg">
                            <textarea name="item[memo]" class="pl-4 pt-2 block h-full w-full text-xl justify-items-stretch">{{ old('item.memo') }}</textarea>
                        </div>
                    </div>
                    <div class="flex justify-between mb-8">
                        <div class="size-32 font-dela border border-blue1 bg-blue1 rounded-full flex justify-center items-center shadow-md p-2 hover:bg-blue2">
                            <div  class="tracking-wider text-2xl size-28 border-dashed border-4 rounded-full border-white flex items-center justify-center">
                                <a href="/">戻る</a>
                            </div>
                        </div>
                        <div class="size-32 font-dela border border-red1 bg-red1 rounded-full flex justify-center items-center shadow-md p-2 hover:bg-red2">
                            <input type="submit" value="追加" class="tracking-wider text-2xl size-28 border-dashed border-4 rounded-full border-white"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
    
</html>

