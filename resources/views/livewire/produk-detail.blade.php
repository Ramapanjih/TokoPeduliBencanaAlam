<div class="container">
    <div class="row mt-4 mb-2">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-dark">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('produk') }}" class="text-dark">List Produk Sedekah</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Produk Sedekah Detail</li>
                </ol>
            </nav>
        </div>
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
    <div class="row">
        <div class="col-md-6">
            <div class="card gambar-produkdetail">
                <div class="card-body">
                    <img src="{{ asset('/storage')}}/{{ $produk->gambar }}" class="img-fluid">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <h2>
                <strong>{{ $produk->nama_produk }}</strong>
            </h2>
            <h4>
                Rp. {{ number_format($produk->harga) }}
                @if ($produk->tersedia == 1)
                <span class="badge badge-pill badge-success"><i class="fas fa-check"></i> Ready Stok</span>
                @else
                <span class="badge badge-pill badge-danger"><i class="fas fa-times"></i> Stok Habis</span>
                @endif
            </h4>
            <div class="row">
                <div class="col">
                    <form wire:submit.prevent="masukkanKeranjang">
                    <table class="table" style="border-top:hidden">
                        <tr>
                            <td>Kategori</td>
                            <td>:</td>
                            <td>
                                <h5><strong>{{ $produk->kategori->nama_kategori }}</strong></h5>
                            </td>
                        </tr>
                        <tr>
                            <td>Ukuran</td>
                            <td>:</td>
                            <td>
                                <h5><strong>{{ $produk->ukuran }}</strong></h5>
                            </td>
                        </tr>
                        <tr>
                            <td>Jumlah</td>
                            <td>:</td>
                            <td>
                                <input id="jumlah_pesanan" type="number"
                                    class="form-control @error('jumlah_pesanan') is-invalid @enderror"
                                    wire:model="jumlah_pesanan" value="{{ old('jumlah_pesanan') }}" required
                                    autocomplete="name" autofocus>
                                @error('jumlah_pesanan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>Catatan</td>
                            <td>:</td>
                            <td>
                                <input id="catatan" type="text"
                                    class="form-control @error('catatan') is-invalid @enderror"
                                    wire:model="catatan" value="{{ old('catatan') }}"
                                    autocomplete="name" autofocus>
                                @error('catatan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <button type="submit" class="btn btn-dark btn-block" @if($produk->tersedia !== 1) disabled @endif><i class="fas fa-shopping-cart"></i> Masukkan Keranjang</button>
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
