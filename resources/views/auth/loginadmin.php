<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="../loginadmin.css"> <!-- Correct path to the CSS file -->
</head>

<body>
    <div class="login-container">
        <h2>Login</h2>
        <p>Selamat Datang Admin</p>

        <form action="{{ route('adminlogin') }}" method="POST">
            @csrf
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Username" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Password" required>

            <button type="submit">Login</button>
        </form>

        <!-- Menampilkan pesan error jika ada -->

    </div>
</body>

</html>