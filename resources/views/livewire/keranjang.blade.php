<div class="container">
    <div class="row mt-4 mb-2">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-dark">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Keranjang</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @if(session()->has('message'))
            <div class="alert alert-danger">
                {{ session('message') }}
            </div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-striped text-center">
                    <thead>
                        <tr style="background-color: yellow">
                            <td>No.</td>
                            <td>Gambar</td>
                            <td>Keterangan</td>
                            <td>Jumlah</td>
                            <td>Catatan</td>
                            <td>Harga</td>
                            <td><strong>Total Harga</strong></td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1 ?>
                        @forelse($pesanan_details as $pesanan_detail)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>
                                <img src="{{ asset('/storage') }}/{{ $pesanan_detail->produk->gambar }}" class="img-fluid" width="200">
                            </td>
                            <td>{{ $pesanan_detail->produk->nama_produk }}</td>
                            <td>{{ $pesanan_detail->jumlah_pesanan }}</td>
                            <td>
                                @if($pesanan_detail->catatan)
                                {{ $pesanan_detail->catatan }}
                                @else
                                    -
                                @endif
                            </td>
                            <td>Rp. {{ number_format($pesanan_detail->produk->harga) }}</td>
                            <td><strong>Rp. {{ number_format($pesanan_detail->total_harga) }}</strong></td>
                            <td><a wire:click="destroy({{ $pesanan_detail->id }})" class="btn btn-danger">Hapus</a></td>
                            
                        </tr>
                            @empty
                        <tr>
                            <td colspan="8">Data Kosong</td>
                        </tr>
                            @endforelse
                            @if(!empty($pesanan))
                        <tr>
                            <td colspan="7" align="right"><strong>Total Harga : </strong></td>
                            <td align="right"><strong>Rp. {{ number_format($pesanan->total_harga) }}</strong></td>
                        </tr>
                        <tr>
                            <td colspan="7" align="right"><strong>Kode Unik : </strong></td>
                            <td align="right"><strong>Rp. {{ number_format($pesanan->kode_unik) }}</strong></td>
                        </tr>
                        <tr>
                            <td colspan="7" align="right"><strong>Total Harga Yang Harus Dibayar: </strong></td>
                            <td align="right"><strong>Rp. {{ number_format($pesanan->total_harga-$pesanan->kode_unik) }}</strong></td>
                        </tr>
                        <tr>
                            <td colspan="7"></td>
                            <td colspan="2">
                                <a href="{{ route('checkout') }}" class="btn btn-success btn-block">
                                    <i class="fas fa-arrow-right"></i> Check Out
                                </a>
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
