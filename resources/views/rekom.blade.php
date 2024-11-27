<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website with Banner and Card</title>
    <link rel="stylesheet" href="css/recomended.css">
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        /* Styling for Banner Image */
        .banner {
            text-align: center;
            margin: 20px 0;
        }

        .banner img {
            width: 1090px;
            height: auto;
            border-radius: 8px; /* Optional: Add rounded corners */
        }

        /* Card Section */
        .card {
            display: flex;
            align-items: center;
            max-width: 1090px;
            height: 300px;
            margin: 20px auto;
            background-color: #f5f5f5;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .card-img {
            width: 200px;
            height: auto;
            border-radius: 8px 0 0 8px;
            margin: 30px;
        }

        .card-content {
            padding: 20px;
            width: 60%;
        }

        .card-content h2 {
            margin-bottom: 10px;
            font-size: 24px;
        }

        .card-content p {
            font-size: 20px;
            color: #333;
            text-align: justify;
        }

        /* Rating Section */
        .rating {
            font-size: 18px;
            color: #ffa500; /* Color for the stars */
            margin-top: 10px;
        }

        /* Button Styling */
        .btn {
            display: inline-block;
            margin-top: 5px;
            padding: 10px 20px;
            background-color: #654520;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .btn:hover {
            background-color: #4b3619;
        }

        .card .love-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            margin-top: 5;
            background-color: transparent;
            font-size: 24px;
            color: #ff4d4d; /* Red color for love icon */
            cursor: pointer;
        }

        .love-btn:hover {
            color: #ff1a1a; /* Darker red on hover */
        }
    </style>
</head>
<body>
    @include('layouts.navbar')
    <!-- Main Content with Banner -->
    <div class="banner">
        <img src="assets/rapat-lebar.svg" alt="Banner Image">
    </div>

    <!-- Card Section -->
    <div class="card">
        <img src="assets/flava.svg" alt="Card Image" class="card-img">
        <div class="card-content">
            <h2>Flava Cafe</h2>
            <p>Rp.15.000 - Rp.25.000</p> <br>
            <p>Salah satu cafe di Merjosari, Kota Malang, yang wajib kalian kunjungi! Di @flavacafe.id, kalian bisa nugas dan kerja dengan nyaman karena tempatnya estetik. Flava Cafe tidak hanya menawarkan kopi yang nikmat, tetapi juga tempat yang ideal untuk mengerjakan tugas atau rapat kecil. 🤩 📌</p>
            
            <!-- Rating Section -->
            <div class="rating">
                ★★★★☆ (4/5)
            </div>
            
            <!-- Read More Button -->
            <button class="btn">Selengkapnya</button>
        </div>
    </div>

    <!-- Duplicate cards for other cafe entries -->
    <div class="card">
        <img src="assets/flava.svg" alt="Card Image" class="card-img">
        <button class="love-btn">♥</button>
        <div class="card-content">
            <h2>Flava Cafe</h2>
            <p>Rp.15.000 - Rp.25.000</p> <br>
            <p>Salah satu cafe di Merjosari, Kota Malang, yang wajib kalian kunjungi! Di @flavacafe.id, kalian bisa nugas dan kerja dengan nyaman karena tempatnya estetik. Flava Cafe tidak hanya menawarkan kopi yang nikmat, tetapi juga tempat yang ideal untuk mengerjakan tugas atau rapat kecil. 🤩 📌</p>

            <div class="rating">
                ★★★★☆ (4/5)
            </div>

            <button class="btn">Selengkapnya</button>
        </div>
    </div>

    @include('layouts.footer')
</body>
</html>
