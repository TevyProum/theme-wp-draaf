<?php get_header(); ?>

    <!-- ENTETE -->
    <?php if( have_rows('entete') ): ?>
        <?php while( have_rows('entete') ): the_row(); ?>
            <section class="container-xl hero" style="background: linear-gradient(180deg, rgba(0, 0, 0, 0.2) 0%, rgba(0, 0, 0, 0) 24%), linear-gradient(97.42deg, rgba(0, 0, 0, 0.3) 19.94%, rgba(0, 0, 0, 0) 92.15%), url('<?php the_sub_field('image') ?>');">
                <div class="container-l">
                    <span>Les métiers & formations</span>    
                    <h1><?php the_title() ?></h1>
                    <h2><?php the_sub_field('titre') ?></h2>
                    <?php 
                    $link = get_sub_field('lien_video');
                    if( $link ): ?>
                        <a class="cta-y" href="<?php echo esc_url( $link ); ?>" data-lity>Voir la vidéo</a>
                    <?php endif; ?>
                </div>
            </section>
        <?php endwhile; ?>
    <?php endif; ?>

    <!-- MENU SECTEUR METIER-->
    <div id="secteurs">
        <section class="menu-metier">
            <dl id="onglets" class="container-s">

                <div class="swiper slider-mobile">
                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <dd class="d-flex align-center">
                                <div class="menu-parent">
                                    Présentation
                                    <section class="sub-menu-onglets">
                                        <?php
                                        $allowed_classnames = array(
                                            1 => 'none',
                                            2 => 'block',
                                            3 => 'block'
                                        );
                                        $number_of_cols = count( get_field( 'presentation' ) );
                                        $classname_to_use = $allowed_classnames[1];
                                        if ( array_key_exists( $number_of_cols , $allowed_classnames ) ) {
                                            $classname_to_use = $allowed_classnames[$number_of_cols];
                                        }
                                        while( has_sub_field( 'presentation' ) ) : ?>
                                            <div class="<?php echo esc_attr( $classname_to_use ); ?>">
                                                <p><a href="#<?php the_sub_field('nom_du_bloc') ?>"><?php the_sub_field('nom_du_bloc') ?></a></p>
                                            </div>
                                        <?php endwhile; ?>
                                    </section>
                                </div>
                            </dd>
                        </div>

                        <div class="swiper-slide">
                            <dd>Formation</dd>
                        </div>

                        <?php if( get_field('temoignages_video') ): ?>
                            <div class="swiper-slide">
                                <dd>Témoignages</dd>
                            </div>
                        <?php endif; ?>

                        <?php 
                            $value = get_the_title();
                            $query_args = array('category_name' => $value );
                            $custom_post_type = new WP_Query( $query_args );
                            if ( $custom_post_type->have_posts() ) :  ?>
                                <div class="swiper-slide">
                                    <dd>Actualité</dd>
                                </div>
                        <?php endif; wp_reset_postdata(); ?>
                        
                        <?php if( get_field('titre_recrutement') ): ?>
                            <div class="swiper-slide">
                                <dd>Recrutement</dd>
                            </div>
                        <?php endif; ?>

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