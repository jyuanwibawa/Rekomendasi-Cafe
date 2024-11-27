<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - How's your mood?</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f5f0e6;
            color: #4a3f35;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px 0;
        }

        h1, h2 {
            color: #4a3f35;
        }

        p {
            font-size: 1em;
            margin-bottom: 20px;
        }

        .section {
            margin-bottom: 40px;
        }

        .grid {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .grid-item {
            flex: 1 1 calc(25% - 20px);
            text-align: center;
            max-width: 300px;
        }

        .grid-item img {
            width: 300px;
            height: 200px;
            object-fit: cover; /* Agar gambar menyesuaikan ukuran tanpa distorsi */
            border-radius: 10px;
        }

        .grid-item p {
            background-color: #6b4f3f;
            color: #fff;
            padding: 10px;
            border-radius: 0 0 10px 10px;
            margin: 0;
        }

        a {
            text-decoration: none;
            color: #4a3f35;
            font-weight: bold;
        }

        a:hover {
            color: #6b4f3f;
        }
    </style>
</head>

@include('layouts.navbar')

<body>
    <div class="container">
        @if(session('user'))
            <div class="section">
                <h1>Welcome to Your Dashboard</h1>
                <p>Selamat datang di halaman dashboard. Temukan kafe yang cocok dengan suasana hatimu.</p>
            </div>

            <!-- Menampilkan Data Mood -->
            <div class="section">
                <h2>How's your mood?</h2>
                @if($moods->isEmpty())
                    <p>Belum ada mood.</p>
                @else
                    <div class="grid">
                        @foreach($moods as $mood)
                            <div class="grid-item">
                                @if($mood->foto_mood)
                                    <img src="{{ asset('storage/' . $mood->foto_mood) }}" alt="Mood Foto">
                                @endif
                                <p>{{ $mood->nama_kategori_mood }}</p>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
            <!-- Menampilkan Data Agenda -->
            <div class="section">
                <h2>What do you want to do now?</h2>
                @if($agendas->isEmpty())
                    <p>Belum ada agenda.</p>
                @else
                    <div class="grid">
                        @foreach($agendas as $agenda)
                            <div class="grid-item">
                                @if($agenda->foto_agenda)
                                    <img src="{{ asset('storage/' . $agenda->foto_agenda) }}" alt="Agenda Foto">
                                @endif
                                <p>{{ $agenda->nama_kategori_agenda }}</p>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        @else
            <div class="section">
                <h1>Anda Belum Login</h1>
                <p>Silakan login untuk mengakses dashboard.</p>
                <a href="/login">Login</a>
            </div>
        @endif
    </div>
</body>

@include('layouts.footer')

</html>
