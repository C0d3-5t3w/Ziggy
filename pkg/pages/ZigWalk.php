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
    <title class="pride-font">ZigWalk</title>
    <link rel="stylesheet" href="../assets/css/ZigWalk.css">
    <link rel="stylesheet" href="../assets/css/fonts.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
</head>
<body>
    <div id="game-container">
        <div id="loading-screen">
            <h2 class="pride-font">Loading ZigWalk</h2>
            <div class="spinner"></div>
        </div>
        <div id="score">Score: <span id="score-value">0</span></div>
        <div id="fps-counter">FPS: 60</div>
        <div id="instructions">Use ↑ to move forward, ↓ to back up, ←→ to rotate, SPACE to jump</div>
        <div id="level-up-notification" class="hidden">Level Up! Speed Increased!</div>
        <div id="game-over" class="hidden">
            <h2 class="pride-font">Game Over!</h2>
            <p>Final Score: <span id="final-score">0</span></p>
            <p id="high-score-display">High Score: <span id="high-score-value">0</span></p>
            <button id="restart-button">Play Again</button>
        </div>
        <div id="mobile-controls" class="hidden">
            <div class="control-row">
                <button id="mobile-forward" class="mobile-btn">↑</button>
            </div>
            <div class="control-row">
                <button id="mobile-left" class="mobile-btn">←</button>
                <button id="mobile-jump" class="mobile-btn">JUMP</button>
                <button id="mobile-right" class="mobile-btn">→</button>
            </div>
            <div class="control-row">
                <button id="mobile-backward" class="mobile-btn">↓</button>
            </div>
        </div>
        <canvas id="game-canvas"></canvas>
    </div>
    <script src="../assets/js/ZigWalk.js"></script>
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
