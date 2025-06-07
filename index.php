<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Google Tag Manager -->
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
  })(window,document,'script','dataLayer','GTM-MK6GXCJB');</script>
  <!-- End Google Tag Manager -->
  <!-- Start VWO Async SmartCode -->
  <link rel="preconnect" href="https://dev.visualwebsiteoptimizer.com" />
  <script type='text/javascript' id='vwoCode'>/* VWO script ingekort voor leesbaarheid */</script>
  <!-- End VWO Async SmartCode -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Breezd – Stoppen met vapen via slimme armband & app</title>
  <link rel="icon" type="image/x-icon" href="https://breezd.be/images/favicon.png">
  <meta name="description" content="Stop met vapen op jouw tempo met Breezd: een slimme armband & app, persoonlijke doelen, sociale motivatie en gezondheidsvoortgang. Ideaal voor jongeren & studenten.">
  <meta name="keywords" content="stoppen met vapen, vape app, studenten gezondheid, armband stoppen met vapen, gezonder leven app, breezd app">
  <meta name="robots" content="index, follow" />
  <meta property="og:type" content="website" />
  <meta property="og:url" content="https://breezd.be/" />
  <meta property="og:title" content="Breezd – Elke dag een stap vooruit" />
  <meta property="og:description" content="Slimme armband + app om te stoppen met vapen. Daag vrienden uit, track je voortgang en bereik een vape-vrije toekomst." />
  <meta property="og:image" content="https://breezd.be/images/socials.png" />
  <meta property="twitter:card" content="summary_large_image" />
  <meta property="twitter:url" content="https://breezd.be/" />
  <meta property="twitter:title" content="Breezd – Elke dag een stap vooruit" />
  <meta property="twitter:description" content="Slimme armband + app om te stoppen met vapen. Daag vrienden uit, track je voortgang en bereik een vape-vrije toekomst." />
  <meta property="twitter:image" content="https://breezd.be/images/socials.png" />
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/login_register.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter&family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="preload" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet"></noscript>
  <link rel="preload" as="image" href="images/iPhone_12_Mockup1.webp">
