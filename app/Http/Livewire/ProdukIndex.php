<?php

namespace App\Http\Livewire;

use App\Models\Produk;
use Livewire\Component;
use Livewire\WithPagination;

class ProdukIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }
    
    public $search;

    protected $updateQueryString = ['search'];

    public function render()
    {
        if($this->search) {
        $produks = Produk::where('nama_produk', 'like', '%'.$this->search.'%')->paginate(8);
        }else{
            $produks = Produk::paginate(8);
        }
        
        return view('livewire.produk-index', [
            'produks' => $produks,
            'title' => 'List Produk Sedekah'
            ])
            ->extends('layouts.app');
    }
}
