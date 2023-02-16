<?php if( get_field('temoignages') ): ?>
    <section class="container-m onglet-temoignage">
        <div class="slider2">
            <div class="d-flex align-center between wrap">
                <h2>Ils aiment leurs métiers et vous disent pourquoi</h2>
                <div class="swiper-arrows">
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>

                    <div class="swiper-wrapper">

                        <?php if( have_rows('temoignages') ): ?>
                            <?php while( have_rows('temoignages') ): the_row(); ?>
                                <div class="swiper-slide" style="margin-top: 20px;">
                                        <div class="card-quote">
                                            <p><?php the_sub_field('texte') ?></p>
                                            <div class="d-flex">
                                                <img src="<?php the_sub_field('photo') ?>">
                                                <div>
                                                    <p class="nom"><?php the_sub_field('nom') ?></p>
                                                    <span class="surtitre"><?php the_sub_field('metier') ?></span>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>

                    </div>
        </div>
    </section>
<?php endif; ?>

<section class="container-m onglet-temoignage">
    <div class="slider3">
        <div class="d-flex align-center between wrap">
            <h2>Ils témoignent en vidéo</h2>
            <div class="swiper-arrows">
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>

            <div class="swiper-wrapper">
                <?php if( have_rows('temoignages_video') ): ?>
                    <?php while( have_rows('temoignages_video') ): the_row(); ?>
                        <div class="swiper-slide card-video">

                            <div class="embed-container">
                                <a href="<?php the_sub_field('video'); ?>" data-lity>
                                    <img src="<?php the_sub_field('url_de_la_miniature'); ?>">
                                </a>
                            </div>

                            <div>
                                <h3><?php the_sub_field('titre') ?></h3>
                                <p class="surtitre"><?php the_sub_field('lieu') ?></p>
                                <span class="date-video"><?php the_sub_field('date') ?></span>
                            </div>
                        </div>
                    <?php endwhile;
                endif; ?>
            </div>
    </div>
</section>
