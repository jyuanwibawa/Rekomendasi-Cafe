<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website with Footer</title>
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        /* Footer Styles */
        .footer {
            background-color: #654520; /* Brown background */
            color: #fff;
            padding: 20px;
        }

        .footer-container {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .footer-left h2 {
            font-size: 28px;
            margin-bottom: 10px;
        }

        .footer-left p {
            font-size: 16px;
            margin-bottom: 10px;
            max-width: 300px;
        }

        .social-links {
            display: flex;
            gap: 15px;
        }

        .social-icon img {
            width: 24px;
            height: 24px;
        }

        .footer-right {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
        }

        .search-bar {
            padding: 10px;
            font-size: 16px;
            margin-bottom: 20px;
            border-radius: 4px;
            border: 1px solid #ccc;
            width: 250px;
        }

        .footer-links {
            list-style: none;
            padding: 0;
        }

        .footer-links a {
            color: #fff;
            text-decoration: none;
            font-size: 16px;
            margin-bottom: 10px;
            display: block;
        }

        .footer-links a:hover {
            text-decoration: underline;
        }

        .footer-bottom {
            text-align: center;
            margin-top: 20px;
        }

        .footer-bottom p {
            font-size: 14px;
        }
    </style>
</head>
<body>
    <!-- Footer -->
    <footer class="footer">
        <div class="footer-container">
            <!-- Left Section -->
            <div class="footer-left">
                <h2>MeethnMug</h2>
                <p>Temukan cafe terbaik yang sempurna untuk mood dan kebutuhanmu! Nikmati suasana yang pas untuk bekerja atau bersantai.</p>
                <div class="social-links">
                    <a href="#" class="social-icon"><img src="assets/instagram-icon.svg" alt="Instagram"></a>
                    <a href="#" class="social-icon"><img src="assets/facebook-icon.svg" alt="Facebook"></a>
                    <a href="#" class="social-icon"><img src="assets/youtube-icon.svg" alt="YouTube"></a>
                    <a href="#" class="social-icon"><img src="assets/whatsapp-icon.svg" alt="WhatsApp"></a>
                </div>
            </div>
            
            <!-- Right Section -->
            <div class="footer-right">
                <input type="text" placeholder="Cari disini..." class="search-bar">
                <div class="footer-links">
                    <a href="#mood">Find Cafe by Mood</a>
                    <a href="#activity">Find Cafe by Activity</a>
                    <a href="#meethnmug">MeethnMug</a>
                </div>
            </div>
        </div>

        <!-- Bottom Copyright -->
        <div class="footer-bottom">
            <p>Copyright © 2024 | By Kelompok 2 ❤</p>
        </div>
    </footer>
</body>
</html>
