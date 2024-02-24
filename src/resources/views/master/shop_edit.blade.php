@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shop_edit.css') }}">
@endsection

@section('content')
@if (session('message'))
    <div class="mail--success">{{ session('message') }}</div>
@endif
<div class='mypage'>
    <div class='reservation_info'>
        <h3>変更前</h3>
        <div class='reserve_card'>
            <div>
                <p>店舗名：{{ $shop_info['name'] }}</p>
                <p>エリア：{{ $shop_info['area']['name'] }}</p>
                <p>ジャンル：{{ $shop_info['genre']['name'] }}</p>
            </div>
            <div class='shop_image'>
                <img src= '{{ asset("{$shop_info->photo}") }}'>
            </div>
            <div class='info_contents'>
                <p>{{ $shop_info['description'] }}</p>
            </div>
        </div>
    </div>



    <div class='reservation_info'>
        <h3>変更後</h3>
        <div class='reserve_card'>
            <div class='info_contents'>
                <form class='reservertion_change' method='post' action='master/edit' enctype="multipart/form-data">
                @csrf
                <p>店鋪名：<input type='text' name='shop_name'></p>
                <p>エリア：<select name='area'>
                    @foreach($areas as $area)
                    <option value= "{{ $area['id'] }}">{{ $area['name'] }}</option>
                    @endforeach
                    </select>
                </p>
                <p>エリア：<select name='genre'>
                    @foreach($genres as $genre)
                    <option value= "{{ $genre['id'] }}">{{ $genre['name'] }}</option>
                    @endforeach
                    </select>
                </p>
                <p>掲載する画像をアップロードください</p>
                <input type='file' name='image'>
                <p>掲載する店舗紹介文を入力ください</p>
                <input class='description_input' type='text' name='description'>
            </div>
        </div>
    </div>
</div>
<div class='button_area'>
    <input type='hidden' name='shop_id' value="{{ $shop_info['id'] }}">
    <button class='change_button' type='submit'>内容変更</button>
    </form>
</div>
<div class='reservation_list'>
    <h3>予約情報</h3>
    <table>
    <tr><td>名前</td><td>日時</td><td>人数</td><td>メッセージ</td><td>送信ボタン</td></tr>
    @foreach($reservation as $reserve)
    <tr>
        <td>{{ $reserve['user']['name'] }}</td>
        <td>{{ $reserve['datetime'] }}</td>
        <td>{{ $reserve['number'] }}人</td>
        <form action='master/message' method='post'>
            @csrf
            <input type='hidden' name='address' value="{{ $reserve['user']['email'] }}">
            <input type='hidden' name='customer' value="{{ $reserve['user']['name'] }}">
            <input type='hidden' name='sender' value="{{ $shop_info['name'] }}">
            <td><input type='text' name='mail_text'></td>
            <td><button type='submit'>送信</button></td>
        </form>
    </tr>
    @endforeach
    </table>
</div>
<div>
    <form class='form' action='/logout' method='post'>
        @csrf
        <button class="logout_button" type='submit'><a>Logout</a></button></form>
</div>
@endsection