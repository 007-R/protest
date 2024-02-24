@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/master_edit.css') }}">
@endsection

@section('content')
@if (session('message'))
    <div class="success">{{ session('message') }}</div>
@endif
<div class='manager_function'>
    <div class='master_manager'>
        <h3>店舗代表者の作成</h3>
        <div class='reserve_card'>
            <form class='master_creation' method='post' action='admin/create_master'>
            @csrf
            <div class='name_input'>
                <input name='name' type='text' placeholder='Name', value="{{old('name')}}">
            </div>
            <div class='userid_input'>
                <input name='userid' type='text' placeholder='Master ID', value="{{old('name')}}">
            </div>
            <div class='password_input'>
                <input name='password' type='password' placeholder='Password'>
            </div>
        </div>
        <div class='button'>
            <button type='submit'>店舗代表者作成</button></form>
        </div>
        <h3>登録中の店舗代表者</h3>
        <table>
        <tr><th>master_id</th><th>代表者名</th><th>担当店舗ID</th></tr>
        @foreach($masters as $master)
        <tr>
            <td>{{$master['userid']}}</td>
            <td>{{$master['name']}}</td>
            <td>{{$master['shop_id']}}</td>
        </tr>
        @endforeach
        </table>
    </div>
    <div class='comment_manager'>
        <h3>口コミの管理</h3>
        <table>
            <tr><th>ユーザー</th><th>店舗</th><th>評価点</th><th>コメント</th><th>削除ボタン</th></tr>
            @foreach($reviews as $review)
            <tr>
                <td>{{$review['user']['name']}}</td>
                <td>{{$review['shop']['name']}}</td>
                <td>{{$review['score']}}</td>
                <td>{{$review['comment']}}</td>
                <td>
                    <form class='delete' method='post' action='admin/review/delete'>
                    @csrf
                    <input type='hidden' name='user_id' value='{{$review -> user_id}}'>
                    <input type='hidden' name='shop_id' value='{{ $review -> shop_id}}'>
                    <button type='submit'>削除</button>
                </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    <div class='shop_import'>
        <h3>店舗情報のインポート</h3>
        <form method="post" action="/admin/import" enctype="multipart/form-data">
            @csrf
            <label name="csvFile">csvファイル</label>
            <input type="file" name="csvFile" class="csvFile" id="csvFile" />
            <label name="csvFile">画像ファイル(jpg or png)</label>
            <input type="file" name="image" accept="image/jpeg, image/png" class="uploader">
            <input type="submit" value='インポート'></input>
            </div>
        </form>
    </div>
    @error('image')
        <p class='error_message'>{{ $message }}</p>
    @enderror
    @if (session('message'))
    <p class='error_message'>{{ session('message') }}</p>
    @endif

    <div>
        <form class='form' action='/logout' method='post'>
        @csrf
        <button class="logout_button" type='submit'><a>Logout</a></button>
        </form>
    </div>
    @if (Auth::guard('administrators')->check())
        <div>管理者 {{ Auth::guard('administrators')->user()->userid }}でログイン中</div>
    @endif
</div>
@endsection