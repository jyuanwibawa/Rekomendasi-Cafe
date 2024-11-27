<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil MeetNMug</title>
    <style>
        /* Global Styling */
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

        /* Navbar Styling */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #654520;
            padding: 10px 20px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        .navbar .logo img {
            height: 50px;
        }

        .navbar .nav-links {
            list-style: none;
            display: flex;
            justify-content: center;
            flex: 1;
            margin: 0;
            padding: 0;
        }

        .navbar .nav-links li {
            margin: 0 15px;
        }

        .navbar .nav-links li a {
            color: #fff;
            text-decoration: none;
            font-size: 18px;
            padding: 10px 15px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .navbar .nav-links li a:hover {
            background-color: #575757;
            color: #fff;
            border-radius: 5px;
        }

        .session-links {
            display: flex;
            align-items: center;
        }

        .session-links a {
            color: #fff;
            text-decoration: none;
            font-size: 18px;
            margin-left: 15px;
            padding: 10px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .session-links a:hover {
            background-color: #575757;
            border-radius: 5px;
        }

        .session-links .session-name {
            border: 2px solid #fff;
            border-radius: 5px;
            padding: 5px 15px;
            background-color: rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            font-weight: bold;
            gap: 5px;
        }

        .session-links .session-name:hover {
            background-color: #575757;
            color: #fff;
        }

        /* Profile Container */
        .profile-container {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            gap: 40px;
            padding: 40px 20px;
        }

        .profile-card,
        .profile-data {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 320px;
        }

        .profile-card {
            text-align: center;
        }

        .profile-card .profile-image {
            position: relative;
            width: 150px;
            height: 150px;
            margin: 0 auto;
            border-radius: 50%;
            overflow: hidden;
            border: 3px solid #8b5e3c;
        }

        .profile-card .profile-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .profile-card .profile-image .camera-icon {
            position: absolute;
            bottom: 5px;
            right: 5px;
            background-color: #8b5e3c;
            color: #fff;
            padding: 5px;
            border-radius: 50%;
            font-size: 14px;
            cursor: pointer;
        }

        .profile-card .profile-info h2 {
            margin-top: 15px;
            font-size: 20px;
            color: #5a3829;
        }

        .profile-card .profile-info p {
            color: #5a3829;
            opacity: 0.7;
        }

        /* Profile Data Form */
        .profile-data h3 {
            font-size: 20px;
            margin-bottom: 20px;
            color: #5a3829;
        }

        .profile-data form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .profile-data form input {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f2e8e3;
            color: #5a3829;
            font-size: 16px;
            text-align: left;
        }

        .profile-data form input[readonly] {
            background-color: #f2e8e3;
            color: #5a3829;
            border: 1px solid #8b5e3c;
        }

        .profile-data form button {
            background-color: #8b5e3c;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
        }

        .profile-data form button:hover {
            background-color: #5a3829;
        }

        .profile-container .separator {
            width: 1px;
            background-color: #ddd;
            margin: 0 20px;
        }

        /* General Styling for the Page */
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background-color: #5a3829;
            color: #fff;
        }

        header .logo {
            font-size: 24px;
            font-weight: bold;
        }

        header nav ul {
            list-style: none;
            display: flex;
            gap: 20px;
        }

        header nav ul li a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
        }

        header .profile-greeting {
            background-color: #8b5e3c;
            padding: 10px 15px;
            border-radius: 20px;
            color: #fff;
            font-size: 14px;
        }
    </style>
</head>

<body>
    @include('layouts.navbar')
    <div class="profile-container">

        <!-- Profile Data Form -->
        <div class="profile-data">
            <h3>Data Diri</h3>
            @if (session('user'))
                <!-- Tampilan Profil Pengguna -->
                <form action="{{ route('profile.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <label for="fullname">Nama Lengkap</label>
                    <input type="text" name="fullname" value="{{ old('fullname', $user->fullname) }}" required>

                    <label for="username">Username</label>
                    <input type="text" name="username" value="{{ old('username', $user->username) }}" required>

                    <label for="old_password">Password Lama</label>
                    <input type="password" name="old_password" required>

                    <label for="password">Password Baru</label>
                    <input type="password" name="password">

                    <label for="password_confirmation">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation">

                    <button type="submit">Perbarui Profil</button>
                </form>
            @else
                <p>Anda perlu login terlebih dahulu untuk mengakses halaman ini.</p>
            @endif


        </div>
    </div>@include('layouts.footer')
</body>

</html>
