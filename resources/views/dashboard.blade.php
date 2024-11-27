<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
@include('layouts.navbar')
<body>
    <div class="container">
        @if(session('user'))
            <!-- Jika pengguna sudah login -->
            <h1>Welcome to Your Dashboard</h1>
            <p>Selamat datang di halaman dashboard</p>
            
            <!-- Menampilkan Data Agenda -->
            <h2>Agenda</h2>
            @if($agendas->isEmpty())
                <p>Belum ada agenda.</p>
            @else
                <ul>
                    @foreach($agendas as $agenda)
                        <li>
                            <h3>{{ $agenda->nama_kategori_agenda }}</h3>
                            <!-- Menampilkan Foto Agenda -->
                            @if($agenda->foto_agenda)
                                <img src="{{ asset('storage/' . $agenda->foto_agenda) }}" alt="Agenda Foto" width="100">
                            @endif
                        </li>
                    @endforeach
                </ul>
            @endif

            <!-- Menampilkan Data Mood -->
            <h2>Mood</h2>
            @if($moods->isEmpty())
                <p>Belum ada mood.</p>
            @else
                <ul>
                    @foreach($moods as $mood)
                        <li>
                            <h3>{{ $mood->nama_kategori_mood }}</h3>
                            <!-- Menampilkan Foto Mood -->
                            @if($mood->foto_mood)
                                <img src="{{ asset('storage/' . $mood->foto_mood) }}" alt="Mood Foto" width="100">
                            @endif
                        </li>
                    @endforeach
                </ul>
            @endif

            <!-- Menampilkan Data Cafe -->
            <h2>Cafe</h2>
            @if($cafes->isEmpty())
                <p>Belum ada cafe.</p>
            @else
                <ul>
                    @foreach($cafes as $cafe)
                        <li>
                            <h3>{{ $cafe->nama_cafe }}</h3>
                            <!-- Menampilkan Foto Cafe -->
                            @if($cafe->foto_cafe)
                                <img src="{{ asset('storage/' . $cafe->foto_cafe) }}" alt="Cafe Foto" width="100">
                            @endif
                        </li>
                    @endforeach
                </ul>
            @endif

            <a href="{{ url('/logout') }}">Logout</a>
        @else
            <!-- Jika pengguna belum login -->
            <h1>Anda Belum Login</h1>
            <p>Silakan login untuk mengakses dashboard.</p>
            <a href="/login">Login</a>
        @endif
    </div>
</body>
@include('layouts.footer')
</html>
