<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Simple Klinik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
</head>
<body>
        <header class="d-flex justify-content-center py-3 bg-dark">
          <ul class="nav nav-pills">
            <li class="nav-item"><a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}" aria-current="page">Home</a></li>
            <li class="nav-item"><a class="nav-link {{ Request::is('klinik') ? 'active' : '' }}" href="{{ route('klinik.index') }}">Klinik</a></li>
            <li class="nav-item"><a class="nav-link {{ Request::is('pasien') ? 'active' : '' }}" href="{{ route('pasien.index') }}">Pasien</a></li>
            <li class="nav-item"><a class="nav-link {{ Request::is('rekam') ? 'active' : '' }}" href="{{ route('rekam.index') }}">Rekam Medis</a></li>
            <li class="nav-item"><a class="nav-link {{ Request::is('dokter') ? 'active' : '' }}" href="{{ route('dokter.index') }}">Dokter</a></li>
            <li class="nav-item"><a class="nav-link {{ Request::is('pemeriksaan') ? 'active' : '' }}" href="{{ route('pemeriksaan.index') }}">Pemeriksaan</a></li>
            <li class="nav-item"><a class="nav-link {{ Request::is('petugas') ? 'active' : '' }}" href="{{ route('petugas.index') }}">Petugas</a></li>
            <li class="nav-item"><a class="nav-link {{ Request::is('jabatan') ? 'active' : '' }}" href="{{ route('jabatan.index') }}">Jabatan</a></li>
            @auth     
            <li class="nav-item"> <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                <i class="icon icon-user"></i>
                {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
                </form>
            </li>
            @endauth
          </ul>
        </header>
        <main>
            @yield('content')
        </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>