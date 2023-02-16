<?php get_header(); ?>

<section class="container-m">

    <h1 class="center"><?php the_title() ?></h1>

    <h2>Les partenaires majeurs</h2>
        <div class="partner d-flex wrap">
            <?php if( have_rows('partenaires') ): while( have_rows('partenaires') ): the_row(); ?>
                <div class="card-partner">
                    <img src="<?php the_sub_field('image'); ?>">
                    <h3><?php the_sub_field('titre'); ?></h3>
                    <p><?php the_sub_field('texte'); ?></p>
                    <?php $link = get_sub_field('lien_vers_le_partenaire'); if( $link ): ?>
                        <a class="cta" href="<?php echo esc_url( $link ); ?>" target="_blank">Voir le site</a>
                    <?php endif; ?>
                </div>
            <?php endwhile; endif; ?>
        </div>

    <?php if( get_field('partenaires_media') ): ?>
        <h2>Les partenaires médias</h2>
            <div class="partner d-flex">
                <?php if( have_rows('partenaires_media') ): while( have_rows('partenaires_media') ): the_row(); ?>
                    <div class="card-partner">
                        <img src="<?php the_sub_field('image'); ?>">
                        <h3><?php the_sub_field('titre'); ?></h3>
                    </div>
                <?php endwhile; endif; ?>
            </div>
    <?php endif; ?>
        
</section>

<?php get_footer();