<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mobil Sewaan</title>
    <link rel="stylesheet" href="css/styledaftar.css">
    {{-- <link rel="stylesheet" href="css/style.css"> --}}
</head>

<body>
    @include('nav')
    <main class="main flow justify-content-center">
        <h1 class="main__heading">Daftar Mobil Sewaan</h1>
        <div class="card-wrapper mr-5">
            @foreach ($mobils as $m)
                <div class="card mb-5">
                    @if ($m->image_url)
                        <img src="{{ asset('storage/' . $m->image_url) }}" class="card-img-top"
                            alt="{{ $m->brand }} {{ $m->model }}">
                    @else
                        <img src="https://source.unsplash.com/car" alt="Car Image">
                    @endif
                    <div class="card-content">
                        <h5 class="card-title">{{ $m->brand }} {{ $m->model }}</h5>
                        <p class="card-text">Harga: Rp {{ number_format($m->price_per_day, 0, ',', '.') }} / hari</p>
                        <a href="https://wa.me/6289685617092/?text=Saya%20ingin%20menyewa%20{{ $m->brand }}%20{{ $m->model }}%20saat%20ini"
                            class="badge bg-info">Sewa Sekarang</a>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
</body>

</html>
