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
  <!-- ===================== HERO ===================== -->
      <!-- ✅ ADDED IN SCRUM-32 -->
    <section class="hero" id="home">
      <div class="hero-container">
        <div class="hero-text">
          <h1 class="hero-headline">
            Your café runs on<br/>
            <em>great coffee.</em><br/>
            Your POS should too.
          </h1>
            <!-- ✅ ADDED IN SCRUM-33 -->
            <p class="hero-sub">
              BrewDesk is the only point-of-sale system designed from the ground up for independent
              cafés, specialty roasters, and multi-location coffee brands.
            </p>
            <!-- ✅ ADDED IN SCRUM-34 -->
            <div class="hero-cta">
              <a href="#pricing" class="btn-primary">Get Started for Free</a>
              <a href="#features" class="btn-outline">See All Features</a>
            </div>
            <div class="hero-trust">
              <div class="trust-avatars">
                <span class="avatar">JK</span>
                <span class="avatar">SR</span>
                <span class="avatar">AL</span>
                <span class="avatar">MT</span>
              </div>
              <p class="trust-text">Trusted by <strong>3,200+ cafés</strong> worldwide</p>
            </div>
          </div>
        <!-- Visual mockup added in SCRUM-35 -->
          <!-- ✅ ADDED IN SCRUM-35 -->
          <div class="hero-visual">
            <div class="pos-mockup">
              <div class="pos-topbar">
                <div class="pos-topbar-left">
                  <span class="pos-dot"></span>
                  <span class="pos-dot"></span>
                  <span class="pos-dot"></span>
                </div>
                <span class="pos-title">BrewDesk — Morning Shift</span>
                <span class="pos-time">08:42 AM</span>
              </div>
              <div class="pos-body">
                <div class="pos-menu">
                  <div class="pos-section-label">Hot Drinks</div>
                  <div class="pos-items">
                    <div class="pos-item active">
                      <span class="item-icon">☕</span>
                      <span class="item-name">Flat White</span>
                      <span class="item-price">$4.50</span>
                    </div>
                    <!-- Add 2-3 more items for demo -->
                  </div>
                </div>
                <div class="pos-order">
                  <div class="pos-order-title">Current Order</div>
                  <div class="order-lines">
                    <div class="order-line">
                      <span>Flat White <span class="qty">×2</span></span>
                      <span>$9.00</span>
                    </div>
                  </div>
                  <div class="order-divider"></div>
                  <div class="order-total">
                    <span>Total</span>
                    <span class="total-val">$17.00</span>
                  </div>
                  <button class="pos-pay-btn">Charge $17.00</button>
                </div>
              </div>
            </div>
          </div>
      </div>
    </section>
  <script src="js/main.js"></script>
</body>
  <script src="js/main.js"></script>
</body>
</html>
