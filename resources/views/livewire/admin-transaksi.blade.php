<div>
<div class="sidebar">
    <a href="{{route('admin.produk')}}">Menu Kelola Data Produk</a>
    <a class="active" href="{{route('admin.transaksi')}}">Menu Kelola Data Transaksi</a>
</div>

<div class="row">
        <div class="col-md-12">
            @if(session()->has('message'))
            <div class="alert alert-danger">
                {{ session('message')}}
            </div>
            @endif
        </div>
    </div>
<div class="content">
    <div class="card-body p-0 border">
        <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand">Menu Kelola Data Transaksi</a>
        <form class="form-inline my-2 my-lg-0">
            <input wire:model="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        </nav>
        <div class="row mt-4">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table text-center">
                    <thead class="thead-dark">
                        <tr style="background-color: yellow">
                            <td>No.</td>
                            <td>Tanggal Pesan</td>
                            <td>User</td>
                            <td>Kode Pemesanan</td>
                            <td>Pesanan</td>
                            <td>Catatan</td>
                            <td>Status</td>
                            <td><strong>Total Harga</strong></td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1 ?>
                        @forelse ($pesanans as $pesanan)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $pesanan->created_at }}</td>
                            <td>{{ $pesanan->user->name }}</td>
                            <td>{{ $pesanan->kode_pemesanan }}</td>
                            <td>
                                <?php $pesanandetails = App\Models\PesananDetail::where('pesanan_id', $pesanan->id)->get(); ?>
                                @forelse ($pesanan_details as $pesanan_detail)
                                <img src="{{ asset('/storage') }}/{{ $pesanan_detail->produk->gambar }}"
                                    width="100px" height="100px">
                                    <br>
                                {{ $pesanan_detail->jumlah_pesanan }} X
                                {{ $pesanan_detail->produk->nama_produk }}
                                <br>
                                @empty
                                <p>Tidak Ada</p>
                                @endforelse
                            </td>
                            <td>
                                <?php $pesanandetails = App\Models\PesananDetail::where('pesanan_id', $pesanan->id)->get(); ?>
                                @forelse ($pesanandetails as $pesanan_detail)
                                {{ $pesanan_detail->catatan }}
                                @empty
                                <p>Tidak Ada</p>
                                @endforelse
                            </td>
                            <td>
                                <label class="label {{ ($pesanan->status == 1) ? 'label-danger' : 'label-success' }}">
                                    {{ ($pesanan->status == 1) ? 'Belum Bayar' : 'Lunas' }}
                                </label>
                            </td>
                            <td><strong>Rp. {{ number_format($pesanan->total_harga) }}</strong></td>
                            <td>
                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input"
                                        id="pesanan-{{$pesanan->id}}" {{($pesanan->status) ? 'checked' : ''}}
                                        onclick="changePesananStatus(event.target, {{ $pesanan->id }});">
                                        <label class="custom-control-label pointer"></label>
                                    </div>
                                </div>
                                <a wire:click="destroy({{ $pesanan->id }})" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7">Data Kosong</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
                {{ $pesanans->links() }}
        </div>
    </div>
</div>