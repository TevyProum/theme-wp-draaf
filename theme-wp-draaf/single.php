<?php get_header(); ?>

<div class="container-s">
    <div><a class="cta-prev" href="<?php echo site_url().'/actualites' ?>">Retour</a></div>

    <section class="d-flex between align-center wrap">
        <div class="blog-title">
            <span class="surtitre">Actualités</span>
            <h1><?php the_title(); ?></h1>
            <div class="cat-post"><?php $category = get_the_category(); echo $category[0]->cat_name; ?></div>
            <p>Ecrit le <?php the_time('j F Y'); ?> par <?php echo get_the_author_meta('display_name'); ?></p>
        </div>
        <div class="post-th"><?php the_post_thumbnail(); ?></div>
    </section>

    <section style="margin-top: 55px">
        <p><?php the_field('texte') ?></p>
    </section>

    <section>
        <?php if( have_rows('bloc_3_images') ): 
        while( have_rows('bloc_3_images') ): the_row(); ?>
            <div class="d-flex between wrap">
                <?php if( get_sub_field('image_1') ): ?>
                    <img class="img1-2" src="<?php the_sub_field('image_1') ?>">
                <?php endif; ?>
                <?php if( get_sub_field('image_2') ): ?>
                    <img class="img1-2" src="<?php the_sub_field('image_2') ?>">
                <?php endif; ?>
            </div>
            <div>
                <?php if( get_sub_field('image_3') ): ?>
                    <img class="img3" src="<?php the_sub_field('image_3') ?>">
                <?php endif; ?>
            </div>
        <?php endwhile; 
        endif; ?>
    </section>

    <?php if( get_field('video') ): ?>
    <section class="embed">
            <?php the_field('video'); ?>
    </section>
    <?php endif; ?>

    <section class="rs-post d-flex center align-center">
        <p>Partager sur</p>
        <a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&t=<?php the_title(); ?>" target="blank"><img src="<?php echo site_url().'/wp-content/uploads/2021/12/facebook.svg' ?>"></a>
        <a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>" target="_blank"><img src="<?php echo site_url().'/wp-content/uploads/2021/12/linkedin.svg' ?>"></a>
        <a href="https://twitter.com/share" data-text="<?php echo get_the_title(); ?>" data-url="<?php echo wp_get_shortlink(); ?>" target="_blank"><img class="picto-rs" src="<?php echo site_url().'/wp-content/uploads/2022/02/Vector-2.svg' ?>"></a>
        <button onclick="copyToClipboard()" class="copybutton"><img src="<?php echo site_url().'/wp-content/uploads/2021/12/link.svg' ?>"></button>
    </section>
</div>

<div class="container-m">
    <h4>Poursuivre votre lecture</h4>
    <div class="d-flex wrap">
            <?php 
            $categories = get_the_category();
            $args = array(
                'post_type'	=> 'post',
                // 'category_name' => $categories[0]->cat_name,
                'posts_per_page' => 3,
            );
            $query = new WP_Query( $args );
                if ( $query->have_posts() ) :
                    while ( $query->have_posts() ) : $query->the_post(); ?>    
                             <div class="autres">
                                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                                    <div>
                                        <div class="cat-post"><?php $category = get_the_category(); echo $category[0]->cat_name; ?></div>
                                        <h3><?php the_title(); ?></h3>
                                        <p><?php the_excerpt(); ?></p>
                                        <a class="cta" href="<?php the_permalink(); ?>">Lire la suite</a>
                                    </div>
                                </a>
                            </div>
                        <?php endwhile;
                    endif;
                wp_reset_postdata(); ?>
    </div>
</div>

<?php get_footer();