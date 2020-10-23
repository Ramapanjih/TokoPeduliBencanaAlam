<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Produk;
use App\Models\Kategori;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminProduk extends Component
{
    use WithPagination;

    use WithFileUploads;

    protected $paginationTheme = 'bootstrap';
    
    public $search ;

    public $kategori, $photo, $gambar, $produk, $nama_produk, $harga, $tersedia, $ukuran, $kategori_id;

    protected $queryString = ['search'];

    public function destroy($id)
    {
    $produk = Produk::find($id);

    if($produk) {
        $produk->delete();
    }

    //flash message
    session()->flash('message', 'Data Berhasil Dihapus.');

    //redirect
    return redirect()->route('admin.produk');

    }
    
    public function save()
    {
        $this->validate([
            'photo' => 'image|max:1024', // 1MB Max
            'nama_produk' => 'required',
            'harga' => 'required',
            'tersedia' => 'required',
            'ukuran' => 'required',
            'kategori_id' => 'required',
        ]);

        $gambar=$this->photo->store('gambar_produk', 'public');

        Produk::create([
            'gambar' => $gambar,
            'nama_produk' => $this->nama_produk,
            'harga' => $this->harga,
            'tersedia' => $this->tersedia,
            'ukuran' => $this->ukuran,
            'kategori_id' => $this->kategori_id
        ]);

        $produk = Produk::where('produk_id', $this->produk->id)->first();
        $produk->update([
            'gambar' => $gambar
        ]);

        //flash message
        session()->flash('message', "Data Produk Berhasil Ditambahkan.");

        //redirect
        return redirect()->route('admin.produk');
    }
    
    public function render()
    {
        if(Auth()->user()->level=="admin")
        {
            $this->produk = Produk::select()->get();
        }
        if($this->search) {
        $produks = Produk::where('nama_produk', 'like', '%'.$this->search.'%')->paginate(10);
        }else{
            $produks = Produk::orderBy('nama_produk', 'asc')->paginate(10);
        }

        return view('livewire.admin-produk', [
            'produks' => $produks,
            'produk' => Produk::latest()->get(),
            Produk::orderBy('nama_produk', 'asc')->get(),
        ])
        ->extends('layouts.app');
    }
}
