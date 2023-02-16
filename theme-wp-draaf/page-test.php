<?php get_header(); ?>

    <!-- ENTETE -->
    <section class="container-xl hero" style="background: linear-gradient(180deg, rgba(0, 0, 0, 0.2) 0%, rgba(0, 0, 0, 0) 24%), linear-gradient(97.42deg, rgba(0, 0, 0, 0.3) 19.94%, rgba(0, 0, 0, 0) 92.15%), url('<?php the_sub_field('image') ?>');">
        <div class="container-l">
            <span>Les métiers & formations</span>    
            <h1>Titre</h1>
            <h2>Titre</h2>
            <a class="cta-y" href="" data-lity>Voir la vidéo</a>
        </div>
    </section>

    <!-- MENU SECTEUR METIER-->
    <div id="secteurs">
        <section class="menu-metier">
        
            <dl id="onglets" class="d-flex container-s align-center">

            <div class="swiper slider-mobile">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <dd class="d-flex align-center">
                            <div class="menu-parent">
                                Présentation
                                <section class="sub-menu-onglets">
                                    Sous-menu
                                </section>
                            </div>
                        </dd>
                    </div>

                    <div class="swiper-slide">
                        <dd>Formation</dd>
                    </div>

                    <div class="swiper-slide">
                        <dd>Témoignages</dd>
                    </div>

                    <div class="swiper-slide">
                        <dd>Actualité</dd>
                    </div>

                    <div class="swiper-slide">
                        <dd>Recrutement</dd>
                    </div>
                </div>
            </div>

            </dl>
        </section>

        <dl id="contenus">
            <dd><?php get_template_part( 'templates/presentation' ); ?></dd>
            <dd><?php get_template_part( 'templates/formation' ); ?></dd>

            <?php if( get_field('temoignages_video') ): ?>
                <dd><?php get_template_part( 'templates/temoignages' ); ?></dd>
            <?php endif; ?>

            <?php 
                $value = get_the_title();
                $query_args = array('category_name' => $value );
                $custom_post_type = new WP_Query( $query_args );
                if ( $custom_post_type->have_posts() ) :  ?>
                    <dd><?php get_template_part( 'templates/actualites' ); ?></dd>
            <?php endif; wp_reset_postdata(); ?>

            <?php if( get_field('titre_recrutement') ): ?>
                <dd><?php get_template_part( 'templates/recrutement' ); ?></dd>
            <?php endif; ?>
        </dl>
    </div>

    <!-- BAS DE PAGE -->
    <?php get_template_part( 'templates/footer-metier' ); ?>

<?php get_footer();