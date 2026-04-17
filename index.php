<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>BrewDesk – POS Built for Coffee Shops</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400;0,600;1,400;1,600&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css" />
</head>
<body>
  <body>
  <!-- ===================== NAVBAR ===================== -->
  <nav class="navbar" id="navbar">
    <div class="nav-container">
      <a href="#" class="logo">
        <span class="logo-mark">☕</span>
        <span class="logo-text">Brew<strong>Desk</strong></span>
      </a>
        <!-- ✅ ADDED IN SCRUM-28 -->
      <ul class="nav-links" id="navLinks">
        <li><a href="#features">Features</a></li>
        <li><a href="#pricing">Pricing</a></li>
        <li><a href="#contact">Contact</a></li> <!-- I have fixed BUG-01 during the SCRUM-51-->
      </ul>
        <!-- ✅ ADDED IN SCRUM-30 -->
      <div class="nav-right">
        <a href="#pricing" class="btn-nav-signup">Start Free Trial</a>
      </div>
      <button class="hamburger" id="hamburger" aria-label="Toggle menu">
        <span></span><span></span><span></span>
      </button>
    </div>
  </nav>
      <!-- ✅ ADDED IN SCRUM-32 -->
    <section class="hero" id="home">
      <div class="hero-container">
        <div class="hero-text">
          <h1 class="hero-headline">
            Your café runs on<br/>
            <em>great coffee.</em><br/>
            Your POS should too.
          </h1>
          <!-- Sub-headline added in SCRUM-33 -->
        </div>
        <!-- Visual mockup added in SCRUM-35 -->
      </div>
    </section>
  <script src="js/main.js"></script>
</body>
  <script src="js/main.js"></script>
</body>
</html>
