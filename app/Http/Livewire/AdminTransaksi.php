<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\Kategori;
use App\Models\PesananDetail;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class AdminTransaksi extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search = '';
    public $pesanan_detail, $produk, $gambar, $pesanan;
    public $pesanan_details = [];
    public $pesanans = [];
    public $produks = [];

    protected $queryString = ['search'];

    public function destroy($id)
    {
    
        $pesanan_detail = PesananDetail::find($id);
        if(!empty($pesanan_detail)) {
            $pesanan = Pesanan::where('id', $pesanan_detail->pesanan_id)->first();
            $pesanan->delete();
        }

    //flash message
    session()->flash('message', "Data Transaksi Berhasil Dihapus.");

    //redirect
    return redirect()->route('admin.transaksi');
    }

    public function render()
    {
        if(Auth()->user()->level=="admin")
        {
            $this->pesanans = Pesanan::select()->get();
        }
        
        if($this->search) {
        $pesanans = Pesanan::where('kode_pemesanan', 'like', '%'.$this->search.'%')->paginate(10);
        }else{
            $pesanans = Pesanan::orderBy('kode_pemesanan', 'asc')->paginate(10);
        }

        return view('livewire.admin-transaksi', [
            'pesanans' => $pesanans,
            'pesanan' => Pesanan::latest()->get(),
            Pesanan::orderBy('kode_pemesanan', 'asc')->get(),
            ])
        ->extends('layouts.app');
    }
}