</head>
<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MK6GXCJB" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <?php
  if (isset($_GET['message'])) {
    $message = $_GET['message'];

    $messages = [
      "success" => ["Bericht succesvol verzonden", "#29A86E"],
      "error" => ["Er is iets fout gegaan. Probeer opnieuw.", "red"],
      "login_success" => ["Je bent succesvol ingelogd.", "#29A86E"],
      "login_failed" => ["Inloggen mislukt. Probeer opnieuw.", "red"],
      "register_success" => ["Account succesvol aangemaakt.", "#29A86E"],
      "register_failed" => ["Registratie mislukt. Probeer opnieuw.", "red"],
      "logout_success" => ["Je bent succesvol uitgelogd.", "#29A86E"],
      "account_deleted" => ["Je account is succesvol verwijderd.", "#29A86E"]
    ];

    if (array_key_exists($message, $messages)) {
      [$text, $color] = $messages[$message];
      echo "<div id='notification-message' class='notification' style='padding: 10px; background: #f4f4f4; border-left: 5px solid $color; margin: 10px auto; max-width: 600px; font-weight: 500; text-align: center;'>$text</div>";
    }
  }
  ?>

  <?php if (isset($_SESSION['user_id'])): ?>
    <div style="
      width: 100%;
      background: #29A86E;
      color: #f0f0f0;
      padding: 12px 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      font-family: 'Poppins', sans-serif;
      font-size: 1rem;
      position: sticky;
      top: 0;
      z-index: 1000;
    ">
      <div>Ingelogd als <strong><?php echo htmlspecialchars($_SESSION['first_name']); ?></strong></div>
      <div style="display: flex; gap: 20px;">
        <form action="php/logout.php" method="post" style="margin: 0;">
          <button type="submit" style="background: none; border: none; color: #f0f0f0; cursor: pointer; font-weight: 500; text-decoration: underline;">Uitloggen</button>
        </form>
        <form action="php/delete_account.php" method="post" onsubmit="return confirm('Ben je zeker dat je je account permanent wil verwijderen?');" style="margin: 0;">
          <button type="submit" style="background: none; border: none; color: #f0f0f0; cursor: pointer; font-weight: 500; text-decoration: underline;">Account verwijderen</button>
        </form>
      </div>
    </div>
  <?php endif; ?>

  <header>
    <div class="nav-container">
      <img src="images/logo2.webp" width="84px" alt="Breezd logo" class="logo">

      <nav class="desktop-nav">
        <a href="#">Home</a>
        <a href="#werking">Werking</a>
        <a href="#pricing">Tarieven</a>
        <a href="#contact">Contact</a>
      </nav>

      <div class="desktop-only">
        <a href="#" class="nav-button" id="inlog-button"
          onclick="openPopup('loginPopup')"
          style="<?php echo isset($_SESSION['user_id']) ? 'visibility: hidden;' : ''; ?>">
          Inloggen
        </a>
        <a href="#" class="nav-button"
          onclick="openPopup('registerPopup')"
          style="<?php echo isset($_SESSION['user_id']) ? 'visibility: hidden;' : ''; ?>">
          Registreren
        </a>
      </div>

      <div class="hamburger mobile-only" id="hamburger">
        <span></span><span></span><span></span>
      </div>
    </div>

    <div class="mobile-nav" id="mobileNav">
      <div class="mobile-nav-header">
        <img src="images/logo2.webp" width="84px" alt="Logo">
        <span id="closeNav" class="close">&times;</span>
      </div>
      <nav class="mobile-nav-links">
        <a href="#header" class="mobile-scroll">Home</a>
        <a href="#werking" class="mobile-scroll">Werking</a>
        <a href="#pricing" class="mobile-scroll">Tarieven</a>
        <a href="#contact" class="mobile-scroll">Contact</a>
      </nav>
        <?php if (!isset($_SESSION['user_id'])): ?>
          <a href="#" class="nav-button" onclick="openPopup('loginPopup')">Inloggen</a>
          <a href="#" class="nav-button" onclick="openPopup('registerPopup')">Registreren</a>
        <?php endif; ?>
    </div>
  </header>

  <section id="header">
    <div class="background"></div>
    <div class="header-container">
      <div class="header-first">
        <div class="header-text">
          <h1>Samen naar een <br>Vape-Vrije Toekomst</h1>
          <p>Stop met vapen op jouw tempo dankzij Breezd: houd je dagelijkse puffs bij met de slimme armband, stel wekelijks lagere doelen, volg je voortgang in de app en vier je successen samen met vrienden via het leaderboard – motiverend, sociaal en impactvol.</p>
        </div>
        <div class="header-buttons">
          <div class="header-btn">
            <a href="downloads/Breezd app.apk" download aria-label="Download de Breezd Android app (.apk)">
              <i class='bx bxl-apple'></i>
            </a>
            <div class="apple-btn-text">
              <p>Download on the</p>
              <h3>Apple Store</h3>
            </div>
          </div>

          <div class="header-btn">
            <a href="downloads/Breezd app.apk" download aria-label="Download de Breezd Android app (.apk)">
              <i class='bx bxl-play-store'></i>
            </a>
            <div class="playstore-btn-text">
              <p>GET IT ON</p>
              <h3>Google Play</h3>
            </div>
          </div>
      </div>
      </div>
      <div class="header-image">
        <img src="images/HeaderImg.webp" alt="Header Image" fetchpriority="high" loading="eager">
      </div>
    </div>
  </section>

  <section id="werking">
    <div class="werking-container">
      <div class="werking-text">
        <h2>Hoe Werkt Breezd?</h2>
        <p>Met Breezd stop je op jouw tempo en krijg je persoonlijke begeleiding om een vape-vrij leven te bereiken.</p>
      </div>
      <div class="werking-stappen">
        <div class="werking-stap">
          <a href="#" aria-label="Profile Icon"><i class='bx bxs-user-plus'></i></a>
          <h3>1. Stel je doelen in</h3>
          <p>Maak je profiel aan en bepaal hoe jij wil stoppen met vapen — op jouw tempo en volgens jouw doelen.</p>
        </div>
        <div class="werking-stap">
          <a href="#" aria-label="Line Chart Icon"><i class='bx bx-line-chart'></i></a>
          <h3>2. Volg je voortgang</h3>
          <p>Houd je dagelijkse puffs bij via de armband en zie direct je statistieken in de app.</p>
        </div>
        <div class="werking-stap">
          <a href="#"aria-label="Trophy Icon"><i class='bx bx-trophy'></i></a>
          <h3>3. Blijf gemotiveerd</h3>
          <p>Verdien badges, behaal milestones en ga de uitdaging aan met vrienden via het leaderboard.</p>
        </div>
      </div>
    </div>
  </section>

  <section id="features">
    <div class="features-container">
      <div class="feature">
          <div class="feature-image">
            <img src="images/Instructie1Img.webp" alt="Image Of Progress Screen">
          </div>
          <div class="feature-text">
            <h2>Houd je vooruitgang in de gaten</h2>
            <p>Bekijk statistieken over je dagelijkse puffs, bespaard geld en verbeterde gezondheid. Milestones houden je gemotiveerd en tonen de impact van elke stap richting een vape-vrije toekomst.
            </p>
          </div>
      </div>
      <div class="feature">
          <div class="feature-image">
            <img src="images/Instructie2Img.webp" alt="Image Of Friends Screen">
          </div>
          <div class="feature-text">
            <h2>Daag je vrienden uit</h2>
            <p>Nodig vrienden uit en ga samen de uitdaging aan: wie blijft het langst onder zijn puff-doel? Samen stoppen is makkelijker én leuker — motiveer elkaar en vier je successen.
            </p>
          </div>
      </div>
      <div class="feature">
          <div class="feature-image">
            <img src="images/Instructie3Img.webp" alt="Image Of Tracking Screen">
          </div>
          <div class="feature-text">
            <h2>Track je dagelijkse aantal puffs</h2>
            <p>Gebruik de slimme armband om je dagelijkse puffs te tracken. Stel een wekelijks doel in, bouw een streak op en zie hoe kleine aanpassingen grote resultaten opleveren.
            </p>
          </div>
      </div>
    </div>
  </section>

  <section id="pricing">
    <div class="pricing-container">
      <div class="pricing-header">
        <h2>Onze Tarieven</h2>
        <p>Kies het plan dat het beste bij je past om te stoppen met vapen.</p>
      </div>
      <div class="pricing-cards">
        <div class="pricing-card basic">
          <h3>Basis</h3>
          <p class="price">Gratis</p>
          <ul>
            <li><i class='bx bx-check'></i> Basisvoortgang bijhouden</li>
            <li><i class='bx bx-check'></i> Dagelijkse motivatie</li>
            <li><i class='bx bx-check'></i> Beperkt aantal uitdagingen en statistieken</li>
          </ul>
          <a href="javascript:void(0)" class="pricing-button" id="pricing-basic">Begin Nu</a>
        </div>
      
        <div class="pricing-card student">
          <h3>Student</h3>
          <p class="price">€2.99<span>/maand</span></p>
          <ul>
            <li><i class='bx bx-check'></i> Alle functies van Basic</li>
            <li><i class='bx bx-check'></i> Geavanceerde statistieken en analyses</li>
            <li><i class='bx bx-check'></i> Gedeelde uitdagingen en leaderboards</li>
            <li><i class='bx bx-check'></i> Speciaal studententarief</li>
          </ul>
          <a href="javascript:void(0)" class="pricing-button highlight" id="pricing-student">Studentenplan Activeren</a>
        </div>
      
        <div class="pricing-card premium">
          <h3>Premium</h3>
          <p class="price">€3.99<span>/maand</span></p>
          <ul>
            <li><i class='bx bx-check'></i> Alle functies van Basic</li>
            <li><i class='bx bx-check'></i> Geavanceerde statistieken en analyses</li>
            <li><i class='bx bx-check'></i> Onbeperkte uitdagingen en leaderboards</li>
          </ul>
          <a href="javascript:void(0)" class="pricing-button" id="pricing-premium">Upgrade naar premium</a>
        </div>
    </div>
  </section>

  <section id="contact">
    <div class="contact-container">
      <div class="contact-header">
        <h2>Contact Opnemen</h2>
        <p>Heb je een vraag of feedback? Vul het formulier in en we nemen snel contact op.</p>
      </div>
  
      <form action="php/send_mail.php" method="post" class="contact-form">
        <div class="form-row">
          <div class="form-group">
            <label for="first-name">Voornaam</label>
            <input type="text" id="first-name" name="first-name" placeholder="Voornaam" required>
          </div>
          <div class="form-group">
            <label for="last-name">Achternaam</label>
            <input type="text" id="last-name" name="last-name" placeholder="Achternaam" required>
          </div>
        </div>
  
        <div class="form-group">
          <label for="email">E-mailadres</label>
          <input type="email" id="email" name="email" placeholder="E-mailadres" required>
        </div>
  
        <div class="form-group">
          <label for="message">Bericht</label>
          <textarea id="message" name="message" rows="5" placeholder="Jouw bericht hier..." required></textarea>
        </div>
  
        <button type="submit" class="submit-button">Bericht Versturen</button>
      </form>
    </div>
  </section>

  <section id="CTA-end">
    <div class="CTA-end-container">
      <h2>Klaar voor je vape-vrije avontuur?</h2>
      <p>Download de Breezd-app en zet vandaag de eerste stap naar een gezonder leven.</p>
      <div class="store-buttons">
        <a href="downloads/Breezd app.apk" download aria-label="Download Breezd voor Android (.apk)">
          <i class='bx bxl-apple'></i>App Store
        </a>
        <a href="downloads/Breezd app.apk" download aria-label="Download Breezd voor Android (.apk)">
          <i class='bx bxl-play-store'></i>Play Store
        </a>
      </div>
    </div>
  </section>
  
  <footer id="footer">
    <div class="footer-container">
      <div class="footer-columns">
        <div class="footer-column">
          <h4>Breezd</h4>
          <p>Samen naar een vape-vrije toekomst.</p>
        </div>
  
        <div class="footer-column">
          <h4>Bedrijf</h4>
          <ul>
            <li><a href="#">Over team</a></li>
            <li><a href="#">Missie</a></li>
            <li><a href="#">Visie</a></li>
          </ul>
        </div>
  
        <div class="footer-column">
          <h4>Hulpbronnen</h4>
          <ul>
            <li><a href="#">Blog</a></li>
            <li><a href="#">Helpcentrum</a></li>
            <li><a href="#">Community</a></li>
          </ul>
        </div>
  
        <div class="footer-column">
          <h4>Juridisch</h4>
          <ul>
            <li><a href="privacy_policy.html">Privacybeleid</a></li>
            <li><a href="#">Algemene Voorwaarden</a></li>
            <li><a href="#">Cookiebeleid</a></li>
          </ul>
        </div>
      </div>
  
      <div class="footer-bottom">
        <p>© 2025 Breezd. All rights reserved.</p>
        <div class="social-icons">
          <a href="#" aria-label="Breezd op Twitter"><i class='bx bxl-twitter'></i></a>
          <a href="#" aria-label="Breezd op Instagram"><i class='bx bxl-instagram'></i></a>
          <a href="#" aria-label="Breezd op Facebook"><i class='bx bxl-facebook'></i></a>
        </div>
      </div>
    </div>
  </footer>

  <div id="login-register-placeholder"></div>
  <script>
    fetch('login_register.html')
      .then(res => res.text())
      .then(data => document.getElementById('login-register-placeholder').innerHTML = data);
  </script>

  <script>
    document.querySelectorAll('.mobile-scroll').forEach(link => {
      link.addEventListener('click', function (e) {
        e.preventDefault();
        const targetId = this.getAttribute('href');
        const target = document.querySelector(targetId);

        if (target) {
          target.scrollIntoView({ behavior: 'smooth' });
        }

        document.getElementById('mobileNav').style.display = 'none';
      });
    });

    document.getElementById('hamburger').addEventListener('click', () => {
      document.getElementById('mobileNav').style.display = 'block';
    });

    document.getElementById('closeNav').addEventListener('click', () => {
      document.getElementById('mobileNav').style.display = 'none';
    });
  </script>

  <script>
    const notification = document.getElementById('notification-message');
    if (notification) {
      setTimeout(() => {
        notification.style.transition = 'opacity 0.5s ease';
        notification.style.opacity = '0';
        setTimeout(() => {
          notification.remove();
        }, 500);
      }, 2000);
    }
  </script>



  <script src="js/popup.js"></script>
  <script src="js/script.js"></script>
</body>
</html>
