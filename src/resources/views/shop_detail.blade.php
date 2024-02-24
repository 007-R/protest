@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shop_detail.css') }}">
@endsection

@section('content')

<div class='shop_detail'>
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

        <details class="all_comments">
            <summary class='open_comments'>全ての口コミを表示</summary>
                @foreach($all_review as $review)
                <li class='all_reviews'>
                    <span>評価点：{{$review-> score}}　（{{ $review->user->name }}さん）<br>{{$review-> comment}}</span><hr>
                </li>
                @endforeach
        </details>

        @if(Auth::check())
            @if(empty($user_review))
            <a href='/review/{{ $shop->id }}'>口コミを投稿する</a>
            @else
            <hr>
            <div class='review_function'>
                <a href='/review/{{ $shop->id }}'>口コミを編集する</a>
                <form method='post' action='/review/delete'>
                @csrf
                <input type='hidden' name='shop_id' value="{{ $shop->id }}">
                <button class='delete_function' type='submit'>口コミを削除する</button>
                </form>
            </div>
            <div class='review_abstract'>
                <div class="rate-form">
                @if($user_review['score']==1)
                    <label for="star5">★</label>
                    <label for="star4">★</label>
                    <label for="star3">★</label>
                    <label for="star2">★</label>
                    <label class='blue_star' for="star1">★</label>
                @elseif($user_review['score']==2)
                    <label for="star5">★</label>
                    <label for="star4">★</label>
                    <label for="star3">★</label>
                    <label class='blue_star' for="star2">★</label>
                    <label class='blue_star' for="star1">★</label>
                @elseif($user_review['score']==3)
                    <label for="star5">★</label>
                    <label for="star4">★</label>
                    <label class='blue_star' for="star3">★</label>
                    <label class='blue_star' for="star2">★</label>
                    <label class='blue_star' for="star1">★</label>
                @elseif($user_review['score']==4)
                    <label for="star5">★</label>
                    <label class='blue_star' for="star4">★</label>
                    <label class='blue_star' for="star3">★</label>
                    <label class='blue_star' for="star2">★</label>
                    <label class='blue_star' for="star1">★</label>
                @elseif($user_review['score']==5)
                    <label class='blue_star' for="star5">★</label>
                    <label class='blue_star' for="star4">★</label>
                    <label class='blue_star' for="star3">★</label>
                    <label class='blue_star' for="star2">★</label>
                    <label class='blue_star' for="star1">★</label>
                @endif
                </div>
                <p>{{ $user_review['comment'] }}</p>
            </div>
            @endif
        @endif
    </div>

@if(Auth::check())
    <div class='reservation'>
        <h2 class='function_title'>予約</h2>
        <form class='reservation-form' method='post' action='/done'>
            @csrf
            <input name='user_id' type='hidden' value="{{Auth::id()}}">
            <input name='shop_id' type='hidden' value="{{$shop -> id}}">
            <div>
                <input id='date_input' name='date' type='date'>
            </div>
            @if ($errors->has('date'))
                <div class='error_message'>
                    {{$errors->first('date')}}
                </div>
            @endif
            <div>
                <input id='time_input' name='time' type='time'><span></span>
            </div>
            @if ($errors->has('time'))
                <div class='error_message'>
                    {{$errors->first('time')}}
                </div>
            @endif
            <div>
                <select name='number' id='number_input'>
                    <?php for ($count = 1; $count < 10; $count++){?>
                    <option value=<?php echo($count) ?>><?php echo($count) ?>人</option>
                    <?php }?>
                </select>
            </div>
            @if ($errors->has('number'))
                <div class='error_message'>
                    {{$errors->first('number')}}
                </div>
            @endif
            <div class="reservation_button">
                <button type='submit'>予約する</button>
            </div>
        </form>
        <div class='confirmation_board'>
            <table class='confirmation_table'>
            <tr><th>shop</th><td>{{ $shop -> name}}</td></tr>
            <tr><th>Date</th><td><p id='date_output'></p></td></tr>
            <tr><th>Time</th><td><p id='time_output'></p></td></tr>
            <tr><th>Number</th><td><p id='number_output'></p></td></tr>
            </table>
        </div>
    </div>
@endif



<script>

let d_input = document.getElementById('date_input');
let d_output = document.getElementById('date_output');

let t_input = document.getElementById('time_input');
let t_output = document.getElementById('time_output');

let n_input = document.getElementById('number_input');
let n_output = document.getElementById('number_output');

timestamp = 0;

function update(){
    timestamp++;
    window.requestAnimationFrame(update);

    if (timestamp % 10 == 0 ){
        d_output.innerHTML = d_input.value;
        t_output.innerHTML = t_input.value;
        n_output.innerHTML = n_input.value;
    }
}
update();
</script>


@endsection