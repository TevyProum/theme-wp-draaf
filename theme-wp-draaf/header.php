<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link href="https://assets.calendly.com/assets/external/widget.css" rel="stylesheet">
    <?php wp_head(); ?>
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-VLW5YKJH74"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-VLW5YKJH74');
</script>
</head>

<body <?php body_class(); ?>>

  <header>

    <!-- DESKTOP -->
    <section id="desktop" class="d-flex between align-center">
      <div class="d-flex">
        <a href="<?php echo home_url( '/' ); ?>">
          <img class="header-logo" src="<?php echo site_url().'/wp-content/uploads/2021/12/logo-AdV.svg' ?>" alt="Logo">
        </a> 
        <nav role="navigation"><?php wp_nav_menu( array( 'theme_location' => 'principal' ) ); ?></nav>
      </div>

      <nav role="navigation"><?php wp_nav_menu( array( 'theme_location' => 'secondaire' ) ); ?></nav>
    </section>

    <!-- MOBILE -->
    <section id="mobile">
      <div class="d-flex between align-center">
        <a href="<?php echo home_url( '/' ); ?>">
            <img class="header-logo" src="<?php echo site_url().'/wp-content/uploads/2021/12/logo-AdV.svg' ?>" alt="Logo">
        </a> 
        <a href="#" id="clickMe" class="d-flex align-center"><img class="burger" src="<?php echo site_url().'/wp-content/uploads/2022/01/Frame-174.svg' ?>"></a>
      </div>

      <nav role="navigation">
        <div id="slideMe">
          <?php wp_nav_menu( array( 'theme_location' => 'principal' ) ); ?>
          <?php wp_nav_menu( array( 'theme_location' => 'secondaire' ) ); ?>
        </div>
      </nav>
    </section>

  </header>

  <section class="vign d-flex">
    <a class="cta-contact d-flex align-center" href="<?php echo site_url().'/contact' ?>">Nous contacter</a>
    <a class="cta-contact d-flex align-center" href="" onclick="Calendly.initPopupWidget({url: 'https://calendly.com/metiers-du-vivant-hautsdefrance?hide_gdpr_banner=1&primary_color=2b2b2b'});return false;">Prendre rendez-vous</a>
  </section>
    
<?php wp_body_open(); ?>