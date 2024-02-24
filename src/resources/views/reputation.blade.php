@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/reputation.css') }}">
@endsection

@section('content')
<div class='mypage'>
    <div class="shop_info">
        <div class='info_top'>
            <div class='button_space'>
            <button class='return_button' type="button" onclick="window.history.back();"><</button>
            </div>
            <h2>{{ $shop->name }}</h2>
        </div>
        <img src= '{{ asset("{$shop->photo}") }}'>
        <p class='shop_type'>#{{ $shop['area']['name'] }} #{{ $shop['genre']['name'] }}</p>
        <p>{{ $shop -> description }}</p>
    </div>

    <div class='reputation'>
        <h3>店舗評価</h3>
        <div class='reserve_card'>
            <div>
                <table class='reputation_info'>
                <form class='reputation' method='post' action='/repute'>
                @csrf
                <tr><th>Shop</th><td>{{ $reservation['shop_id']  }}</td></tr>
                <tr><th>Date</th><td><?php echo substr($reservation['datetime'], 0,10) ?></td></tr>
                <tr><th>Time</th><td><?php echo substr($reservation['datetime'], 11,5) ?></td></tr>
                <tr><th>Number</th> <td>{{ $reservation['number']  }}</td></tr>
                <tr><th>Score</th><td>
                    <select name='score' type='date'>
                        <option value="1">1点</option>
                        <option value="2">2点</option>
                        <option value="3">3点</option>
                        <option value="4">4点</option>
                        <option value="5">5点</option>
                    </select>
                </td></tr>
                <tr><th>Comment</th> <td>
                <input name='reputation_comment' type='text'>
                </input>
                </td></tr>
                </table>
            </div>
        </div>
        <input type='hidden' name='reservation_id' value="{{ $reservation['id'] }}">
            <button type='submit'>評価登録<button>
        </form>
    </div>
</div>
@endsection