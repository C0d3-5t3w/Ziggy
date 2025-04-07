<?php
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
header("Content-Type: text/html; charset=UTF-8");
header("timezone: PMT");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ziggy</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap">
    <link rel="stylesheet" href="pkg/assets/css/main.css">
    <link rel="stylesheet" href="pkg/assets/css/additions.css">
    <script src="pkg/assets/js/main.js" defer></script>
    <script src="pkg/assets/js/dropdown.js" defer></script>
</head>
<body>
    <header>
        <div class="container nav-container">
            <a href="index.html" class="logo">ZIGGY<span>!</span></a>
            
            <div class="hamburger">
                <span>☰</span>
            </div>
            
            <ul class="nav-menu">
                <li class="nav-item"><a href="index.html" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="pkg/pages/about.html" class="nav-link">About</a></li>
                <li class="nav-item"><a href="pkg/pages/pictures.html" class="nav-link">Pictures</a></li>
                <li class="nav-item"><a href="pkg/pages/FlappyZig.html" class="nav-link">Flappy Zig</a></li>
                <li class="nav-item"><a href="pkg/pages/znek.html" class="nav-link">Znek</a></li>
            </ul>
        </div>
    </header>
    
    <section class="hero">
        <div class="container">
            <h1>Meet Ziggy!</h1>
            <p>Welcome to the official website of Ziggy!</p>
            <img src="pkg/assets/images/z1.png" alt="Ziggy the Cat" class="hero-img">
        </div>
    </section>
    
    <section class="section">
        <div class="container">
            <h2 class="section-title">What Makes Ziggy Special</h2>
            <div class="card-container">
                <div class="card">
                    <img src="pkg/assets/images/z7.png" alt="Ziggy playing">
                    <div class="card-content">
                        <h3 class="card-title">Playful Spirit</h3>
                        <p>Ziggy loves to chase toys and pounce on anything that moves.</p>
                    </div>
                </div>
                
                <div class="card">
                    <img src="pkg/assets/images/z10.png" alt="Ziggy napping">
                    <div class="card-content">
                        <h3 class="card-title">Nap Master</h3>
                        <p>Finding the sunniest spots for the perfect cat nap is Ziggy's specialty.</p>
                    </div>
                </div>
                
                <div class="card">
                    <img src="pkg/assets/images/z4.png" alt="Ziggy being curious">
                    <div class="card-content">
                        <h3 class="card-title">Curious Explorer</h3>
                        <p>No box, bag, or shelf is safe from Ziggy's curious investigations.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="section" style="background-color: #f0f0f0;">
        <div class="container" style="text-align: center;">
            <h2 class="section-title">Get a Surprise from Ziggy!</h2>
            <p>👇🏼</p>
            <button id="myButton" class="btn">🎁</button>
            <div id="result"></div>
        </div>
    </section>
    
    <footer>
        <div class="container">
            <ul class="footer-links">
                <li><a href="index.html">Home</a></li>
                <li><a href="pkg/pages/about.html">About</a></li>
                <li><a href="pkg/pages/pictures.html">Pictures</a></li>
                <li><a href="pkg/pages/FlappyZig.html">Flappy Zig</a></li>
                <li><a href="pkg/pages/znek.html">Znek</a></li>
            </ul>
        </div>
    </footer>
</body>
</html>
