<section class="container-m onglet-actu">
    <h2>Suivez nos actualités</h2>

        <div class="d-flex wrap">
            <?php 
            $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
            $value = get_the_title();
            $query_args = array(
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
                                        <h3><?php the_title(); ?></h3>
                                        <p><?php the_excerpt(); ?></p>
                                        <a class="cta" href="<?php the_permalink(); ?>">Lire la suite</a>
                                    </div>
                                </a>
                            </div>
            <?php endwhile; 
            endif;
            the_posts_pagination(); 
            wp_reset_postdata();
            ?>
        </div>

</section>