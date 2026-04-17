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
    <!-- ===================== FEATURES ===================== -->
    <section class="features" id="features">
      <div class="section-container">
        <div class="section-header">
          <span class="section-eyebrow">Why BrewDesk</span>
          <h2>Built around how a café <em>actually</em> runs.</h2>
          <p>Most POS systems are built for retail. We built BrewDesk from scratch for the pace, menu complexity, and customer flow of a busy coffee shop.</p>
        </div>
        <!-- Feature cards added in SCRUM-37 -->
          <div class="features-grid">
            <div class="feature-card">
              <div class="feature-icon-wrap"><span class="feature-icon">☕</span></div>
              <h3>Modifier-first ordering</h3>
              <p>Oat milk, extra shot, half-sweet, iced — every combination handled in two taps.</p>
            </div>
            <div class="feature-card feature-card--accent">
              <div class="feature-icon-wrap"><span class="feature-icon">📊</span></div>
              <h3>Peak-hour analytics</h3>
              <p>See exactly when your rush hits, which items drive revenue, and where your wastage is.</p>
            </div>
            <div class="feature-card">
              <div class="feature-icon-wrap"><span class="feature-icon">📦</span></div>
              <h3>Ingredient-level inventory</h3>
              <p>Track espresso beans, milk, syrups by the gram. Get automatic alerts before you run out.</p>
            </div>
            <div class="feature-card">
              <div class="feature-icon-wrap"><span class="feature-icon">🖨️</span></div>
              <h3>Kitchen & bar printing</h3>
              <p>Orders print instantly to your espresso bar and kitchen simultaneously.</p>
            </div>
          </div>
        <div class="features-grid">
          <!-- Cards will be added incrementally -->
        </div>
      </div>
    </section>
    <!-- ===================== PRICING ===================== -->
  <section class="pricing" id="pricing">
    <div class="section-container">
      <div class="section-header">
        <span class="section-eyebrow">Pricing</span>
        <h2>One café or ten locations —<br/><em>we scale with you.</em></h2>
        <p>No hidden fees. No per-transaction cuts. Cancel any time.</p>
      </div>
    <!-- ✅ ADDED IN SCRUM-39: Card skeletons only -->
      <div class="pricing-grid">
        <div class="pricing-card">
          <div class="plan-header">
            <div class="plan-name">Starter</div>
            <div class="plan-price">$0 <span class="plan-period">/month</span></div>
            <div class="plan-tagline">For new cafés getting started</div>
          </div>
          <!-- ✅ Feature list added in SCRUM-40 -->
          <ul class="plan-features">
            <li><span class="check">✓</span> 1 register</li>
            <li><span class="check">✓</span> Up to 50 menu items</li>
            <li><span class="check">✓</span> Basic daily reports</li>
            <li><span class="check">✓</span> Email support</li>
            <li><span class="cross">✗</span> Modifier groups</li>
            <li><span class="cross">✗</span> Inventory tracking</li>
          </ul>
          <a href="#contact" class="btn-plan">Get Started Free</a>
          <!-- Button added in SCRUM-41 -->
        </div>
  
        <div class="pricing-card pricing-card--featured">
          <!-- Badge added in SCRUM-42 -->
            <!-- ✅ ADDED IN SCRUM-42 -->
          <div class="plan-badge">Most Popular</div>
          <div class="plan-header">
            <div class="plan-name">Café Pro</div>
            <div class="plan-price">$49 <span class="plan-period">/month</span></div>
            <div class="plan-tagline">For established independent cafés</div>
          </div>
          <ul class="plan-features">
            <li><span class="check">✓</span> Up to 3 registers</li>
            <li><span class="check">✓</span> Unlimited menu items</li>
            <li><span class="check">✓</span> Full modifier system</li>
            <li><span class="check">✓</span> Ingredient inventory</li>
            <li><span class="check">✓</span> Peak-hour analytics</li>
            <li><span class="cross">✗</span> Multi-location management</li>
          </ul>
          <a href="#contact" class="btn-plan btn-plan--featured">Start Free Trial</a>
        </div>
  
        <div class="pricing-card">
          <div class="plan-header">
            <div class="plan-name">Multi-Location</div>
            <div class="plan-price">$129 <span class="plan-period">/month</span></div>
            <div class="plan-tagline">For café groups and small chains</div>
          </div>
          <ul class="plan-features">
            <li><span class="check">✓</span> Unlimited registers</li>
            <li><span class="check">✓</span> Unlimited menu items</li>
            <li><span class="check">✓</span> Full modifier system</li>
            <li><span class="check">✓</span> Ingredient inventory</li>
            <li><span class="check">✓</span> Cross-location analytics</li>
            <li><span class="check">✓</span> Centralised menu control</li>
          </ul>
          <a href="#contact" class="btn-plan">Get Started Free</a>
        </div>
      </div>
    </div>
  </section>
  <!-- ===================== CONTACT ===================== -->
