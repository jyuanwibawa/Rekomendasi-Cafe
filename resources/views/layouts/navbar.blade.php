<nav class="navbar">
    <div class="logo">
        <img src="{{ asset('assets/logo.svg') }}" alt="Logo" style="height: 50px;">
    </div>
    <ul class="nav-links">
        <li><a href="#home">Home</a></li>
        <li><a href="#about">By Mood</a></li>
        <li><a href="#services">By Activity</a></li>
    </ul>
    <div class="session-links">
        <?php if (session('user')): ?>
            <a href="#profile" class="session-name">👋 Hello, <?= session('user')->fullname; ?></a>
        <?php else: ?>
            <a href="/login">Login</a>
            <a href="/register">Register</a>
        <?php endif; ?>
    </div>
</nav>

<style>
/* General Navbar Styles */
.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #654520;
    padding: 10px 20px;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); /* Optional shadow for depth */
}

/* Logo Styles */
.navbar .logo img {
    height: 50px;
}

/* Navigation Links Styles */
.navbar .nav-links {
    list-style: none;
    display: flex;
    justify-content: center;
    flex: 1; /* Allows nav-links to take up space and center properly */
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

/* Session Links Styles */
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

/* Special Styling for Session Name */
.session-links .session-name {
    border: 2px solid #fff;
    border-radius: 5px;
    padding: 5px 15px;
    background-color: rgba(255, 255, 255, 0.1);
    display: flex;
    align-items: center;
    font-weight: bold; /* Makes the session name stand out */
    gap: 5px; /* Adds spacing between the icon and text */
}

/.session-links .session-name:hover {
    background-color: #575757;
    color: #fff;
}
</style>
