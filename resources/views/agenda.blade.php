<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kafe dengan Agenda - MeetNMug</title>
    <style>
        /* Gaya yang telah Anda tentukan sebelumnya */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f9f4ed;
            color: #333;
        }

        .hero {
            position: relative;
            text-align: center;
            color: white;
            margin-bottom: 20px;
        }

        .hero img {
            width: 100%;
            height: 300px;
            object-fit: cover;
            opacity: 0.8;
        }

        .hero h1 {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 48px;
            font-weight: bold;
            color: #fff;
        }

        .cafe-list {
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
        }

        .cafe-card {
            display: flex;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 700px;
            padding: 20px;
            position: relative;
        }

        .cafe-card img.cafe-image {
            width: 150px;
            height: 150px;
            border-radius: 10px;
            object-fit: cover;
        }

        .cafe-info {
            flex: 1;
            padding-left: 20px;
        }

        .cafe-info h2 {
            font-size: 24px;
            color: #5a3829;
        }

        .cafe-info p {
            font-size: 14px;
            color: #333;
            margin: 5px 0;
        }

        .cafe-info .rating {
            color: #FFD700;
            margin-top: 10px;
        }

        .details-button {
            background-color: #8b5e3c;
            color: #fff;
            padding: 8px 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            font-weight: bold;
        }

        .details-button:hover {
            background-color: #5a3829;
        }

        .favorite {
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 20px;
            color: #8b5e3c;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <?php if (!session('user')): ?>
    <script>
        window.location.href = "/login"; // Redirect ke halaman login
    </script>
<?php endif; ?>
    @include('layouts.navbar')

    <!-- Cafe List Section -->
    <section class="cafe-list">
        @forelse($cafes as $cafe)
            <div class="cafe-card">
                <img src="{{ $cafe->foto_cafe ? asset('storage/' . $cafe->foto_cafe) : asset('images/default.jpg') }}" alt="{{ $cafe->nama_cafe }}" class="cafe-image">
                <div class="cafe-info">
                    <h2>{{ $cafe->nama_cafe }}</h2>
                    <p><strong>Waktu:</strong> {{ $cafe->jam_buka }} - {{ $cafe->jam_tutup }}</p>
                    <p>{{ $cafe->alamat }}</p>
                    <p class="rating">⭐⭐⭐⭐⭐</p>
                    <button class="details-button">Lihat Detail</button>
                    <span class="favorite">❤️</span>
                </div>
            </div>
        @empty
            <p>Tidak ada kafe dengan kategori agenda.</p>
        @endforelse
    </section>

    @include('layouts.footer')

</body>
</html>
