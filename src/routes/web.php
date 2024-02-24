<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SortController;

/*

|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/login', [AuthenticatedSessionController::class, 'tologin']);
Route::post('/login', [AuthenticatedSessionController::class, 'login']);
Route::get('/thanks',[AuthenticatedSessionController::class, 'thanks'])->middleware(['verified']);


Route::get('/', [ShopController::class, 'index']);
Route::get('/detail/{id}', [ShopController::class, 'detail']);
Route::post('/add', [ShopController::class, 'add']);
Route::post('/del', [ShopController::class, 'del']);

Route::get('/mypage', [ReservationController::class, 'mypage']);
Route::post('/done', [ReservationController::class, 'create']);
Route::post('/cancel', [ReservationController::class, 'cancel']);
Route::post('/change_info', [ReservationController::class, 'change_info']);
Route::post('/change', [ReservationController::class, 'change']);

Route::post('/reputation_info', [ReservationController::class, 'reputation_info']);
Route::post('/repute', [ReservationController::class, 'repute']);


Route::prefix('admin')->group(function () {
    Route::get('login', [AdminController::class, 'index'])->name('admin_return');
    Route::post('login', [AdminController::class, 'login']);
    Route::post('logout', [AdminController::class, 'logout']);
    Route::post('create_master', [AdminController::class, 'master_creation']);
    Route::post('/review/delete', [AdminController::class, 'review_delete']);
    Route::post('import', [AdminController::class, 'import']);
});

Route::prefix('admin')->middleware('auth:administrators')->group(function () {
    Route::get('/', [AdminController::class, 'master_edit']);
});


Route::prefix('master')->group(function () {
    Route::get('login', [MasterController::class, 'index'])->name('master_return');
    Route::post('login', [MasterController::class, 'login']);
    Route::post('logout', [MasterController::class, 'logout']);
    Route::post('edit', [MasterController::class, 'edit']);
    Route::post('message', [MasterController::class, 'message']);
});

Route::prefix('master')->middleware('auth.masters:masters')->group(function () {
    Route::get('/', [MasterController::class, 'shop_edit']);
});


Route::post("/payment", [PaymentController::class, "payment"]);


Route::get('/review/{id}', [ReviewController::class, 'input']);
Route::post('/review/register', [ReviewController::class, 'register']);
Route::post('/review/delete', [ReviewController::class, 'delete']);
Route::post('/review/edit', [ReviewController::class, 'edit']);

Route::get('/random', [SortController::class, 'random']);
Route::get('/descending', [SortController::class, 'descending']);
Route::get('/ascending', [SortController::class, 'ascending']);