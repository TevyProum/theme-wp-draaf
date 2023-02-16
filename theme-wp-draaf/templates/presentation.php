<?php if( have_rows('presentation') ): ?>
    <?php while( have_rows('presentation') ): the_row(); ?>
        <section id="<?php the_sub_field('nom_du_bloc') ?>" style="padding: 1px 0px;">

    <!-- PART 1 -->
            <?php if( have_rows('img_text') ): ?>
                <?php while( have_rows('img_text') ): the_row(); ?>
                    <section class="container-m d-flex between wrap reverse">
                        <div class="img-pres">
                            <img src="<?php the_sub_field('image') ?>">
                            <div class="line-y-l"></div>
                        </div>
                        <div class="container-xs">
                <?php endwhile; ?>
            <?php endif; ?>
                            <p class="surtitre"><?php the_sub_field('nom_du_bloc') ?></p>
            <?php if( have_rows('img_text') ): ?>
                <?php while( have_rows('img_text') ): the_row(); ?>
                            <p class="texte-secteurs"><?php the_sub_field('texte') ?></p>
                        </div>
                    </section>
                <?php endwhile; ?>
            <?php endif; ?>

    <!-- PART 2 -->
            <?php if( have_rows('bloc_video') ): ?>
                <?php while( have_rows('bloc_video') ): the_row(); ?>
                    <section class="bloc-video container-m between wrap">
                        <div class="container-xs">
                <?php endwhile; ?>
            <?php endif; ?>
                            <p class="surtitre"><?php the_sub_field('nom_du_bloc') ?></p>
            <?php if( have_rows('bloc_video') ): ?>
                <?php while( have_rows('bloc_video') ): the_row(); ?>
                            <p class="texte-secteurs"><?php the_sub_field('texte') ?></p>
                        </div>
                        <section style="position:relative"><div class="overlay-w"></div>
                        <div class="liste-video">
                            <?php if( have_rows('liste_video') ): ?>
                                <?php while( have_rows('liste_video') ): the_row(); ?>
                                    <div class="d-flex wrap">
                                        <div class="embed">
                                            <a href="<?php the_sub_field('video'); ?>" data-lity>
                                                <img src="<?php the_sub_field('url_de_la_miniature'); ?>">
                                            </a>
                                        </div>
                                        <div class="text-video">
                                            <h3><?php the_sub_field('titre-video') ?></h3>
                                            <p class="surtitre"><?php the_sub_field('lieu') ?></p>
                                            <span class="date-video"><?php the_sub_field('date') ?></span>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                        </section>
                    </section>
                <?php endwhile; ?>
            <?php endif; ?>

    <!-- PART 3 -->
            <?php if( have_rows('bloc_liste_metier') ): ?>
                <?php while( have_rows('bloc_liste_metier') ): the_row(); ?>
                    <section class="container-m d-flex between wrap">
                        <div class="container-xs">
                    <?php endwhile; ?>
            <?php endif; ?>
                            <p class="surtitre"><?php the_sub_field('nom_du_bloc') ?></p>
            <?php if( have_rows('bloc_liste_metier') ): ?>
                <?php while( have_rows('bloc_liste_metier') ): the_row(); ?>
                            <div class="liste-metier">
                                <p><?php the_sub_field('texte') ?></p>
                            </div>
                        </div>
                        <div class="bloc_rdv" 
                        style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('<?php the_field('background_s', 'option') ?>'); background-position: center; background-size: cover">
                            <div class="rdv line-y-r"></div>
                            <h2><?php the_field('titre_s', 'option') ?></h2>
                            <p><?php the_field('texte_s', 'option') ?></p>
                            <?php 
                            $link = get_field('bouton_s', 'option');
                            if( $link ): 
                                $link_url = $link['url'];
                                $link_title = $link['title'];
                                $link_target = $link['target'] ? $link['target'] : '_self';
                                ?>
                                <a class="cta-y cta-rdv" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                            <?php endif; ?>  
                        </div>
                    </section>
                <?php endwhile; ?>
            <?php endif; ?>

        </section>
    <?php endwhile; ?>
<?php endif; ?>

<!-- PARTENAIRES -->
<?php if( have_rows('partenaires') ): ?>
    <section class="container-m center partenaires">
        <h2>Nos partenaires</h2>
            <div class="container-s d-flex wrap">

                    <?php while( have_rows('partenaires') ): the_row(); ?>
                        <img src="<?php the_sub_field('logo_du_partenaire') ?>">
                    <?php endwhile; ?>

            </div>
        <a class="cta" href="<?php echo site_url().'/partenaires' ?>">Découvrir tous nos partenaires</a> 
    </section>
<?php endif; ?>