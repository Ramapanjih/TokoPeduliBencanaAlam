<div class="container">

    {{-- BANNER --}}
    <div class="banner mt-4">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
        <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="assets/slider/slider11.jpg" class="d-block w-100" alt="1">
        </div>
        <div class="carousel-item">
            <img src="assets/slider/slider_2.png" class="d-block w-100" alt="2">
        </div>
        <div class="carousel-item">
            <img src="assets/slider/slider1.jpg" class="d-block w-100" alt="">
        </div>
        </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span   span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    {{-- PILIH kategori --}}
    <section class="pilih-kategori mt-4">
        <h3><strong>Pilih Kategori</strong></h3>
        <div class="row slider mt-4">
            
            @foreach ($kategoris as $kategori)
            <div class="wrapper">
                <div class="card-makan shadow">
                    <img src="{{ url('assets/kategori') }}/{{ $kategori->gambar }}" class="img-fluid">
                    <div class="info text-center">
                        <h3><strong>{{ $kategori->nama_kategori }}</strong></h3>
                        <a href="{{ route('produk.kategori', $kategori->id) }}" class="btn">Bantu Sekarang!!!</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>


</div>
