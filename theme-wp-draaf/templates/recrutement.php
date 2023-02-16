<section class="container-m onglet-recrutement">
    <h2><?php the_field('titre_recrutement') ?></h2>

    <?php if( have_rows('plateforme') ): ?>
        <?php while( have_rows('plateforme') ): the_row(); ?>
            <div class="d-flex align-center between wrap plateforme">
                <div class="d-flex wrap plateforme__logo">
                    <img src="<?php the_sub_field('image') ?>">
                    <div>
                        <h3><?php the_sub_field('nom_plateforme') ?></h3>
                        <p><?php the_sub_field('texte') ?></p>
                    </div>
                </div>
                <div>
                    <?php 
                $link = get_sub_field('lien_plateforme');
                if( $link ): ?>
                    <a class="cta" href="<?php echo esc_url( $link ); ?>" target="_blank">Consulter le site</a>
                <?php endif; ?>
                </div>
            </div>
        <?php endwhile;
    endif; ?>
 </section>