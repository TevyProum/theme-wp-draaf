<?php get_header(); ?>

<section class="container-m d-flex between wrap">

    <div class="contact">
        <h1><?php wp_title($sep = ''); ?></h1>
        <p><?php the_field('texte'); ?></p>
    </div>

    <?php if( have_rows('bloc_rdv') ): ?>
        <?php while( have_rows('bloc_rdv') ): the_row(); ?>
            <section class="bloc_rdv" 
            style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('<?php the_sub_field('background') ?>'); background-position: center; background-size: cover">
            <div class="rdv line-y-r"></div>
                <h2><?php the_sub_field('titre'); ?></h2>
                <p><?php the_sub_field('texte'); ?></p>
                <a class="cta-y cta-rdv" href="" onclick="Calendly.initPopupWidget({url: 'https://calendly.com/metiers-du-vivant-hautsdefrance?hide_gdpr_banner=1&primary_color=2b2b2b'});return false;">Prendre rendez-vous avec un conseiller</a>
            </section>
        <?php endwhile; ?>
    <?php endif; ?>

</section>

<?php get_footer(); ?>