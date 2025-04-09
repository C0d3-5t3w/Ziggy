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
    <title>About Ziggy</title>
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
                <!-- <li class="nav-item"><a href="znek.html" class="nav-link">Znek</a></li> -->
            </ul>
        </div>
    </header>
    
    <section class="hero" style="padding-bottom: 2rem;">
        <div class="container">
            <h1>About Ziggy</h1>
            <p>Learn all about the feline friend who stole our hearts</p>
        </div>
    </section>
    
    <section class="section">
        <div class="container">
            <div style="display: flex; flex-wrap: wrap; gap: 2rem; align-items: center;">
                <div style="flex: 1; min-width: 300px;">
                    <img src="../assets/images/z5.png" alt="Ziggy portrait" style="width: 100%; border-radius: 10px; box-shadow: var(--shadow);">
                </div>
                <div style="flex: 2; min-width: 300px;">
                    <h2 style="color: var(--primary-color); margin-bottom: 1rem;">Ziggy's Story</h2>
                    <p>Ziggy is amazing!</p>
                    
                    <h3 style="color: var(--accent-color); margin: 1.5rem 0 0.5rem;">Quick Facts:</h3>
                    <ul style="list-style-type: none; padding-left: 0;">
                        <li>🐱 <strong>Breed:</strong> Nebelung</li>
                        <li>🎂 <strong>Birthday:</strong> 06/24/2023</li>
                        <li>🍗 <strong>Favorite Food:</strong> Gravy Treats</li>
                        <li>🧶 <strong>Favorite Toy:</strong> Gray roadkill mouse</li>
                        <li>😴 <strong>Favorite Nap Spot:</strong> Bed or cat tree</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    
    <section class="section" style="background-color: #f0f0f0;">
        <div class="container">
            <h2 class="section-title">Ziggy's Personality</h2>
            <div class="card-container">
                <div class="card">
                    <div class="card-content">
                        <h3 class="card-title">Playful</h3>
                        <p>Ziggy can turn any object into a toy, everything is a potential source of entertainment.</p>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-content">
                        <h3 class="card-title">Affectionate</h3>
                        <p>When Ziggy wants attention, expect lots of meowing, purring, head bumps, and cuddles.</p>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-content">
                        <h3 class="card-title">Intelligent</h3>
                        <p>Ziggy knows exactly when it's feeding time.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="section">
        <div class="container" style="text-align: center;">
            <h2 class="section-title">A Day in Ziggy's Life</h2>
            <div style="max-width: 800px; margin: 0 auto;">
                <p style="margin-bottom: 2rem;">Ever wondered what Ziggy does all day? Here's a typical schedule:</p>
                
                <div style="text-align: left; color: black; background: white; padding: 2rem; border-radius: 10px; box-shadow: var(--shadow);">
                    <p><strong>4:30 AM</strong> - Wake up humans for breakfast</p>
                    <p><strong>5:00 AM</strong> - Eat breakfast</p>
                    <p><strong>8:00 AM</strong> - First nap of the day</p>
                    <p><strong>11:00 AM</strong> - Bird watching at the window</p>
                    <p><strong>1:00 PM</strong> - Lunch time</p>
                    <p><strong>2:00 PM</strong> - Afternoon nap (very important)</p>
                    <p><strong>5:00 PM</strong> - Wake up and demand dinner</p>
                    <p><strong>6:00 PM</strong> - Play time with favorite toys</p>
                    <p><strong>8:00 PM</strong> - Cuddle time with humans</p>
                    <p><strong>10:00 PM</strong> - Night patrol of the house</p>
                    <p><strong>3:00 AM</strong> - Wake up humans for breakfast</p>
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
                <!-- <li><a href="znek.html">Znek</a></li> -->
            </ul>
        </div>
    </footer>
</body>
</html>
