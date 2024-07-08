<!doctype html>
<html lang="en">

<head>
    <title>{{ $title }}</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    @include('nav')

    {{-- @if (session('alert'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session('alert') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif --}}

    <main>
        <section class="text-center">
            <h2 id="text"><span>It's time for a new adventure in Bali</span><br />whybali</h2>
            <img src="https://user-images.githubusercontent.com/65358991/170092504-132fa547-5ced-40e5-ab64-ded61518fac2.png"
                id="bird1" />
            <img src="https://user-images.githubusercontent.com/65358991/170092542-9747edcc-fb51-4e21-aaf5-a61119393618.png"
                id="bird2" />
            <img src="https://user-images.githubusercontent.com/65358991/170092559-883fe071-eb4f-4610-8c8b-a037d061c617.png"
                id="forest" class="w-100" />
            <img src="https://user-images.githubusercontent.com/65358991/170092605-eada6510-d556-45cc-b7fa-9e4d1d258d26.png"
                id="rocks" />
            <img src="https://user-images.githubusercontent.com/65358991/170092616-5a70c4af-2eed-496f-bde9-b5fcc7142a31.png"
                id="water" />
        </section>

        <div class="sec row mr-0 d-flex justify-content-center">
            <div class="col-lg-8">
                <h2>selamat datang di WhyBali</h2>
                <p>
                    #1 Jasa Sewa Mobil di Bali Terbaik di Bali dan Berpengamalan
                    Perusahaan kami berdiri sejak tahun 2003. Kami sangat paham atas apa
                    yang menjadi keinginan para wisatawan atau pengguna transportasi di
                    Bali . Yaitu Anti Ribet tapi Pelayanan Harus selalu Profesional.
                    Perusahaan Kami adalah persewaan mobil di Bali termurah No #1.
                </p>
                <ul>
                    <li>
                        <p>Layanan customer service yang ramah dan friendly</p>
                    </li>
                    <li>
                        <p>Sopir yang ramah dan berpengalaman lebih dari 10 tahun</p>
                    </li>
                    <li>
                        <p>kami adalah ahlinya di bidang persewaan rental mobil</p>
                    </li>
                </ul>

                <!-- Feedback Form -->
                @auth
                    <h3>Feedback Pengguna</h3>
                    <form method="POST" action="/feedback">
                        @csrf <!-- CSRF protection -->
                        <div class="mb-3">
                            <label for="rating" class="form-label">Rating:</label>
                            <select class="form-select" id="rating" name="rating" required>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="comment" class="form-label">Komentar:</label>
                            <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Kirim Feedback</button>
                    </form>
                @else
                    <p>Silakan <a href="/login">login</a> untuk memberikan feedback.</p>
                @endauth

                <hr>
                <!-- Feedback List -->
                <h3>Daftar Feedback</h3>
                @foreach ($feedbacks as $feedback)
                    <div class="card mb-3">
                        <div class="card-body">
                            @if ($feedback->user)
                                <h5 class="card-title text-muted">{{ $feedback->user->username }}</h5>
                            @else
                                <h5 class="card-title text-muted">Unknown User</h5>
                            @endif

                            <h6 class="card-subtitle mb-2 text-muted">Rating: {{ $feedback->rating }}/5</h6>
                            <p class="card-text text-muted">{{ $feedback->comment }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
    <script src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>
