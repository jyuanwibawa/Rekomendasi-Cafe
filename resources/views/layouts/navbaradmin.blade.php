<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Layout</title>
    <link rel="stylesheet" href="../navbaradmin.css">
    <script>
        window.onload = function() {
            @if (!session('user'))
                window.location.href = '/login'; 
            @endif
        };
    </script>
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <div class="logo">
            <img src="coffee-icon.png" alt="Logo">
            <h1>SiAdmin</h1>
        </div>
        <div class="user-info">
            @if(session('user'))
                <span class="username">
                    {{ session('user')->fullname }}
                </span>
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="logout-button">Logout</button>
                </form>
            @else
                <a href="/login" class="login-button">Login</a>
                <a href="/register" class="register-button">Register</a>
            @endif
        </div>
        
    </div>
    <div class="sidebar">
        <ul class="menu-list">            
            <li><a href="{{ route('admin.moods.index') }}">Kategori Mood</a></li>
            <li><a href="{{ route('admin.agendas.index') }}">Kategori Agenda</a></li>
            <li><a href="{{ route('admin.cafes.index') }}">Daftar Cafe</a></li>
            <li><a href="{{ route('admin.users.index') }}">Daftar User</a></li>


        </ul>
    </div>  
</body>
</html>
