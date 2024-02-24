@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection

@section('content')
<div class='mypage'>
    <div class='reservation_info'>
        <h3>予約状況</h3>
        @foreach($reserve_info as $reservation)
        <div class='reserve_card'>
            <div class='card_top'>
                <div class='card_title'>
                    <p class='title'>予約</p>
                </div>
                <div class='cancel'>
                    <form method='post' action='/cancel'>
                    @csrf
                    <input type='hidden' name='reserve_id' value='{{ $reservation["id"]}}'>
                    <div class='reservation_button' >
                        <button class='cancel_button'>X</button>
                    </div>
                    </form>
                </div>
            </div>

            <div class='reserve_info_area'>
            <div>
                <table class='indivisual_info'>
                <tr><th>Shop</th><td>{{ $reservation['shop']['name'] }}</td></tr>
                <tr><th>Date</th><td><?php echo substr($reservation['datetime'], 0,10) ?></td></tr>
                <tr><th>Time</th><td><?php echo substr($reservation['datetime'], 11,5) ?></td></tr>
                <tr><th>Number</th> <td>{{ $reservation['number']  }}</td></tr>
                </table>
            </div>
            <div class='QR'>
                {!! QrCode::size(40)->generate( $reservation["id"]) !!}
            </div>
            </div>


            <div class='button_area'>
                <div>
                    <?php
                    $current_datetime = \Carbon\Carbon::now();
                    if ($reservation['datetime'] >= $current_datetime) {?>
                    <form class='reservertion_change' method='post' action='/change_info'>
                        @csrf
                            <input type='hidden' name='reservation_id' value="{{ $reservation['id'] }}">
                            <button class='action_button' type='submit'>予約変更</button>
                    </form>
                    <?php }?>
                </div>
                <div>
                    <?php
                    $current_datetime = \Carbon\Carbon::now();
                    if ($reservation['datetime'] <= $current_datetime) {?>
                        <form class='reputation' method='post' action='/reputation_info'>
                        @csrf
                        <input type='hidden' name='reservation_id' value="{{ $reservation['id'] }}">
                        <button class='action_button' type='submit'>店舗評価</button>
                    </form>
                    <?php }?>
                </div>
            </div>
            <div class='payment'>
                <form action="{{ asset('payment') }}" method="POST">
                    @csrf
                    支払金額：<input name='amount' id='amount' type='number' class='payment_input'>円
                    <script src="https://checkout.stripe.com/checkout.js"
                    class="stripe-button" data-key="{{ env('STRIPE_PUBLIC_KEY')}}"
                    data-amount=0 data-name="Stripe決済"
                    data-label="決済"
                    data-description="お支払い" data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                    data-locale="auto" data-currency="JPY" data-panel-label="お支払いする">
                </script>
                </form>
            </div>
        </div>
        @endforeach
    </div>

    <div class='shop_table'>
        <h2 class='user_name'>{{Auth::user()['name']}}さん</h2>
        <div class='favorite_title'>
            <h3>お気に入り店舗</h3>
        </div>
        @foreach($shops as $shop)
            <div class='shop_card'>
                <div class='shop_image'>
                    <img src= '{{ asset("{$shop->photo}") }}'>
                </div>
                <div class='shop_info'>
                    <h3 class='shop_name'>{{ $shop['name'] }}</h3>
                    <p class='shop_area'>#{{ $shop['genre']['name'] }}</p>
                    <p class='shop_genre'>#{{ $shop['area']['name'] }}</p>
                </div>
                <div class='function'>
                    <div class='to_detail'>
                        <a class='to_detail_comment' href='/detail/{{ $shop["id"] }}'>詳しくみる</a>
                    </div>
                    <div class='favorite'>
                        <input type='image' src='{{ asset("storage/unfavorite.png") }}' alt='add_favorite'>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection