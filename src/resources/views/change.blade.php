@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/change.css') }}">
@endsection

@section('content')
<div class='mypage'>
    <div class='reservation_info'>
        <h3>現在の予約内容</h3>
        <div class='reserve_card'>
            <div class='card_top'>
                <div class='card_title'>
                    <p class='title'>予約</p>
                </div>
            </div>
            <div class='info_contents'>
                <table class='indivisual_info'>
                <tr><th>Shop</th><td>{{ $reservation['shop']['name'] }}</td></tr>
                <tr><th>Date</th><td><?php echo substr($reservation['datetime'], 0,10) ?></td></tr>
                <tr><th>Time</th><td><?php echo substr($reservation['datetime'], 11,5) ?></td></tr>
                <tr><th>Number</th> <td>{{ $reservation['number']  }}</td></tr>
                </table>
            </div>
        </div>
    </div>

    <div class='reservation_info'>
        <h3>変更後</h3>
        <div class='reserve_card'>
            <div class='card_top'>
                <div class='card_title'>
                    <p class='title'>予約</p>
                </div>
            </div>
            <div class='info_contents'>
                <table class='indivisual_info'>
                <form class='reservertion_change' method='post' action='/change'>
                @csrf
                <tr><th>Shop</th><td>{{ $reservation['shop']['name'] }}</td></tr>
                <tr><th>Date</th><td>
                    <input name='date' type='date'>
                </td></tr>
                <tr><th>Time</th><td>
            <div>
                <input id='sample' name='time' type='time'><span></span>
            </div>
                </td></tr>
                <tr><th>Number</th> <td>
                <select name='number'>
                    <?php for ($count = 1; $count < 10; $count++){?>
                    <option value=<?php echo($count) ?>><?php echo($count) ?>人</option>
                    <?php }?>
                </select>
                </td></tr>
                </table>
            </div>
        </div>
    </div>
</div>
<div class='button_area'>
    <input type='hidden' name='reservation_id' value="{{ $reservation['id'] }}">
    <button class='change_button' type='submit'>予約変更</button>
    </form>
</div>
@endsection