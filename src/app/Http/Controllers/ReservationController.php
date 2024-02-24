<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ReservationRequest;
use App\Models\Reservation;
use App\Models\Favorite;
use App\Models\Shop;
use App\Models\Reputation;
use Illuminate\Support\Facades\Auth;


class ReservationController extends Controller
{
    public function create(ReservationRequest $request)
    {
        $user = $request->user_id;
        $shop = $request->shop_id;
        $date = $request->date;
        $time = $request->time;
        $datetime = $date .' '. $time;
        $number = $request->number;

        Reservation::create([
            'user_id' => $user,
            'shop_id' => $shop,
            'datetime' => $datetime,
            'number' => $number,
        ]);

        return view('done') -> with('message', '予約');
    }
    public function cancel(Request $request)
    {
        $reserve_id = $request->reserve_id;
        Reservation::find($reserve_id)->delete();
        return view('done')->with('message', '取消');
    }
    public function mypage(Request $request)
    {
        $user = Auth::id();
        $reserve_info = Reservation::with('shop')->where('user_id', $user)->get();
        $favorite_info = Favorite::where('user_id', $user)->select('shop_id')->get();
        $shops = Shop::wherein('id', $favorite_info)->get();
        return view('mypage', compact("shops", "reserve_info", "favorite_info"));
    }
    public function change_info(Request $request)
    {

        $reservation = Reservation::find($request->reservation_id);

        return view('change', compact("reservation"));
    }

    public function change(Request $request)
    {
        $date = $request->date;
        $time = $request->time;
        $datetime =$date. ' '. $time;

        $reservation = Reservation::find($request->reservation_id)->update([
            'id' => $request->reservation_id,
            'datetime' => $datetime,
            'number' => $request->number,
        ]);
        return view('done') ->with('message', '変更');
    }

    public function reputation_info(Request $request)
    {
        $reservation = Reservation::find($request->reservation_id);

        $shop = Shop::find($reservation['shop_id']);

        return view('reputation', compact('reservation', 'shop'));
    }
    public function repute(Request $request)
    {
        $reservation_id = $request->reservation_id;
        $score = $request->score;
        $comment = $request->reputation_comment;

        Reputation::create([
            'reservation_id' => $reservation_id,
            'score' => $score,
            'comment' => $comment,
        ]);

        return view('done') -> with('message', '評価');
    }
}
