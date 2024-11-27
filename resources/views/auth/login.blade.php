<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="../login.css">
</head>

<body>
    <div class="login-container">
        <h2>Login</h2>
        <p>Silahkan login terlebih dahulu</p>

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Username" value="{{ old('username') }}">
            <!-- Menampilkan pesan kesalahan untuk username -->
            @error('username')
                <div class="error-message">{{ $message }}</div>
            @enderror

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Password">
            <!-- Menampilkan pesan kesalahan untuk password -->
            @error('password')
                <div class="error-message">{{ $message }}</div>
            @enderror

            <button type="submit">Login</button>
        </form>

        @if (session('error'))
            <div class="error-message">
                {{ session('error') }}
            </div>
        @endif

        <p class="register">Belum punya akun? <a href="/register">Buat akun</a></p>
    </div>
</body>

</html>
