<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="../register.css">
</head>

<body>
    <div class="register-container">
        <h2>Register</h2>
        <p>Silahkan buat akun terlebih dahulu</p>

        <form action="{{ route('register') }}" method="POST">
            @csrf
            <label for="fullname">Nama Lengkap</label>
            <input type="text" id="fullname" name="fullname" placeholder="Nama Lengkap" required>

            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Username" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Password" required>

            <label for="password_confirmation">Konfirmasi Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation"
                placeholder="Konfirmasi Password" required>

            <button type="submit">Register</button>
        </form>

        <!-- Menampilkan pesan kesalahan jika ada -->
        @if ($errors->any())
            <div class="error-message">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <p class="login">Sudah punya akun? <a href="/login">Masuk</a></p>
    </div>

</body>

</html>
