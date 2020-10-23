<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Post;

class Posts extends Component
{
    use WithPagination;

    public $search;
    public $postId,$nama_produk,$harga,$tersedia,$ukuran,$gambar,$kategori_id;
    public $isOpen = 0;

    public function render()
    {       
        $searchParams = '%'.$this->search.'%';
        return view('livewire.posts', [
            'posts' => Post::where('title','like', $searchParams)->latest()->paginate(5)
        ]);
    }

    public function showModal() {
        $this->isOpen = true;
    }

    public function hideModal() {
        $this->isOpen = false;
    }

    public function store(){
        $this->validate(
            [
                'nama_produk' => 'required',
                'harga' => 'required',
                'tersedia' => 'required',
                'ukuran' => 'required',
                'gambar' => 'required',
                'katagori_id' => 'required',
            ]
        );

        Post::updateOrCreate(['id' => $this->postId], [
            'nama_produk' => $this->nama_produk,
            'harga' => $this->harga,
            'tersedia' => $this->tersedia,
            'ukuran' => $this->ukuran,
            'gambar' => $this->gambar,
            'kategori_id' => $this->kategori_id
        ]);

        $this->hideModal();

        session()->flash('info', $this->postId ? 'Post Update Successfully' : 'Post Created Successfully' );

        $this->postId = '';
        $this->nama_produk = '';
        $this->harga = '';
        $this->tersedia = '';
        $this->ukuran = '';
        $this->gambar = '';
        $this->kategori_id = '';
    }

    public function edit($id){
        $post = Post::findOrFail($id);
        $this->postId = $id;
        $this->nama_produk = $post->nama_produk;
        $this->harga = $post->harga;
        $this->tersedia = $post->tersedia;
        $this->ukuran = $post->ukuran;
        $this->gambar = $post->gambar;
        $this->kategori_id = $post->kategori_id;

        $this->showModal();
    }

    public function delete($id){
        Post::find($id)->delete();
        session()->flash('delete','Post Successfully Deleted');
    }
}
