<?php get_header(); ?>

<section class="container-m">

    <h1 class="center">Agenda</h1>

    <div class="filter d-flex wrap align-center">
            <span><label for="filter_type">Filtrer les événements</label></span>
            <select id="filter_type">
                <?php
                $terms = get_terms('type');
                foreach ($terms as $term): ?>
                    <option data-type="<?= $term->slug; ?>"><?= $term->name;?></option>
                <?php
                endforeach;
                ?>
            </select>
    </div>

    <div class="res-filter3">
        <?php 
          $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
          $args = array(
              'post_type' => 'agenda',
              'posts_per_page' => 12,
              'paged' => $paged);
          $agenda = new WP_Query( $args );
            if ( $agenda->have_posts() ) : while ( $agenda->have_posts() ) : $agenda->the_post(); 
                get_template_part( 'templates/liste-agenda' ); 
            endwhile; endif;
      
          the_posts_pagination(); 
          wp_reset_postdata(); ?>
    </div>

</section>

<?php get_footer(); ?>