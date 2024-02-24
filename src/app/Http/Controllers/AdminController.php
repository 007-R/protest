<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Http\Requests\ImportRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Shop;
use App\Models\Master;
use App\Models\Review;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only(['userid', 'password']);
        $guard = $request->guard;

        if (Auth::guard('administrators')->attempt($credentials)) {
            return redirect("admin/");
        };
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

    public function master_edit()
    {
        $masters = Master::all();
        $reviews = Review::with('user', 'shop')->get();
        return view('admin.master_edit', compact('masters', 'reviews'));
    }

    public function master_creation(Request $request)
    {
        $new_shop_id = Master::latest('shop_id')->first();
        $new_shop_id = $new_shop_id['shop_id'] + 1;

        Master::create([
            'name' => $request->name,
            'userid' => $request->userid,
            'shop_id' => $new_shop_id,
            'password' => $request->password
        ]);

        $masters = Master::all();
        return view('admin.master_edit', compact('masters'))-> with('message', '代表者を新規登録しました');
    }
    public function review_delete(Request $request)
    {
        Review::where('user_id', $request->user_id)->where('shop_id', $request->shop_id)->delete();
        return redirect('/admin');
    }
    public function import(ImportRequest $request)
    {
        $shop = new Shop();
        if ($request->hasFile('csvFile')) {
        if ($request->csvFile->getClientOriginalExtension() !== "csv") {
                return redirect('/admin')->with('message', '不適切な拡張子です。');
                    }
            $newCsvFileName = $request->csvFile->getClientOriginalName();
            $request->csvFile->storeAs('public/csv', $newCsvFileName);
        } else {
            return redirect('/admin')->with('message', 'CSVファイルの取得に失敗しました。');
        }
        $csv = Storage::disk('local')->get("public/csv/{$newCsvFileName}");
        $csv = str_replace(array("\r\n", "\r"), "\n", $csv);
        $uploadedData = collect(explode("\n", $csv));

        $header = collect($shop->csvHeader());
        $uploadedHeader = collect(explode(",", $uploadedData->shift()));
        if ($header->count() !== $uploadedHeader->count()) {
            return redirect('/admin')->with('message', 'Error:ヘッダーが一致しません');
        }
        try {
            $shop = $uploadedData->map(fn($oneRecord) => $header->combine(collect(explode(",", $oneRecord))));
        } catch (Exception $e) {
            return redirect('/admin')->with('message', 'Error:ヘッダーが一致しません');
        }

        $fileName = $request->image->getClientOriginalName();
        $request->file('image')->storeAs('public/', $fileName);

        $new_shop = $shop->toArray()[0];

        foreach(['name', 'genre_id', 'area_id', 'description'] as $content){
            if(empty($new_shop[$content])){
                return redirect('/admin')->with('message', 'CSVの' . $content . 'が空欄です。');
            }
        }

        if(mb_strlen($new_shop['description']) > 400){
            return redirect('/admin')->with('message', 'CSVのdescriptionは400文字以内にしてください');
        }
        if(mb_strlen($new_shop['name']) > 50){
            return redirect('/admin')->with('message', 'CSVのnameは50文字以内にしてください');
        }

        Shop::create(['name' => $new_shop['name'],
            'area_id' => $new_shop['area_id'],
            'genre_id' => $new_shop['genre_id'],
            'description' => $new_shop['description'],
            'photo' => 'storage/' . $fileName,
            ]);

        return redirect('/admin');
    }

}
