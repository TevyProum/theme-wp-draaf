<section class="footer-metier container-xl">

<!-- BLOC CONTACT -->
<div class="footer-contact">
    <section class="container-m bloc-contact" style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url('<?php the_field('background', 'option') ?>'); 
    background-position: center; background-size: cover;">
        <h4><?php the_field('titre', 'option') ?></h4>
        <p><?php the_field('texte', 'option'); ?></p>
        <div class="d-flex center wrap">
            <?php 
            $link = get_field('bouton_gauche', 'option');
            if( $link ): 
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
                <a class="cta-y cta-contact" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
            <?php endif; ?>

            <?php 
                $link = get_field('bouton_droite', 'option');
                if( $link ): 
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                    <a class="cta-y cta-rdv" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                <?php endif; ?>
        </div>
    </section>
    <div class="line-y-l"></div>
</div>

<!-- SLIDER AUTRES SECTEURS -->
    <section class="autres-metiers container-xl">
        <div class="slider4">
            <h4>Vous aimerez aussi...</h4>
        
            <div class="swiper-wrapper">
                <?php 
                    $args = array(
                        'post_type' => 'metier',
                        'showposts' => -1, 
                    );
                    $query = new WP_Query( $args );
                        if ( $query->have_posts() ) :
                            while ( $query->have_posts() ) : $query->the_post(); ?>
                            <div class="swiper-slide">
                                <div class="card">
                                    <a href="<?php the_permalink() ?>">
                                            <div class="overlay-b"></div>
                                            <?php the_post_thumbnail(); ?>
                                            <h5><?php the_title(); ?></h5>
                                    </a>
                                </div>
                            </div>
                            <?php endwhile;
                        endif; ?>
                    <?php wp_reset_postdata(); ?>
            </div>

            <div class="swiper-arrows">
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
    </section>
    
</section>