<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;
use App\Models\Shop;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Requests\ReviewRequest;

class ReviewController extends Controller
{
    public function input($id)
    {
        $user_id = Auth::id();
        $favorite = Favorite::where('user_id', $user_id)->get();
        $shop = Shop::find($id);
        $record = Review::where('user_id', $user_id)->where('shop_id', $id)->first();

        if(empty($record)){
            $info = 0;
        }else{
            $info = $record;
        }


        return view('review', compact('shop', 'info'))->with("favorite", $favorite);
    }

    public function register(ReviewRequest $request)
    {
        $user_id = Auth::id();
        $fileName = $request->image->getClientOriginalName();
        $request->file('image')->storeAs('review/', $fileName);
        Review::create(['user_id'=> $user_id,
            'shop_id' => $request->shop_id,
            'score' => $request->rate,
            'comment' => $request->comment,
            'image' => $fileName ]);


        return redirect('/');
    }

    public function delete(Request $request)
    {
        $user_id = Auth::id();
        Review::where('user_id', $user_id)->where('shop_id', $request->shop_id)->delete();

        return redirect('/');
    }

    public function edit(ReviewRequest $request)
    {
        $user_id = Auth::id();
        $fileName = $request->image->getClientOriginalName();
        $request->file('image')->storeAs('review/', $fileName);
        Review::where('user_id', $user_id)->where('shop_id', $request->shop_id)->update([
            'score' => $request->rate,
            'comment' => $request->comment,
            'image' => $fileName
        ]);
        return redirect('/');
    }
}

