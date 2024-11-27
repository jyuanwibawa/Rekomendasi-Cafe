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
            @error('fullname')
                <div class="error-message">{{ $message }}</div>
            @enderror

            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Username" required>
            @error('username')
                <div class="error-message">{{ $message }}</div>
            @enderror

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Password" required>
            @error('password')
                <div class="error-message">{{ $message }}</div>
            @enderror

            <label for="password_confirmation">Konfirmasi Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation"
                placeholder="Konfirmasi Password" required>
            @error('password_confirmation')
                <div class="error-message">{{ $message }}</div>
            @enderror

            <button type="submit">Register</button>
        </form>

        <p class="login">Sudah punya akun? <a href="/login">Masuk</a></p>
    </div>
</body>

</html>
