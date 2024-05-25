<?php
session_start();

if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] != true) {
  header("Location: /barca-academy/login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
  <script src="https://kit.fontawesome.com/7f1d032bd9.js" crossorigin="anonymous"></script>
</head>

<body>
  <?php include './components/navbar.php'; ?>
  <main role="main">
    <section class="ui-section-hero">
      <div class="ui-layout-container">
        <div class="ui-section-hero__layout ui-layout-grid ui-layout-grid-2">
          <!-- COPYWRITING -->
          <div>
            <h1>Unleash Your Potential.</h1>
            <p class="ui-text-intro">Come and experience the Barca way of football, where every session is a step towards achieving your dreams. At Barca Academy, we don't just train players; we create champions.</p>
            <!-- CTA -->
            <div class="ui-component-cta ui-layout-flex">
              <a href="#pricing" role="link" aria-label="#" class="ui-component-button ui-component-button-normal ui-component-button-primary">Get Started</a>
            </div>
          </div>
          <!-- IMAGE -->
          <img src="/barca-academy/assets/neymar1.jpg" loading="lazy" alt="#" class="ui-image-half-right">
        </div>
      </div>
    </section>
    <section class="ui-section-customer">
      <div class="ui-layout-container">
        <div class="ui-section-customer__layout ui-layout-flex">
          <img src="https://res.cloudinary.com/uisual/image/upload/assets/logos/facebook.svg" alt="#" class="ui-section-customer--logo">
          <img src="https://res.cloudinary.com/uisual/image/upload/assets/logos/pinterest.svg" alt="#" class="ui-section-customer--logo">
          <img src="https://res.cloudinary.com/uisual/image/upload/assets/logos/stripe.svg" alt="#" class="ui-section-customer--logo ui-section-customer--logo-str">
          <img src="https://res.cloudinary.com/uisual/image/upload/assets/logos/dribbble.svg" alt="#" class="ui-section-customer--logo">
          <img src="https://res.cloudinary.com/uisual/image/upload/assets/logos/behance.svg" alt="#" class="ui-section-customer--logo ui-section-customer--logo-bhn">
        </div>
      </div>
    </section>
    <section class="ui-section-feature" id="coach">
      <div class="ui-layout-container">
        <div class="ui-section-feature__layout ui-layout-grid ui-layout-grid-3">
          <div class="ui-component-card ui-component-card--feature">
            <img src="/barca-academy/assets/coach_bipin.jpg" alt="#" loading="lazy">
            <div class="ui-component-card--feature-content">
              <h4 class="ui-component-card--feature-title">Bipin Katuwal</h4>
              <p>Expert strategist, motivational mentor, committed to fostering teamwork.</p>
            </div>
          </div>
          <div class="ui-component-card ui-component-card--feature">
            <img src="/barca-academy/assets/coach_kiran.jpg" alt="#" loading="lazy">
            <div class="ui-component-card--feature-content">
              <h4 class="ui-component-card--feature-title">Kiran Oli</h4>
              <p>Dynamic trainer, passionate, innovative, focused on individual growth.</p>
            </div>
          </div>
          <div class="ui-component-card ui-component-card--feature">
            <img src="/barca-academy/assets/coach_anupam.jpg">
            <div class="ui-component-card--feature-content">
              <h4 class="ui-component-card--feature-title">Anupam Shah</h4>
              <p>Visionary leader, tactical brilliance, dedicated to developing young talent.</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="ui-section-testimonial">
      <div class="ui-layout-container">
        <div class="ui-layout-column-4 ui-layout-column-center">
          <img src="/barca-academy/assets/owner.jpg" alt="#" class="ui-section-testimonial--avatar">
          <p class="ui-section-testimonial--quote ui-text-intro">&ldquo;Passionate visionary driving Barca Academy's mission to nurture talent and cultivate future champions.&rdquo;</p>
          <p class="ui-section-testimonial--author"><strong>Khemraj Saud</strong><br><small class="ui-text-note">CEO of Academy</small></p>
        </div>
      </div>
    </section>
    <section class="ui-section-pricing">
      <div class="ui-layout-container" id="pricing">
        <h2>Fair Prices</h2>
        <p class="ui-text-intro">Top-notch Service, Budget-Friendly Rates.</p>
        <!-- TOGGLE -->
        <input type="radio" name="toggle" id="ui-component-toggle__monthly" checked>
        <input type="radio" name="toggle" id="ui-component-toggle__yearly">
        <div class="ui-component-toggle ui-layout-flex">
          <label for="ui-component-toggle__monthly" class="ui-component-toggle--label">Billed Monthly</label>
        </div>
        <!-- PRICING -->
        <div class="ui-section-pricing__layout ui-layout-grid ui-layout-grid-3">
          <div class="ui-component-card ui-component-card--pricing">
            <span><strong>Basic</strong></span>
            <!-- AMOUNT -->
            <div class="ui-component-card--pricing-price">
              <span class="ui-component-card--pricing-amount ui-component-card--pricing-amount-1" id="price">Rs.1000</span>
              <span>/</span>
              <span>month</span>
            </div>
            <span><small>Fundamental training for young athletes starting their journey.</small></span>
            <!-- LIST -->
            <ul class="ui-component-list ui-component-list--pricing ui-layout-grid">
              <li class="ui-component-list--item ui-component-list--item-check">Weekly group sessions.</li>
              <li class="ui-component-list--item ui-component-list--item-check">Access to training facilities.</li>
              <li class="ui-component-list--item ui-component-list--item-check">Basic skills and fitness drills.</li>
            </ul>
            <!-- CTA -->
            <form action="/barca-academy/pricing.php" method="post">
              <input type="hidden" name="basic" value="1000">
              <button class="ui-component-button ui-component-button-big ui-component-button-secondary" role="link" aria-label="#">Buy Now</button>
            </form>
          </div>
          <div class="ui-component-card ui-component-card--pricing">
            <span><strong>Standard</strong></span>
            <!-- AMOUNT -->
            <div class="ui-component-card--pricing-price">
              <span class="ui-component-card--pricing-amount ui-component-card--pricing-amount-2" id="price">Rs.1800</span>
              <span>/</span>
              <span>month</span>
            </div>
            <span><small>Elevated training with personalized coaching and guidance.</small></span>
            <!-- LIST -->
            <ul class="ui-component-list ui-component-list--pricing ui-layout-grid">
              <li class="ui-component-list--item ui-component-list--item-check">Advanced coaching sessions.</li>
              <li class="ui-component-list--item ui-component-list--item-check">Personalized skill programs.</li>
              <li class="ui-component-list--item ui-component-list--item-check">Nutritional guidance.</li>
            </ul>
            <!-- CTA -->
            <form action="/barca-academy/pricing.php" method="post">
              <input type="hidden" name="standard" value="1800">
              <button class="ui-component-button ui-component-button-big ui-component-button-primary" role="link" aria-label="#">Buy Now</button>
            </form>
          </div>
          <div class="ui-component-card ui-component-card--pricing">
            <span><strong>Special</strong></span>
            <!-- AMOUNT -->
            <div class="ui-component-card--pricing-price">
              <span class="ui-component-card--pricing-amount ui-component-card--pricing-amount-3" id="price">Rs.3200</span>
              <span>/</span>
              <span>month</span>
            </div>
            <span><small>Elite training with private sessions and exclusive perks.</small></span>
            <!-- LIST -->
            <ul class="ui-component-list ui-component-list--pricing ui-layout-grid">
              <li class="ui-component-list--item ui-component-list--item-check">Private training sessions.</li>
              <li class="ui-component-list--item ui-component-list--item-check">Video analysis and feedback.</li>
              <li class="ui-component-list--item ui-component-list--item-check">Exclusive merchandise and events.</li>
            </ul>
            <!-- CTA -->
            <form action="/barca-academy/pricing.php" method="post">
              <input type="hidden" name="special" value="3200">
              <button class="ui-component-button ui-component-button-big ui-component-button-secondary" role="link" aria-label="#">Buy Now</button>
            </form>
          </div>
        </div>
      </div>
    </section>
    <section class="ui-section-faq" id="faq">
      <div class="ui-layout-container">
        <div class="ui-section-faq__layout ui-layout-grid ui-layout-grid-2">
          <div>
            <h4 class="ui-component-list--item ui-section-faq--question">What programs do you offer?</h4>
            <p class="ui-section-faq--answer">We offer a range of programs including youth training camps, elite development sessions, and specialized coaching clinics tailored to various age groups and skill levels.</p>
          </div>
          <div>
            <h4 class="ui-component-list--item ui-section-faq--question">How can I enroll my child?</h4>
            <p class="ui-section-faq--answer">Enrollment can be done online through our website. Simply fill out the registration form, select the desired program, and complete the payment process.</p>
          </div>
          <div>
            <h4 class="ui-component-list--item ui-section-faq--question">What are the training facilities like?</h4>
            <p class="ui-section-faq--answer">Our state-of-the-art training facilities include high-quality pitches, modern fitness centers, and advanced equipment to ensure a comprehensive training experience for all players.</p>
          </div>
          <div>
            <h4 class="ui-component-list--item ui-section-faq--question">Who are the coaches?</h4>
            <p class="ui-section-faq--answer">Our coaches are experienced professionals with a deep understanding of football. They are dedicated to nurturing talent and promoting a positive, encouraging training environment.</p>
          </div>
        </div>
        <p class="ui-section-faq--note">Still have questions? <a href="/barca-academy/contact.php" role="link" aria-label="#">Contact us</a>.</p>
      </div>
    </section>
    <section class="ui-section-close">
      <div class="ui-layout-container">
        <div class="ui-section-close__layout ui-layout-flex">
          <div>
            <h2>Ready to start?</h2>
            <p class="ui-text-intro">Dream. Train. Achieve.</p>
          </div>
          <!-- CTA -->
          <div class="ui-component-cta ui-layout-flex">
            <a href="#pricing" role="link" aria-label="#" class="ui-component-button ui-component-button-normal ui-component-button-primary">Get Started</a>
          </div>
        </div>
      </div>
    </section>
  </main>
  <footer role="contentinfo" class="ui-section-footer">
    <div class="ui-layout-container">
      <div class="ui-section-footer__layout ui-layout-flex">
        <!-- COPYRIGHT -->
        <p class="ui-section-footer--copyright ui-text-note"><small>&copy; 2024 Barca Academy</small></p>
        <!-- MENU -->
        <a href="https://www.facebook.com/profile.php?id=61552759403242" role="link" aria-label="#">
          <i class="fa-brands fa-facebook-f"></i>
        </a>
        <a href="https://www.instagram.com/govindsaud13/" role="link" aria-label="#">
          <i class="fa-brands fa-instagram"></i>
        </a>
        <a href="#" role="link" aria-label="#">
          <i class="fa-brands fa-twitter"></i>
        </a>
      </div>
    </div>
  </footer>
</body>

</html>