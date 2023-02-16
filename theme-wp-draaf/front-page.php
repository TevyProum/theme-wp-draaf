<?php get_header(); ?>

<!-- SLIDER -->
<div class="part1 d-flex between wrap">
    <div>
        <h1><?php the_field('titre'); ?></h1>
        <p><?php the_field('sous-titre'); ?></p>
    </div>
    <div class="swiper-arrows">
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
</div>

<div class="slider1">
  <div class="swiper-wrapper">

    <?php if( have_rows('slider') ):
        while( have_rows('slider') ) : the_row(); ?>
            <div class="swiper-slide">
            <a href="<?php the_sub_field('lien_de_la_page'); ?>">
                <div class="poster" style="background: url('<?php the_sub_field('image') ?>'); background-position: center; background-size: cover;">
                    <span><?php the_sub_field('surtitre'); ?></span>
                </div>
                <div id="hidden">
                    <video src="<?php the_sub_field('video'); ?>" type="video/webm" loop muted="muted"></video>
                    <div class="text">
                        <span><?php the_sub_field('surtitre'); ?></span>
                        <h2><?php the_sub_field('titre'); ?></h2>
                        <p><?php the_sub_field('texte'); ?></p>
                        <a class="cta-slider" href="<?php the_sub_field('lien_de_la_video'); ?>" target="_blank" data-lity>Voir la vidéo</a>
                    </div>
                </div>
            </a>
            </div>
        <?php endwhile;
    endif; ?>

  </div>
</div>

<!-- BLOC BG JAUNE -->
<section class="bg-y">
    <div class="container-m">
        <?php if( have_rows('4col') ): ?>
            <?php while( have_rows('4col') ): the_row(); ?>
                <h2><?php the_sub_field('titre'); ?></h2>
                    <div class="d-flex between wrap">
                        <?php
                        if( have_rows('colonne') ): while( have_rows('colonne') ) : the_row(); ?>
                            <div class="col">
                                <div style="position: relative; height: 72px">
                                    <div class="picto"><img src="<?php the_sub_field('pictogramme'); ?>"></div>
                                    <div class="line-w"></div>
                                </div>
                                <h3><?php the_sub_field('titre'); ?></h3>
                                <p><?php the_sub_field('texte'); ?></p>
                            </div>
                        <?php endwhile; endif; ?>
                    </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</section>

<!-- BLOC TXT/IMG -->
<section class="container-m txt-img">
    <?php if( have_rows('txt_img') ): ?>
        <?php while( have_rows('txt_img') ): the_row(); ?>
            <div class="d-flex between wrap">
                <div>
                    <span class="surtitre"><?php the_sub_field('sur-titre'); ?></span>
                    <h2><?php the_sub_field('titre'); ?></h2>
                    <p><?php the_sub_field('texte'); ?></p>
                    <?php 
                    $link = get_sub_field('cta');
                    if( $link ): 
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>
                        <a class="cta" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                    <?php endif; ?>
                </div>
                <div style="position: relative">
                    <img src="<?php the_sub_field('image'); ?>">
                    <div class="line-y-r"></div>
                </div>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
</section>

<!-- BLOC ACTU -->
<?php if( get_field('actualites') ): ?>
    <section class="container-m bloc-actu">
        <div class="d-flex between wrap end">
            <div>
                <span class="surtitre">Actualités</span>
                <h2><?php the_field('actualites') ?></h2>
            </div>
            <div>
                <a class="line-a" href="<?php echo site_url().'/actualites' ?>">Voir toutes les actualités</a>
            </div>
        </div>

        <div class="d-flex wrap between">
            <?php 
            $args = array(
                'posts_per_page' => 3,
            );
            $query = new WP_Query( $args );
                if ( $query->have_posts() ) :
                    while ( $query->have_posts() ) : $query->the_post(); ?>    
                            <a href="<?php the_permalink(); ?>">
                                <div class="autres">
                                    <?php the_post_thumbnail(); ?>
                                    <div>
                                        <div class="cat-post"><?php $category = get_the_category(); echo $category[0]->cat_name; ?></div>
                                        <h3><?php the_title(); ?></h3>
                                        <p><?php the_excerpt(); ?></p>
                                        <a class="cta" href="<?php the_permalink(); ?>">Lire la suite</a>
                                    </div>
                                </div>
                            </a>
                        <?php endwhile;
                    endif;
                wp_reset_postdata(); ?>
        </div>
    </section>
<?php endif; ?>

<!-- BLOC CONTACT -->
<section class="container-m bloc-contact" style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url('<?php the_field('background', 'option') ?>'); 
background-position: center; background-size: cover; position: relative">
    <div class="line-y-l"></div>
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

<?php get_footer(); ?>