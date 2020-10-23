<div>
<div class="sidebar">
    <a class="active" href="{{route('admin.produk')}}">Menu Kelola Data Produk</a>
    <a href="{{route('admin.transaksi')}}">Menu Kelola Data Transaksi</a>
</div>

<div class="row">
    <div class="col-md-12">
        @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session('message')}}
        </div>
        @endif
    </div>
</div>
<div class="content">
    <div class="card-body p-0 border">
        <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand">Menu Kelola Data Produk</a>
        <form class="form-inline my-2 my-lg-0">
            <input wire:model="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </nav>
                <div class="card-body">
                    <form wire:submit.prevent="save">
                    <div class="form-group">
                        <label>1. Upload Gambar Produk</label>
                        <br>
                        <input type="file" wire:model="photo">
                        @error('photo') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label>2. Masukkan Keterangan Gambar Produk</label>
                        <div class="input-group">
                        <input wire:model="nama_produk" type="text" name="keterangan-gambar" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>3. Masukkan Harga Produk</label>
                        <div class="input-group">
                        <input wire:model="harga" type="number" name="harga-produk" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>4. Pilih Ketersediaan Produk</label>
                        <div class="input-group">
                        <input wire:model="tersedia" type="number" name="ketersediaan-produk" placeholder="(Produk Tersedia=1, Produk Habis=0 )" class="form-control">
                        </div>
                    <div class="form-group">
                        <label>5. Masukkan Ukuran Produk</label>
                        <div class="input-group">
                        <input wire:model="ukuran" type="text" name="ukuran-produk" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>6. Masukkan Kategori Produk</label>
                        <div class="input-group">
                        <input wire:model="kategori_id" type="number" name="kategori-produk" class="form-control">
                        </div>
                    </div>
                    <div class="text-right">
                        <button class="btn btn-icon icon-left btn-primary" type="submit">Simpan</button>
                    </form>
                </div>
                <div class="card-body">
                <div width="1000px" class="table">
                    <table class="table table-striped">
                    <tbody>
                    <tr style="background-color: yellow">
                        <td>No.</td>
                        <td>Gambar</td>
                        <td>Keterangan</td>
                        <td>Harga</td>
                        <td>Tersedia</td>
                        <td>Ukuran</td>
                        <td>Kategori_id</td>
                        <td>Action</td>
                    </tr>
                        <?php $no = 1 ?>
                        @forelse($produks as $produk)
                        <tr>
                        <td>{{ $no++ }}</td>
                        <td class="font-weight-600"><img src="{{ asset('/storage')}}/{{$produk->gambar}} " class="img-fluid" width="200"></td>
                        <td>{{ $produk->nama_produk }}</td>
                        <td><strong>Rp. {{ number_format($produk->harga) }}</strong></td>
                        <td>{{ $produk->tersedia }}</td>
                        <td>{{ $produk->ukuran }}</td>
                        <td>{{ $produk->kategori_id }}</td>
                        <td>
                            <a wire:click="destroy({{$produk->id}})" class="btn btn-danger">Hapus</a>
                        </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7">Data Kosong</td>
                        </tr>
                        @endforelse
                    </tbody></table>
                    </div>
                        {{$produks->links()}}
                </div>
            </div>
        </div>
</div>