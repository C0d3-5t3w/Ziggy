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
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&family=Play:wght@400;700&display=swap" rel="stylesheet">
    <title>Znek Game</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            overflow: hidden;
            position: fixed;
            width: 100%;
            height: 100%;
            touch-action: none;
            background-color: #050a14;
            font-family: 'Play', sans-serif;
        }
        
        #restartButton {
            position: fixed;
            top: 15px;
            right: 15px;
            z-index: 1000;
            background: linear-gradient(135deg, #ff3333, #cc0000);
            color: white;
            border: none;
            border-radius: 6px;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            font-family: 'Orbitron', sans-serif;
            cursor: pointer;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.5), 0 0 15px rgba(255, 0, 0, 0.3);
            transition: all 0.2s cubic-bezier(0.165, 0.84, 0.44, 1);
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        #restartButton:hover {
            background: linear-gradient(135deg, #ff5555, #ee0000);
            transform: translateY(-2px) scale(1.03);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.6), 0 0 20px rgba(255, 0, 0, 0.4);
        }
        
        #restartButton:active {
            transform: translateY(1px) scale(0.97);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.4);
        }
        
        .special-food-note {
            color: #ff00ff;
            font-weight: bold;
            text-shadow: 0 0 5px rgba(255, 0, 255, 0.5);
        }
        
        .ghost-note {
            color: #00aaff;
            font-weight: bold;
            text-shadow: 0 0 5px rgba(0, 170, 255, 0.5);
        }
        
        .game-container {
            position: relative;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background: radial-gradient(circle at center, #0f1c2c, #050a14);
        }
        
        .canvas-wrapper {
            position: relative;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            max-width: 1200px;
        }
        
        .canvas {
            position: relative;
            width: 100%;
            height: 0;
            padding-bottom: 75%; /* 4:3 aspect ratio */
            max-width: 95vw;
            max-height: 90vh;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 50px rgba(0, 255, 255, 0.15);
        }

        #znekCanvas {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: block;
            border-radius: 10px;
            border: 2px solid rgba(0, 200, 255, 0.3);
            box-sizing: border-box;
        }
        
        .game-controls {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: rgba(0, 20, 40, 0.9);
            border: 2px solid rgba(0, 200, 255, 0.5);
            border-radius: 12px;
            padding: 20px 30px;
            color: var(--primary-color);
            text-align: center;
            transition: all 0.5s cubic-bezier(0.215, 0.61, 0.355, 1);
            max-width: 80%;
            z-index: 1100;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.7), 0 0 30px rgba(0, 200, 255, 0.15);
            backdrop-filter: blur(5px);
        }
        
        .game-controls h3 {
            margin-top: 0;
            color: #00ccff;
            border-bottom: 1px solid rgba(0, 200, 255, 0.3);
            padding-bottom: 15px;
            margin-bottom: 20px;
            font-family: 'Orbitron', sans-serif;
            font-weight: 700;
            letter-spacing: 2px;
            text-shadow: 0 0 10px rgba(0, 200, 255, 0.5);
            text-transform: uppercase;
        }
        
        .game-controls p {
            margin: 8px 0;
            line-height: 1.5;
        }
        
        .game-controls strong {
            color: #00ffff;
            font-weight: 700;
        }
        
        .game-controls.fade-out {
            opacity: 0;
            transform: translate(-50%, -40px);
            pointer-events: none;
        }
        
        .instructions {
            font-weight: bold;
            color: #ffcc00;
            margin-top: 20px !important;
            padding-top: 15px;
            border-top: 1px solid rgba(0, 200, 255, 0.3);
            text-shadow: 0 0 10px rgba(255, 204, 0, 0.5);
            font-size: 1.1em;
        }
        
        .d-pad-container {
            position: fixed;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            width: 180px;
            height: 180px;
            z-index: 1000;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-template-rows: repeat(3, 1fr);
            gap: 5px;
        }
        
        .d-pad-button {
            background: linear-gradient(135deg, rgba(100, 100, 100, 0.8), rgba(60, 60, 60, 0.8));
            border-radius: 8px;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            color: white;
            font-size: 24px;
            font-weight: bold;
            user-select: none;
            transition: all 0.15s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            box-shadow: inset 0 0 15px rgba(255, 255, 255, 0.1),
                        0 3px 5px rgba(0, 0, 0, 0.3);
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.5);
        }
        
        .d-pad-button:active, .d-pad-button.active {
            background: linear-gradient(135deg, rgba(120, 120, 120, 0.9), rgba(80, 80, 80, 0.9));
            transform: scale(0.95) translateY(2px);
            box-shadow: inset 0 0 10px rgba(255, 255, 255, 0.2),
                        0 1px 3px rgba(0, 0, 0, 0.4);
        }
        
        .d-pad-up {
            grid-column: 2;
            grid-row: 1;
            border-radius: 8px 8px 0 0;
            background: linear-gradient(to bottom, rgba(100, 140, 200, 0.8), rgba(60, 80, 140, 0.8));
        }
        
        .d-pad-left {
            grid-column: 1;
            grid-row: 2;
            border-radius: 8px 0 0 8px;
            background: linear-gradient(to right, rgba(100, 140, 200, 0.8), rgba(60, 80, 140, 0.8));
        }
        
        .d-pad-center {
            grid-column: 2;
            grid-row: 2;
            background: linear-gradient(135deg, rgba(50, 50, 50, 0.7), rgba(30, 30, 30, 0.7));
            box-shadow: inset 0 0 15px rgba(0, 0, 0, 0.4);
            border-radius: 50%;
        }
        
        .d-pad-right {
            grid-column: 3;
            grid-row: 2;
            border-radius: 0 8px 8px 0;
            background: linear-gradient(to left, rgba(100, 140, 200, 0.8), rgba(60, 80, 140, 0.8));
        }
        
        .d-pad-down {
            grid-column: 2;
            grid-row: 3;
            border-radius: 0 0 8px 8px;
            background: linear-gradient(to top, rgba(100, 140, 200, 0.8), rgba(60, 80, 140, 0.8));
        }
        
        .shoot-button {
            position: absolute;
            width: 70px;
            height: 70px;
            right: -90px;
            top: 50%;
            transform: translateY(-50%);
            background: radial-gradient(circle at center, rgba(255, 80, 80, 0.9), rgba(200, 30, 30, 0.9));
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            color: white;
            font-size: 30px;
            font-weight: bold;
            user-select: none;
            box-shadow: inset 0 0 15px rgba(255, 255, 255, 0.3),
                        0 5px 15px rgba(0, 0, 0, 0.5),
                        0 0 30px rgba(255, 0, 0, 0.3);
            transition: all 0.2s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            text-shadow: 0 1px 3px rgba(0, 0, 0, 0.5);
            border: 2px solid rgba(255, 255, 255, 0.2);
            animation: pulse 2s infinite ease-in-out;
        }
        
        .shoot-button:active, .shoot-button.active {
            background: radial-gradient(circle at center, rgba(220, 50, 50, 0.9), rgba(180, 20, 20, 0.9));
            transform: translateY(-50%) scale(0.92);
            box-shadow: inset 0 0 10px rgba(255, 255, 255, 0.2),
                        0 3px 10px rgba(0, 0, 0, 0.4),
                        0 0 20px rgba(255, 0, 0, 0.2);
            animation: none;
        }

        @keyframes pulse {
            0%, 100% { transform: translateY(-50%) scale(1); }
            50% { transform: translateY(-50%) scale(1.05); }
        }
        
        .game-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 10;
            background: linear-gradient(to bottom, 
                rgba(0, 0, 0, 0.3) 0%, 
                transparent 10%, 
                transparent 90%, 
                rgba(0, 0, 0, 0.3) 100%
            );
        }

        .score-display {
            position: absolute;
            top: 15px;
            left: 15px;
            color: #00ffff;
            font-family: 'Orbitron', sans-serif;
            font-size: 20px;
            text-shadow: 0 0 10px rgba(0, 255, 255, 0.5);
            z-index: 100;
        }
        
        @media (min-width: 768px) {
            .d-pad-container {
                bottom: 30px;
                width: 150px;
                height: 150px;
            }
            
            .shoot-button {
                position: absolute;
                width: 60px;
                height: 60px;
                right: -70px;
            }
        }

        @media (orientation: landscape) {
            .d-pad-container {
                left: auto;
                right: 30px;
                transform: none;
            }
            
            .shoot-button {
                right: -70px;
            }
        }
        
        /* Professional loading animation */
        .loading {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #050a14;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 2000;
            opacity: 1;
            transition: opacity 0.5s ease;
        }
        
        .loading.hidden {
            opacity: 0;
            pointer-events: none;
        }
        
        .loading-spinner {
            width: 60px;
            height: 60px;
            border: 5px solid rgba(0, 255, 255, 0.1);
            border-top-color: #00ccff;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Return to home button */
        .home-button {
            position: fixed;
            top: 15px;
            left: 15px;
            z-index: 1000;
            background: rgba(0, 0, 0, 0.3);
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 6px;
            padding: 8px 15px;
            font-size: 14px;
            font-weight: bold;
            font-family: 'Orbitron', sans-serif;
            cursor: pointer;
            transition: all 0.2s ease;
            backdrop-filter: blur(5px);
            display: flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
        }
        
        .home-button:hover {
            background: rgba(0, 0, 0, 0.5);
            transform: translateY(-2px);
        }
        
        .home-button:active {
            transform: translateY(1px);
        }
        
        .home-icon {
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="loading">
        <div class="loading-spinner"></div>
    </div>

    <a href="../.." class="home-button">
        <span class="home-icon">⌂</span>
        <span>Home</span>
    </a>
    
    <button id="restartButton">Restart Game</button>
    <div class="game-container">
        <div class="game-overlay"></div>
        <div class="canvas-wrapper">
            <div class="canvas">
                <canvas id="znekCanvas"></canvas>
            </div>
        </div>
        <div id="controls" class="game-controls">
            <h3>How to Play Znek</h3>
            <p><strong>🐍 Goal:</strong> Guide your snake, eat food, and avoid obstacles</p>
            <p><strong>🎮 Controls:</strong> Arrow keys or D-pad to move</p>
            <p><strong>🔫 Combat:</strong> Press SPACE or use Shoot button to fire at ghosts</p>
            <p class="ghost-note">⚠️ Ghosts will chase you - shoot them before they catch you!</p>
            <p><strong>🍽️ Food:</strong> Blue food grows your snake by 1 segment</p>
            <p class="special-food-note">💫 Purple special food appears occasionally (worth 5 points!)</p>
            <p><strong>✨ Power-up:</strong> Yellow glow lets you eat your own tail temporarily</p>
            <p class="instructions">Press ANY key or touch D-pad to begin</p>
        </div>
        
        <div class="d-pad-container">
            <div class="d-pad-button d-pad-up" data-direction="up">⬆️</div>
            <div class="d-pad-button d-pad-left" data-direction="left">⬅️</div>
            <div class="d-pad-button d-pad-center"></div>
            <div class="d-pad-button d-pad-right" data-direction="right">➡️</div>
            <div class="d-pad-button d-pad-down" data-direction="down">⬇️</div>
            <div class="shoot-button" data-direction="shoot">🔴</div>
        </div>
    </div>
    <script src="../assets/js/Znek.js"></script>
    <script>
        document.addEventListener('touchmove', function(e) {
            e.preventDefault();
        }, { passive: false });
        
        let gameInstance;
        
        document.addEventListener('DOMContentLoaded', async function() {
            const controls = document.getElementById('controls');
            const restartButton = document.getElementById('restartButton');
            const dPadButtons = document.querySelectorAll('.d-pad-button[data-direction], .shoot-button[data-direction]');
            const loading = document.querySelector('.loading');

            // Hide loading after short delay
            setTimeout(() => {
                loading.classList.add('hidden');
            }, 800);

            function hideControls() {
                if (controls.style.display !== 'none') {
                    controls.classList.add('fade-out');
                    setTimeout(() => {
                        controls.style.display = 'none';
                    }, 500);
                }
            }

            document.addEventListener('keydown', hideControls);
            
            dPadButtons.forEach(button => {
                const direction = button.getAttribute('data-direction');
                
                button.addEventListener('mousedown', function(e) {
                    button.classList.add('active');
                    if (gameInstance) {
                        gameInstance.handleDPadInput(direction);
                    }
                    hideControls();
                });
                
                button.addEventListener('mouseup', function(e) {
                    button.classList.remove('active');
                });
                
                button.addEventListener('touchstart', function(e) {
                    e.preventDefault();
                    button.classList.add('active');
                    if (gameInstance) {
                        gameInstance.handleDPadInput(direction);
                    }
                    hideControls();
                });
                
                button.addEventListener('touchend', function(e) {
                    e.preventDefault();
                    button.classList.remove('active');
                });
            });
            
            restartButton.addEventListener('click', function() {
                if (gameInstance) {
                    gameInstance.reset();
                }
            });
            
            try {
                const canvas = document.getElementById('znekCanvas');
                
                // Check if Znek class is available
                if (typeof Znek === 'undefined') {
                    throw new Error('Znek game script not loaded properly');
                }
                
                // Initial setup and resize handler
                function handleResize() {
                    const canvasContainer = document.querySelector('.canvas');
                    const containerWidth = canvasContainer.clientWidth;
                    const containerHeight = canvasContainer.clientHeight;
                    
                    canvas.width = containerWidth;
                    canvas.height = containerHeight;
                    
                    if (gameInstance && gameInstance.handleResize) {
                        gameInstance.handleResize();
                    }
                }
                
                // Set initial canvas size based on container
                handleResize();
                
                // Create game instance
                gameInstance = new Znek();
                console.log('Znek game instance created successfully');
                
                // Add resize listener
                window.addEventListener('resize', handleResize);
                
            } catch (error) {
                console.error('Error initializing game:', error);
                // Display error message to user
                const errorMessage = document.createElement('div');
                errorMessage.style.position = 'absolute';
                errorMessage.style.top = '50%';
                errorMessage.style.left = '50%';
                errorMessage.style.transform = 'translate(-50%, -50%)';
                errorMessage.style.color = '#ff3333';
                errorMessage.style.fontFamily = '"Orbitron", sans-serif';
                errorMessage.style.fontSize = '16px';
                errorMessage.style.textAlign = 'center';
                errorMessage.style.background = 'rgba(0, 0, 0, 0.7)';
                errorMessage.style.padding = '20px';
                errorMessage.style.borderRadius = '10px';
                errorMessage.style.zIndex = '2000';
                errorMessage.innerHTML = `Game failed to load:<br>${error.message}<br>Try refreshing the page.`;
                document.body.appendChild(errorMessage);
                
                // Hide loading indicator
                const loading = document.querySelector('.loading');
                if (loading) {
                    loading.classList.add('hidden');
                }
            }
        });
    </script>
</body>
</html>
