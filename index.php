<?php
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
header("Content-Type: text/html; charset=UTF-8");
header("timezone: PMT");

$grayLongHairCatFacts = [
    "Nebelung cats are one of the most distinctive gray long-haired breeds, known for their silky blue-gray coats.",
    "The name 'Nebelung' comes from the German word 'Nebel', meaning 'mist' or 'fog', referring to their misty-blue coat.",
    "Gray long-haired cats often have yellow or green eyes that contrast beautifully with their coat.",
    "The Russian Blue is a close relative to many gray long-haired cats, but with a shorter coat.",
    "Gray cats are sometimes called 'blue' in cat fancy terminology.",
    "Long-haired gray cats have special guard hairs that give their coat a shimmering appearance.",
    "Gray long-haired cats typically have a double coat that requires regular grooming.",
    "Many gray long-haired cats have a naturally playful but gentle temperament.",
    "The undercoat of a gray long-haired cat is typically softer and lighter in color than the outer coat.",
    "Gray cats are often considered good luck in many cultures around the world."
];

$randomFactIndex = array_rand($grayLongHairCatFacts);
$todaysCatFact = $grayLongHairCatFacts[$randomFactIndex];

$dayOfWeek = date('N'); 
$catMoods = [
    1 => ["Monday Mood", "Slightly grumpy but will accept treats", "#a8a8a8"],
    2 => ["Tuesday Mood", "Playful but only in short bursts", "#9fb3c9"],
    3 => ["Wednesday Mood", "Window watching and bird chirping", "#b3bac5"],
    4 => ["Thursday Mood", "Extra purrs and cuddles", "#8596a7"],
    5 => ["Friday Mood", "Zooming around the house at midnight", "#90a0b3"],
    6 => ["Weekend Mood", "Lounging in sunbeams all day", "#c0c5cc"],
    7 => ["Weekend Mood", "Extra affectionate and lazy", "#a9b5c2"]
];

$currentMood = $catMoods[$dayOfWeek][0];
$moodDescription = $catMoods[$dayOfWeek][1];
$moodColor = $catMoods[$dayOfWeek][2];

$hour = (int)date('G');
if ($hour >= 5 && $hour < 10) {
    $timeMessage = "It's breakfast time! Ziggy is meowing for food.";
} elseif ($hour >= 10 && $hour < 15) {
    $timeMessage = "Ziggy is having his mid-day nap in a sunny spot.";
} elseif ($hour >= 15 && $hour < 20) {
    $timeMessage = "It's afternoon play time! Ziggy is chasing toys around the house.";
} else {
    $timeMessage = "Nighttime zoomies! Ziggy is racing around the house.";
}
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
    <script src="pkg/assets/js/animations.js" defer></script>
    <style>
        .cat-mood-section {
            background-color: <?php echo $moodColor; ?>;
            padding: 2rem 0;
            color: #333;
        }
        .cat-mood-container {
            display: flex;
            flex-wrap: wrap;
            gap: 2rem;
            justify-content: space-between;
            align-items: center;
        }
        .cat-fact {
            flex: 1;
            min-width: 300px;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .cat-mood {
            flex: 1;
            min-width: 300px;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .paw-icon {
            font-size: 1.5rem;
            margin-right: 0.5rem;
        }
        .fact-title, .mood-title {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
            color: #555;
            font-weight: 600;
        }
    </style>
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
                <!-- <li class="nav-item"><a href="pkg/pages/znek.html" class="nav-link">Znek</a></li> -->
                <li class="nav-item"><a href="pkg/pages/ZigWalk.html" class="nav-link">ZigWalk</a></li>
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
    
    <section class="cat-mood-section">
        <div class="container cat-mood-container">
            <div class="cat-fact">
                <div class="fact-title"><span class="paw-icon">🐾</span> Gray Cat Fact of the Day</div>
                <p><?php echo $todaysCatFact; ?></p>
                <p><small>Refresh the page for a new fact!</small></p>
            </div>
            <div class="cat-mood">
                <div class="mood-title"><span class="paw-icon">😸</span> Ziggy's <?php echo $currentMood; ?></div>
                <p><?php echo $moodDescription; ?></p>
                <p><?php echo $timeMessage; ?></p>
                <p><small>Current cat time: <?php echo date('g:i a'); ?></small></p>
            </div>
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
            <h2 class="section-title">Click the gift!</h2>
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
                <!-- <li><a href="pkg/pages/znek.html">Znek</a></li> -->
                <li><a href="pkg/pages/ZigWalk.html">ZigWalk</a></li>
            </ul>
        </div>
    </footer>
</body>
</html>
