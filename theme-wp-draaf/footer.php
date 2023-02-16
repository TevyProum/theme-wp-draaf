<div class="lightbox"></div>

<footer>

    <div class="d-flex footer wrap">

        <section class="footer1">
            <div class="d-flex align-center between bloc-logo">
                <a href="<?php echo home_url( '/' ); ?>">
                    <img class="header-logo" src="<?php echo site_url().'/wp-content/uploads/2022/04/logo-LAV.jpg' ?>" alt="Logo">
                </a>
                <a href="https://draaf.hauts-de-france.agriculture.gouv.fr/" target="_blank"><img src="<?php echo site_url().'/wp-content/uploads/2021/12/logo-prefetHDF-1.svg' ?>"></a>
                <a href="https://www.hautsdefrance.fr/" target="_blank"><img src="<?php echo site_url().'/wp-content/uploads/2021/12/logo-HDF.svg' ?>"></a>
            </div>

            <p><?php wp_nav_menu( array( 'theme_location' => 'footer1' ) ); ?></p>

            <div class="d-flex align-center between">
                <span>Suivez-nous</span>
                <a href="https://www.facebook.com/MetiersDuVivantHautsdeFrance" target="_blank"><img src="<?php echo site_url().'/wp-content/uploads/2021/12/facebook-w.svg' ?>"></a>
                <a href="https://www.youtube.com/playlist?list=PLqnf47J0WOQR-mGuophZ34DrVR_D91EjQ" target="_blank"><img src="<?php echo site_url().'/wp-content/uploads/2021/12/youtube-w.svg' ?>"></a>
                <a href="https://www.instagram.com/metiersduvivanthdf" target="_blank"><img src="<?php echo site_url().'/wp-content/uploads/2021/12/insta-w.svg' ?>"></a>
            </div>
        </section>

        <section class="secteurs-footer">
            <span>Secteurs métiers</span>
            <?php wp_nav_menu( array( 'theme_location' => 'footer2' ) ); ?>
        </section> 
    
        <section>
            <span>&nbsp</span>
            <?php wp_nav_menu( array( 'theme_location' => 'footer3' ) ); ?>
        </section>
    </div>

    <div class="d-flex copyright">
        <p>Tous droits réservés - 2022 - Métiers du vivant</p>
        <p><a href="<?php echo site_url().'/mentions-legales' ?>">Mentions légales</a>  /  <a href="<?php echo site_url().'/plan' ?>">Plan de site</a></p>
    </div>
	
	<script>
window.axeptioSettings = {
  clientId: "61eeadd3d4d0ef0aa0eba39f",
  cookiesVersion: "metiers-du-vivant-fr",
};
 
(function(d, s) {
  var t = d.getElementsByTagName(s)[0], e = d.createElement(s);
  e.async = true; e.src = "//static.axept.io/sdk.js";
  t.parentNode.insertBefore(e, t);
})(document, "script");
</script>

</footer>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
<script src="https://assets.calendly.com/assets/external/widget.js" type="text/javascript" async></script>

<?php wp_footer(); ?>
</body>
</html>