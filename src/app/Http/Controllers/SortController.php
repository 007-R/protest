<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Review;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;


class SortController extends Controller
{
    public function random()
    {
        $user_id = Auth::id();
        $shops = Shop::inRandomOrder()->get();
        $areas = Area::all();
        $genres = Genre::all();
        $favorites = Favorite::where('user_id', $user_id)->get()->toArray();
        $favorite_shop = [];
        foreach ($favorites as $favorite) {
            array_push($favorite_shop, $favorite['shop_id']);
        }

        return view('shop', compact('shops', 'areas', 'genres'))->with("favorite_shop", $favorite_shop);
    }

    public function descending()
    {
        $user_id = Auth::id();
        $shops = Shop::all();
        $areas = Area::all();
        $genres = Genre::all();
        $favorites = Favorite::where('user_id', $user_id)->get()->toArray();
        $favorite_shop = [];
        foreach ($favorites as $favorite) {
            array_push($favorite_shop, $favorite['shop_id']);
        }
        $review_score = Review::select('shop_id')
                    ->selectRaw('AVG(score) as avg_score')
                    ->groupBy('shop_id')
                    ->orderBy('avg_score', 'desc')
                    ->get()
                    ->toArray();

        $descending_shops = [];

        foreach($review_score as $r){
            array_push($descending_shops, $r['shop_id']);
        }

        $whole_shops = Shop::select('id')->get()->toArray();
        $all_shops = [];
        foreach ($whole_shops as $shop) {
            array_push($all_shops, $shop['id']);
        }

        $no_score_shops = $all_shops;
        $no_score_shops = array_diff($no_score_shops, $descending_shops);
        $no_score_shops = array_values($no_score_shops);
        $shop_order = array_merge($descending_shops, $no_score_shops);

        $shop_id_order = [];
        for ($i = 0; $i<count($shop_order); $i++){
            array_push($shop_id_order, $shop_order[$i] - 1);
        }

        return view('shop_sort', compact('shops', 'areas', 'genres', 'favorite_shop', 'shop_id_order'));
    }

    public function ascending()
    {
        $user_id = Auth::id();
        $shops = Shop::all();
        $areas = Area::all();
        $genres = Genre::all();
        $favorites = Favorite::where('user_id', $user_id)->get()->toArray();
        $favorite_shop = [];
        foreach ($favorites as $favorite) {
            array_push($favorite_shop, $favorite['shop_id']);
        }
        $review_score = Review::select('shop_id')
                    ->selectRaw('AVG(score) as avg_score')
                    ->groupBy('shop_id')
                    ->orderBy('avg_score', 'asc')
                    ->get()
                    ->toArray();

        $ascending_shops = [];

        foreach($review_score as $r){
            array_push($ascending_shops, $r['shop_id']);
        }

        $whole_shops = Shop::select('id')->get()->toArray();
        $all_shops = [];
        foreach ($whole_shops as $shop) {
            array_push($all_shops, $shop['id']);
        }

        $no_score_shops = $all_shops;
        $no_score_shops = array_diff($no_score_shops, $ascending_shops);
        $no_score_shops = array_values($no_score_shops);
        $shop_order = array_merge($ascending_shops, $no_score_shops);

        $shop_id_order = [];
        for ($i = 0; $i<count($shop_order); $i++){
            array_push($shop_id_order, $shop_order[$i] - 1);
        }

        return view('shop_sort', compact('shops', 'areas', 'genres', 'favorite_shop', 'shop_id_order'));
    }
}
