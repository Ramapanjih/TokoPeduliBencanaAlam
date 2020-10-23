<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/', \App\Http\Livewire\Home::class)->name('home');
Route::get('Produk-Toko-Peduli-Bencana', \App\Http\Livewire\ProdukIndex::class)->name('produk');
Route::get('Produk-Toko-Peduli-Bencana/Kategori/{kategoriId}', \App\Http\Livewire\ProdukKategori::class)->name('produk.kategori');
Route::get('Produk-Toko-Peduli-Bencana/{id}', \App\Http\Livewire\ProdukDetail::class)->name('produk.detail');
Route::get('Keranjang', \App\Http\Livewire\Keranjang::class)->name('keranjang');
Route::get('Checkout', \App\Http\Livewire\Checkout::class)->name('checkout');
Route::get('History', \App\Http\Livewire\History::class)->name('history');

Route::group(['middleware' => ['auth', 'ceklevel:admin']], function () {
    Route::get('Admin/MenuKelolaDataProduk', \App\Http\Livewire\AdminProduk::class)->name('admin.produk');
    Route::get('Admin/MenuKelolaDataTransaksi', \App\Http\Livewire\AdminTransaksi::class)->name('admin.transaksi');
});