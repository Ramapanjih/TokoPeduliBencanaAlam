<?php

namespace App\Http\Livewire;

use App\Models\Kategori;
use App\Models\Produk;
use Livewire\Component;
use Livewire\WithPagination;

class ProdukKategori extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search, $kategori;

    protected $updateQueryString = ['search'];

    public function updatingSearch()
    {
        $this->resetPage();
    }
    
    public function mount($kategoriId)
    {
        $kategoriDetail = Kategori::find($kategoriId);

        if($kategoriDetail) {
            $this->kategori = $kategoriDetail;
        }
    }

    public function render()
    {
        if($this->search) {
        $produks = Produk::where('kategori_id', $this->kategori->id)->where('nama_produk', 'like', '%'.$this->search.'%')->paginate(8);
        }else{
            $produks = Produk::where('kategori_id', $this->kategori->id)->paginate(8);
        }

        return view('livewire.produk-index', [
            'produks' => $produks,
            'title' => 'Produk Sedekah '.$this->kategori->nama_kategori
        ])
        ->extends('layouts.app');
    }
}
