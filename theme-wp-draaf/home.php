<?php get_header(); 
$terms = get_the_terms( $cat->ID, 'category' ); 
foreach ( $terms as $term ) {
    $cat_id = $term->term_id;
}
$background = get_field('couleur_de_letiquette', 'category' . '_' . $cat_id); ?>

<style type="text/css">
	.cat-post {
		background-color: <?php echo $background; ?>;
	}
</style>

<div class="container-m blog-list">

    <h1>Suivez nos actualités</h1>

    <!-- FILTRE -->
    <div class="filter d-flex">
        <span>Filtrer par secteur</span>
        <div class="d-flex wrap">
            <?php
            $cats = get_categories();
            foreach($cats as $cat):?>
                <input type="radio" name="filter_blog" class="filter_blog">
                <label for="filter_blog" data-val="<?= $cat->cat_name ?>" class="filter-button cat-post"><?= $cat->cat_name ?></label>
            <?php endforeach; ?>  
        </div>
    </div>

    <!-- Affichage des articles -->
    <div class="res-filter d-flex wrap">

        <?php 
            $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
            $value = $_POST['value'];
            $query_args = array(
                // 'post_type' => 'post',
                'posts_per_page' => 12,
                'paged' => $paged,
                'category_name' => $value
            );
            $custom_post_type = new WP_Query( $query_args );
            
            if ( $custom_post_type->have_posts() ) : 
                while ( $custom_post_type->have_posts() ) : $custom_post_type->the_post(); ?>
                                <div class="autres">
                                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                                        <div>
                                            <div class="cat-post"><?php $category = get_the_category(); echo $category[0]->cat_name; ?></div>
                                            <h2><?php the_title(); ?></h2>
                                            <p><?php the_excerpt(); ?></p>
                                            <a class="cta" href="<?php the_permalink(); ?>">Lire la suite</a>
                                        </div>
                                    </a>
                                </div>

            <?php endwhile; endif;
        the_posts_pagination(); 
        wp_reset_postdata(); ?>

    </div>

    <!-- Bandeau event -->
    <div class="footer-contact">
        <section class="container-m bloc-contact" style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url('<?php the_field('background_event', 'option') ?>'); 
        background-position: center; background-size: cover;">
            <h4><?php the_field('titre_event', 'option') ?></h4>
            <p><?php the_field('texte_event', 'option'); ?></p>
            <div class="d-flex center">
                <?php 
                $link = get_field('cta_event', 'option');
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

</div>
<?php get_footer(); ?>