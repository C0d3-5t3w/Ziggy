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
    <title>Ziggy's Pictures</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/css/additions.css">
    <script src="../assets/js/main.js" defer></script>
    <script src="../assets/js/dropdown.js" defer></script>
    <script src="../assets/js/animations.js" defer></script>
</head>
<body>
    <header>
        <div class="container nav-container">
            <a href="../../index.html" class="logo">ZIGGY<span>!</span></a>
            
            <div class="hamburger">
                <span>☰</span>
            </div>
            
            <ul class="nav-menu">
                <li class="nav-item"><a href="../../index.html" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
                <li class="nav-item"><a href="pictures.html" class="nav-link">Pictures</a></li>
                <li class="nav-item"><a href="FlappyZig.html" class="nav-link">Flappy Zig</a></li>
                <li class="nav-item"><a href="znek.html" class="nav-link">Znek</a></li>
                <li class="nav-item"><a href="ZigWalk.html" class="nav-link">ZigWalk</a></li>
            </ul>
        </div>
    </header>
    
    <section class="hero" style="padding-bottom: 2rem;">
        <div class="container">
            <h1>Ziggy's Photo Gallery</h1>
            <p>Enjoy this collection of Ziggy's most adorable moments</p>
        </div>
    </section>
    
    <section class="section">
        <div class="container">
            <h2 class="section-title"></h2>
            
            <div class="gallery">
                <div class="gallery-item">
                    <img src="../assets/images/z6.png" alt="">
                </div>
                <div class="gallery-item">
                    <img src="../assets/images/z7.png" alt="">
                </div>
                <div class="gallery-item">
                    <img src="../assets/images/z8.png" alt="">
                </div>
                <div class="gallery-item">
                    <img src="../assets/images/z9.png" alt="">
                </div>
                <div class="gallery-item">
                    <img src="../assets/images/z10.png" alt="">
                </div>
                <div class="gallery-item">
                    <img src="../assets/images/z11.png" alt="">
                </div>
            </div>
        </div>
    </section>
    
    <section class="section" style="background-color: #f0f0f0;">
        <div class="container">
            <h2 class="section-title"></h2>
            
            <div class="gallery">
                <div class="gallery-item">
                    <img src="../assets/images/z12.png" alt="">
                </div>
                <div class="gallery-item">
                    <img src="../assets/images/z13.png" alt="">
                </div>
                <div class="gallery-item">
                    <img src="../assets/images/z14.png" alt="">
                </div>
                <div class="gallery-item">
                    <img src="../assets/images/z15.png" alt="">
                </div>
                <div class="gallery-item">
                    <img src="../assets/images/z16.png" alt="">
                </div>
                <div class="gallery-item">
                    <img src="../assets/images/z17.png" alt="">
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="container">
            <ul class="footer-links">
                <li><a href="../../index.html">Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="pictures.html">Pictures</a></li>
                <li><a href="FlappyZig.html">Flappy Zig</a></li>
                <li><a href="znek.html">Znek</a></li>
                <li><a href="ZigWalk.html">ZigWalk</a></li>
            </ul>
        </div>
    </footer>
</body>
</html>
