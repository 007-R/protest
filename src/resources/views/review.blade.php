@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/review.css') }}">
@endsection

@section('content')


<div class='input_flame'>
    <div class='info_area'>
        <div class='question'>
            <h1>今回のご利用はいかがでしたか？</h1>
        </div>
        <div class="shop_table" id='shop_table'>
                <div class='shop_card'>
                    <div class='shop_image'>
                        <img src= '{{ asset("{$shop->photo}") }}'>
                    </div>
                    <div class='shop_info'>
                        <h3 class='shop_name'>{{ $shop['name'] }}</h3>
                        <p class='shop_area'>#{{ $shop['area']['name'] }}</p>
                        <p class='shop_genre'>#{{ $shop['genre']['name'] }}</p>
                    </div>
                    <div class='function'>
                        <div>
                            <a class='to_detail_comment' href='/detail/{{ $shop["id"] }}'>詳しくみる</a>
                        </div>
                        <div class='favorite'>
                        @if(Auth::check())
                            @if($favorite)
                                <form method='post' action='/del'>
                                        @csrf
                                        <input class='heart' type='hidden' name='favorite_shop' value="{{ $shop['id'] }}" >
                                        <input  class='heart' type='image' src='{{ asset("storage/unfavorite.png") }}' alt='del_favorite'>
                                </form>
                            @else
                                <form class='add_favorite' method='post' action='/add'>
                                        @csrf
                                        <input class='heart' type='hidden'
                                        name='favorite_shop' value="{{ $shop['id'] }}">
                                        <input type='image' class='heart' src='{{ asset("storage/favorite.png") }}' alt='add_favorite'>
                                </form>
                            @endif
                        @else
                            <input type='image' src='{{ asset("storage/favorite.png") }}' alt='add_favorite'>
                        @endif
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <div class='input_area'>
        <div class='score'>
            <h2>体験を評価してください</h2>
            @if(empty($info))
            <form class='reviewing' method='post' action='/review/register' enctype="multipart/form-data">
            @csrf
            <div class="rate-form">
                <input id="star5" type="radio" name="rate" value="5">
                <label for="star5">★</label>
                <input id="star4" type="radio" name="rate" value="4">
                <label for="star4">★</label>
                <input id="star3" type="radio" name="rate" value="3" checked>
                <label for="star3">★</label>
                <input id="star2" type="radio" name="rate" value="2">
                <label for="star2">★</label>
                <input id="star1" type="radio" name="rate" value="1">
                <label for="star1">★</label>
            </div>
        </div>
        <div class='comment'>
            <h2>口コミを投稿</h2>
            <textarea class='review_comment' name='comment' type='text' placeholder='カジュアルな夜のお出かけにおすすめのスポット'></textarea>
        </div>
            @else
            <form class='reviewing' method='post' action='/review/edit' enctype="multipart/form-data">
            @csrf
            <div class="rate-form">
                @if($info->score == 5)
                    <input id="star5" type="radio" name="rate" value="5" checked>
                    <label for="star5">★</label>
                    <input id="star4" type="radio" name="rate" value="4">
                    <label for="star4">★</label>
                    <input id="star3" type="radio" name="rate" value="3">
                    <label for="star3">★</label>
                    <input id="star2" type="radio" name="rate" value="2">
                    <label for="star2">★</label>
                    <input id="star1" type="radio" name="rate" value="1">
                    <label for="star1">★</label>
                @elseif($info->score == 4)
                    <input id="star5" type="radio" name="rate" value="5">
                    <label for="star5">★</label>
                    <input id="star4" type="radio" name="rate" value="4" checked>
                    <label for="star4">★</label>
                    <input id="star3" type="radio" name="rate" value="3">
                    <label for="star3">★</label>
                    <input id="star2" type="radio" name="rate" value="2">
                    <label for="star2">★</label>
                    <input id="star1" type="radio" name="rate" value="1">
                    <label for="star1">★</label>
                @elseif($info->score == 3)
                    <input id="star5" type="radio" name="rate" value="5">
                    <label for="star5">★</label>
                    <input id="star4" type="radio" name="rate" value="4">
                    <label for="star4">★</label>
                    <input id="star3" type="radio" name="rate" value="3" checked>
                    <label for="star3">★</label>
                    <input id="star2" type="radio" name="rate" value="2">
                    <label for="star2">★</label>
                    <input id="star1" type="radio" name="rate" value="1">
                    <label for="star1">★</label>
                @elseif($info->score == 2)
                    <input id="star5" type="radio" name="rate" value="5">
                    <label for="star5">★</label>
                    <input id="star4" type="radio" name="rate" value="4">
                    <label for="star4">★</label>
                    <input id="star3" type="radio" name="rate" value="3">
                    <label for="star3">★</label>
                    <input id="star2" type="radio" name="rate" value="2" checked>
                    <label for="star2">★</label>
                    <input id="star1" type="radio" name="rate" value="1">
                    <label for="star1">★</label>
                @elseif($info->score == 1)
                    <input id="star5" type="radio" name="rate" value="5">
                    <label for="star5">★</label>
                    <input id="star4" type="radio" name="rate" value="4">
                    <label for="star4">★</label>
                    <input id="star3" type="radio" name="rate" value="3">
                    <label for="star3">★</label>
                    <input id="star2" type="radio" name="rate" value="2">
                    <label for="star2">★</label>
                    <input id="star1" type="radio" name="rate" value="1" checked>
                    <label for="star1">★</label>
                @endif
            </div>
        </div>
        <div class='comment'>
            <h2>口コミを投稿</h2>
            <textarea class='review_comment' name='comment' onkeyup="ShowLength(value);">{{$info -> comment}}</textarea>
            <div class='char_count'>
                <span id="inputlength">0</span><span>/400(最大文字数)</span>
            </div>
        </div>
            @endif
        @error('comment')
            <p class='error_message'>{{ $message }}</p>
        @enderror
        <div class='review_image'>
            <h2>画像の追加</h2>
            <div class="drop-area">
                <label>
                    <p>クリックして写真を追加<br>またはドラッグアンドドロップ</p>
                    <input type="file" name="image" accept="image/jpeg, image/png" class="uploader">
                    <div class="preview-area"></div>
                </label>
            </div>
        </div>
        @error('image')
            <p class='error_message'>{{ $message }}</p>
        @enderror
    </div>
</div>
<div class='button_area'>
    <input type='hidden' name='shop_id' value="{{ $shop['id'] }}">
    <button class='review_button' type='submit'>口コミを投稿する</button>
    </form>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    function ShowLength( str ) {
        document.getElementById("inputlength").innerHTML = str.length;
    }

    $(window).on("load", function () {
        //ドラッグ&ドロップ時の操作
        $(document).on('drop', '.drop-area', function (event) {
            $(this).find('.uploader')[0].files = event.originalEvent.dataTransfer.files
            $(this).find('.uploader').trigger('change')
        })

        //ドロップエリア以外のドロップ禁止
        $(document).on('dragenter dragover drop', function (event) {
            event.stopPropagation()
            event.preventDefault()
        })

        //ファイルがアップロードされたらプレビューエリアに表示
        $(document).on('change', '.drop-area .uploader', function (e) {
            let thiss = $(this)
            let fileReader = new FileReader()
            fileReader.onload = (function () {
                let imgTag = `<img src='${fileReader.result}'>`
                thiss.closest(".drop-area").find(".preview-area").html(imgTag)
            })
            fileReader.readAsDataURL(e.target.files[0])
        })
    })
</script>


@endsection