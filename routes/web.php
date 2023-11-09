<?php

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\ProductsController;
use App\Http\Controllers\admin\RekeningController;
use App\Http\Controllers\admin\TransaksiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\user\CartController;
use App\Http\Controllers\user\CheckoutController;
use App\Http\Controllers\user\OrderController;
use App\Http\Controllers\user\ProductController;
use App\Http\Controllers\user\WelcomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();
Route::get('/', [WelcomeController::class, 'index'])->name('user.welcome');
Route::get('/about', [WelcomeController::class, 'about'])->name('user.about');
Route::get('/contact', [WelcomeController::class, 'contact'])->name('user.contact');
Route::get('/product', [ProductController::class, 'index'])->name('user.product');
Route::get('/product_detail/{id}', [ProductController::class, 'detail'])->name('user.productDetail');


Route::group(['middleware' => ['auth', 'checkRole:customer']], function(){
    Route::get('/cart', [CartController::class, 'index'])->name('user.cart');
    Route::post('/cart/store', [CartController::class, 'store'])->name('user.cart.store');
    Route::post('/cart/update', [CartController::class, 'update'])->name('user.cart.update');
    Route::get('/cart/delete/{id}', [CartController::class, 'delete'])->name('user.cart.delete');

    Route::get('/checkout', [CheckoutController::class, 'index'])->name('user.checkout');
    Route::get('/order', [OrderController::class, 'index'])->name('user.order');
    Route::get('/checkout/sukses', [OrderController::class, 'sukses'])->name('user.order.sukses');
    Route::post('/order/simpan', [OrderController::class, 'simpan'])->name('user.order.simpan');
    Route::get('/order/detail/{id}', [OrderController::class, 'detail'])->name('user.order.detail');
    Route::get('/order/bayar/{id}', [OrderController::class, 'pembayaran'])->name('user.order.bayar');
    Route::post('/order/buktiBayar/{id}', [OrderController::class, 'buktiBayar'])->name('user.order.buktiBayar');
    Route::get('/order/selesai/{id}', [OrderController::class, 'orderSelesai'])->name('user.order.selesai');
    Route::get('/order/batal/{id}', [OrderController::class, 'orderBatal'])->name('user.order.batal');
});

Route::group(['middleware' => ['auth', 'checkRole:admin']], function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/product', [ProductsController::class, 'index'])->name('admin.product.products');
    Route::get('/admin/product/tambah', [ProductsController::class, 'tambah'])->name('admin.product.tambah');
    Route::post('/admin/product/store', [ProductsController::class, 'store'])->name('admin.product.store');
    Route::get('/admin/product/edit/{id}', [ProductsController::class, 'edit'])->name('admin.product.edit');
    Route::post('/admin/product/update/{id}', [ProductsController::class, 'update'])->name('admin.product.update');
    Route::get('/admin/product/delete/{id}', [ProductsController::class, 'delete'])->name('admin.product.delete');

    Route::get('/admin/rekening', [RekeningController::class, 'index'])->name('admin.rekening.rekenings');
    Route::get('/admin/tambah', [RekeningController::class, 'tambah'])->name('admin.rekening.tambah');
    Route::post('/admin/store', [RekeningController::class, 'store'])->name('admin.rekening.store');
    Route::get('/admin/edit/{id}', [RekeningController::class, 'edit'])->name('admin.rekening.edit');
    Route::post('/admin/update/{id}', [RekeningController::class, 'update'])->name('admin.rekening.update');
    Route::get('/admin/delete/{id}', [RekeningController::class, 'delete'])->name('admin.rekening.delete');

    Route::get('/admin/users', [RekeningController::class, 'user'])->name('admin.user');
    
    Route::get('/admin/transaksi', [TransaksiController::class, 'index'])->name('admin.transaksi');
    Route::get('/admin/transaksi/detail/{id}', [TransaksiController::class, 'detail'])->name('admin.transaksi.detail');
    Route::get('/admin/transaksi/cek', [TransaksiController::class, 'cek'])->name('admin.transaksi.cek');
    Route::get('/admin/transaksi/konfirmasi/{id}', [TransaksiController::class, 'konfirmasi'])->name('admin.transaksi.konfirmasi');
    Route::get('/admin/transaksi/tolak/{id}', [TransaksiController::class, 'tolak'])->name('admin.transaksi.tolak');
    Route::get('/admin/transaksi/cancel', [TransaksiController::class, 'cancel'])->name('admin.transaksi.cancel');
    Route::get('/admin/transaksi/done', [TransaksiController::class, 'done'])->name('admin.transaksi.done');
});
