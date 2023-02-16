<div class="col-agenda d-flex wrap">
    <div class="d-flex align-center wrap">
        <div class="d-flex align-center agenda-dates">
            <?php if( have_rows('date_debut') ): while( have_rows('date_debut') ): the_row(); ?>
                <div>
                    <p class="date"><?php the_sub_field('jour'); ?></p>
                    <p class="annee"><?php the_sub_field('mois_annee'); ?></span>
                </div>
            <?php endwhile; endif; ?>
            <?php if( have_rows('date_fin') ): while( have_rows('date_fin') ): the_row(); ?>
                <?php if( get_sub_field('jour_fin') ): ?><img class="arrow-ag" src="/wp-content/uploads/2022/02/Vector.svg"><?php endif ?>
                <div class="date-fin">
                    <p class="date"><?php the_sub_field('jour_fin'); ?></p>
                    <p class="annee"><?php the_sub_field('mois_annee'); ?></span>
                </div>
            <?php endwhile; endif; ?>
        </div>
        <div>
            <h3><?php the_title(); ?></h3>
            <div class="filter-button">
                <?php $type = get_the_terms( get_the_ID(), 'type' );?>
                <?= $type[0]->name; ?>
            </div>
            <p><?php the_field('texte'); ?></p>
        </div>
    </div>
    <div>
    <?php 
        $link = get_field('lien_externe');
        if( $link ): ?>
            <a class="cta" target="_blank" href="<?php echo esc_url( $link ); ?>">En savoir plus</a>
        <?php endif; ?>
    </div>
</div>