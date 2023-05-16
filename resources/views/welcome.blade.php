<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Quizzer Application</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Quizzer</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            @if (Route::has('login'))
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/dashboard') }}">Dashboard</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Log in</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                    @endif
                @endauth
            @endif
        </ul>
    </div>
</nav>

<!-- Your content here -->
<main>
    <div class="d-flex align-items-center justify-content-center hero-image">
        <div class="hero-text text-center w-100">
            <h1>Quizzer: Bilgi Yarışması!</h1>
            <p>Quizzer uygulamasıyla bilginizi test edin ve öğrenmeye devam edin. Yüzlerce farklı konu hakkında binlerce soru sizleri bekliyor.</p>
            <a href="{{ route('register') }}" class="btn btn-primary btn-lg">Hemen Kaydolun</a>
        </div>
    </div>

    <section class="container features mt-5">
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Yüzlerce Quiz</h5>
                        <p class="card-text">Farklı konular hakkında yüzlerce quiz ile bilginizi test edin.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Gelişim Analizi</h5>
                        <p class="card-text">Quiz sonuçlarınızı analiz edin ve gelişiminizi takip edin.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Yeni Bilgiler Öğrenin</h5>
                        <p class="card-text">Quizler sayesinde yeni bilgiler öğrenin ve bilginizi genişletin.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>


</body>
</html>
