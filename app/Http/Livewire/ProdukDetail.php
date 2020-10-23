<?php

namespace App\Http\Livewire;

use App\Models\Produk;
use App\Models\Pesanan;
use App\Models\PesananDetail;
use App\Http\Livewire\Navbar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ProdukDetail extends Component
{
    public $produk, $catatan, $jumlah_pesanan;
    
    public function mount($id)
    {
        $productDetail = produk::find($id);

        if($productDetail) {
            $this->produk = $productDetail;
        }
    }

    public function masukkanKeranjang()
    {
        $this->validate([
            'jumlah_pesanan' => 'required'
        ]);

        //Validasi Jika Belum Login
        if(!Auth::user()) {
            return redirect()->route('login');
        }

        //Menghitung Total Harga
        
        $total_harga = $this->jumlah_pesanan*$this->produk->harga;

        //Ngecek Apakah user punya data pesanan utama yg status nya 0
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();

        //Menyimpan / Update Data Pesanan Utama
        if(empty($pesanan))
        {
            Pesanan::create([
                'user_id' => Auth::user()->id,
                'total_harga' => $total_harga,
                'status' => 0,
                'kode_unik' => mt_rand(100, 999),
            ]);

            $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
            $pesanan->kode_pemesanan = 'TPB-'.$pesanan->id;
            $pesanan->update();

        }else {
            $pesanan->total_harga = $pesanan->total_harga;
            $pesanan->update();
        }

        //Meyimpanan Pesanan Detail
        PesananDetail::create([
            'produk_id' => $this->produk->id,
            'pesanan_id' => $pesanan->id,
            'tersedia' => $this->produk->tersedia,
            'ukuran' => $this->produk->ukuran,
            'kategori_id' => $this->produk->kategori_id,
            'catatan' => $this->catatan,
            'jumlah_pesanan' => $this->jumlah_pesanan,
            'total_harga'=> $total_harga
        ]);

        $this->emit('masukKeranjang');

        session()->flash('message', 'Sukses Masuk Keranjang');

        return redirect()->back();


    }

    public function render()
    {
        return view('livewire.produk-detail')
        ->extends('layouts.app');
    }
}
