<?php

namespace App\Http\Controllers;

use App\Mail\Message;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Reservation;



class MasterController extends Controller
{
    public function index()
    {
        return view('master.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only(['userid', 'password']);
        $guard = $request->guard;

        if (Auth::guard('masters')->attempt($credentials)) {
            return redirect("master/")->with(['login_msg' => 'ログインしました。',]);
        }
        return back()->withErrors([
            'login' => ['ログインに失敗しました'],
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login.index')->with([
            'auth' => ['ログアウトしました'],
        ]);
    }

    public function shop_edit(Request $request)
    {
        $shop_id = Auth::user();
        $shop_info = Shop::find($shop_id['shop_id']);
        $reservation = Reservation::with('user')->where('shop_id', $shop_id['shop_id'])->get();

        $areas = Area::all();
        $genres = Genre::all();

        return view('master.shop_edit', compact('shop_info', 'reservation', 'areas', 'genres'));
    }

    public function edit(Request $request)
    {
        $time = \Carbon\Carbon::now();
        if ($request->shop_name) {
            Shop::find($request->shop_id)->update(['name' => $request->shop_name]);
        }
        if ($request->area) {
            Shop::find($request->shop_id)->update(['area_id' => $request->area]);
        }
        if ($request->genre) {
            Shop::find($request->shop_id)->update(['genre_id' => $request->genre]);
        }
        if($request->file('image'))
        {
            $request->file('image')->storeAs('public/', $time . ".jpg");
            Shop::find($request->shop_id)->update(['photo' => "storage/" . $time .'.jpg']);
        }
        if($request->description)
        {
            Shop::find($request->shop_id)->update(['description' => $request->description]);
        }
        return view('done')->with('message','店舗情報の修正');
    }

    public function message(Request $request)
    {
        $mail_text = $request;
        Mail::to($request->address)
            ->send(new Message($mail_text));

        return redirect('/master') -> with('message', 'メール送信しました');
    }

}
