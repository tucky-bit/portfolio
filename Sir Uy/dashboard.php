<?php
session_start();
if (!isset($_SESSION['users'])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Keziah's Dashboard 🌸💜</title>
  <link rel="stylesheet" href="style.css" />
  <style>
    body {
      margin: 0;
      padding: 0;
      min-height: 100vh;
      background: linear-gradient(135deg, #f3e8ff 0%, #e0d4ff 50%, #fad0e4 100%);
      font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
      color: #4a2c8c;
      overflow-x: hidden;
    }

    .welcome-screen {
      position: fixed;
      inset: 0;
      background: rgba(243, 232, 255, 0.94);
      backdrop-filter: blur(14px);
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      z-index: 1000;
      transition: opacity 1.3s ease 4.5s, visibility 0s linear 5.8s;
    }

    .welcome-screen.hidden {
      opacity: 0;
      visibility: hidden;
    }

    .chibi-girl {
      width: 260px;
      height: 320px;
      position: relative;
      animation: float 7.5s ease-in-out infinite;
    }

    .chibi-girl img {
      width: 100%;
      height: 100%;
      object-fit: contain;
      filter: drop-shadow(0 18px 35px rgba(147, 112, 219, 0.5));
      border-radius: 50%;
      border: 12px solid #c9a8ff;
      background: linear-gradient(145deg, #f3e8ff, #e0d4ff);
      box-shadow: 
        inset 0 0 25px rgba(201, 168, 255, 0.5),
        0 0 40px rgba(201, 168, 255, 0.4);
    }

    .chibi-girl::before {
      position: absolute;
      font-size: 3.5rem;
      top: -40px;
      left: 50%;
      transform: translateX(-50%);
      opacity: 0.8;
      animation: sparkle 2.8s infinite alternate;
      pointer-events: none;
    }

    @keyframes sparkle {
      0%   { opacity: 0.6; transform: translateX(-50%) scale(0.9) rotate(0deg); }
      100% { opacity: 1;   transform: translateX(-50%) scale(1.4) rotate(15deg); }
    }

    .speech-bubble {
      position: absolute;
      top: -100px;
      left: 50%;
      transform: translateX(-50%);
      background: white;
      color: #7c3aed;
      padding: 20px 38px;
      border-radius: 38px;
      font-size: 1.55rem;
      font-weight: 700;
      white-space: nowrap;
      box-shadow: 0 14px 40px rgba(0,0,0,0.2);
      opacity: 0;
      transform: translateX(-50%) translateY(30px);
      transition: all 1s ease 1s;
    }

    .speech-bubble::after {
      content: '';
      position: absolute;
      bottom: -18px;
      left: 50%;
      transform: translateX(-50%);
      border-left: 18px solid transparent;
      border-right: 18px solid transparent;
      border-top: 18px solid white;
    }

    .speech-bubble.visible {
      opacity: 1;
      transform: translateX(-50%) translateY(0);
    }

    .welcome-text {
      margin-top: 50px;
      font-size: 2.5rem;
      font-weight: 800;
      color: #9f7aea;
      text-shadow: 0 5px 16px rgba(159, 122, 234, 0.4);
      opacity: 0;
      transform: translateY(40px);
      transition: all 1.1s ease 2.5s;
    }

    .welcome-text.visible {
      opacity: 1;
      transform: translateY(0);
    }

    .main-content {
      padding: 80px 30px;
      text-align: center;
      opacity: 0;
      transition: opacity 1.2s ease 5.8s;
    }

    .main-content.visible {
      opacity: 1;
    }

    h1 {
      color: #9f7aea;
      margin-bottom: 28px;
      font-size: 3.2rem;
      text-shadow: 0 4px 12px rgba(159, 122, 234, 0.3);
    }

    .success-message {
      font-size: 1.4rem;
      color: #6d28d9;
      margin-bottom: 40px;
      font-weight: 600;
      background: rgba(255,255,255,0.5);
      padding: 16px 32px;
      border-radius: 20px;
      display: inline-block;
      box-shadow: 0 8px 25px rgba(109, 40, 217, 0.2);
    }

    .card {
      background: rgba(255,255,255,0.48);
      backdrop-filter: blur(12px);
      border-radius: 28px;
      padding: 32px;
      max-width: 700px;
      margin: 0 auto 35px;
      box-shadow: 0 12px 45px rgba(147,112,219,0.28);
      border: 1px solid rgba(255,255,255,0.55);
    }

    .about-me h3 {
      color: #8b5cf6;
      margin-bottom: 16px;
      font-size: 1.8rem;
    }

    @keyframes float {
      0%, 100% { transform: translateY(0); }
      50%      { transform: translateY(-22px); }
    }

    @media (max-width: 500px) {
      .chibi-girl { width: 210px; height: 260px; }
      .speech-bubble { font-size: 1.3rem; padding: 16px 28px; top: -80px; }
      .welcome-text { font-size: 2rem; }
      h1 { font-size: 2.6rem; }
    }
  </style>
</head>
<body>

<div class="welcome-screen" id="welcomeScreen">
  <div class="chibi-girl">
    <img src="download.jpg"
         alt="cute chibi anime girl">
    <div class="speech-bubble" id="bubble">Yay! You made it in~ ♡</div>
  </div>
  <div class="welcome-text" id="welcomeText">Login Success! 💜</div>
</div>

<div class="main-content" id="mainContent">
  <h1>Welcome to My Dashboard, cutie!</h1>
  
  <div class="success-message">
    Successfully logged in!
  </div>

  <div class="card">
    <h2>Well~</h2>
    <p>Everything feels extra sparkly now that you're here!</p>
    <p>Enjoy!!</p>
  </div>

  <div class="card about-me">
    <h3>About Me</h3>
    <p>Hi! I'm Keziah (or Kezaya~) from Iloilo 💜</p>
    <p>I love cute things, anime, pastel colors, and making dashboards extra kawaii!</p>
    <p>Thanks for coming in — you're always welcome here ♡</p>
  </div>


<script>
  window.addEventListener('load', () => {
    const bubble = document.getElementById('bubble');
    const welcomeText = document.getElementById('welcomeText');
    const welcomeScreen = document.getElementById('welcomeScreen');
    const mainContent = document.getElementById('mainContent');

    setTimeout(() => bubble.classList.add('visible'), 700);
    setTimeout(() => welcomeText.classList.add('visible'), 2100);
    setTimeout(() => {
      welcomeScreen.classList.add('hidden');
      mainContent.classList.add('visible');
    }, 5800);
  });
</script>

</body>
</html>