<section class="contact" id="contact">
  <div class="section-container">
    <div class="contact-wrap">
      
      <!-- Left: Contact info -->
      <div class="contact-left">
        <span class="section-eyebrow">Get in Touch</span>
        <h2>Questions? We're here <em>for you.</em></h2>
        <p>Whether you're just curious or ready to switch, our team (all former café owners) will give you a real answer.</p>
        <div class="contact-details">
          <div class="contact-detail">
            <span class="detail-label">Email</span>
            <span>hello@brewdesk.app</span>
          </div>
          <div class="contact-detail">
            <span class="detail-label">Phone</span>
            <span>+1 (800) BREW-POS</span>
          </div>
          <div class="contact-detail">
            <span class="detail-label">Hours</span>
            <span>Mon – Fri, 8am – 6pm PST</span>
          </div>
        </div>
      </div>

      <!-- ✅ ADDED IN SCRUM-43: Form skeleton -->
      <div class="contact-right">
        <form action="php/contact.php" method="POST" id="contactForm" class="contact-form">
          <div class="form-row">
            <div class="form-group">
              <label for="name">Your Name</label>
              <input type="text" id="name" name="name" placeholder="Alex Chen" required />
            </div>
            <div class="form-group">
              <label for="email">Email Address</label>
              <input type="email" id="email" name="email" placeholder="alex@mycafe.com" required />
            </div>
          </div>
          <div class="form-group">
            <label for="cafe">Café Name <span class="optional">(optional)</span></label>
            <input type="text" id="cafe" name="cafe" placeholder="The Daily Grind" />
          </div>
          <div class="form-group">
            <label for="message">Message</label>
            <!-- ✅ BUG-03 fixed -->
            <textarea id="message" name="message" rows="4" placeholder="..." required></textarea>
          </div>
          <button type="submit" class="btn-submit">Send Message</button>
        </form>
      </div>

      </div>
    </div>
  </section>
    <!-- ===================== FOOTER ===================== -->
    <footer class="footer">
      <div class="footer-inner">
        <div class="footer-brand">
          <span class="footer-logo">☕ Brew<strong>Desk</strong></span>
          <p>The POS system that understands coffee.</p>
        </div>
        <div class="footer-col">
          <h4>Product</h4>
          <a href="#features">Features</a>
          <a href="#pricing">Pricing</a>
          <a href="#contact">Contact</a>
        </div>
        <div class="footer-col">
          <h4>Company</h4>
          <a href="#">About Us</a>
          <a href="#">Blog</a>
          <a href="#">Careers</a>
        </div>
        <div class="footer-col">
          <h4>Follow</h4>
          <div class="footer-socials">
            <a href="#" class="social-btn">𝕏</a>
            <a href="#" class="social-btn">in</a>
            <a href="#" class="social-btn">IG</a>
          </div>
        </div>
      </div>
      <div class="footer-bottom">
        <p>© 2025 BrewDesk Inc. All rights reserved.</p>
      </div>
    </footer>
  <script src="js/main.js"></script>
</body>
  <script src="js/main.js"></script>
</body>
</html>
