<?php get_header(); ?>

    <!-- ENTETE -->
    <?php if( have_rows('entete') ): ?>
        <?php while( have_rows('entete') ): the_row(); ?>
            <section class="container-xl hero" style="background: linear-gradient(180deg, rgba(0, 0, 0, 0.4) 0%, rgba(0, 0, 0, 0) 24%), linear-gradient(102.67deg, rgba(0, 0, 0, 0.6) 25.25%, rgba(0, 0, 0, 0) 136.33%), url('<?php the_sub_field('image') ?>');     
            background-size: cover; background-position: center;">
                <div class="container-l"> 
                    <h1><?php the_title() ?></h1>
                    <p><?php the_sub_field('sous-titre') ?></p>
                </div>
            </section>
        <?php endwhile; ?>
    <?php endif; ?>

    <!-- BLOC TXT/IMG -->
    <section class="container-m txt-img">
        <?php if( have_rows('txt_img') ): ?>
            <?php while( have_rows('txt_img') ): the_row(); ?>
                <div class="d-flex between wrap">
                    <div>
                        <h2><?php the_sub_field('titre'); ?></h2>
                        <p><?php the_sub_field('texte'); ?></p>
                    </div>
                    <div style="position: relative">
                        <img src="<?php the_sub_field('image'); ?>">
                        <div class="line-y-r"></div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </section>

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

    <!-- BLOC IMG/TXT -->
    <section class="container-m txt-img">
        <?php if( have_rows('img_txt') ): ?>
            <?php while( have_rows('img_txt') ): the_row(); ?>
                <div class="d-flex between wrap reverse">
                    <div style="position: relative">
                        <img src="<?php the_sub_field('image'); ?>">
                        <div class="line-y-l"></div>
                    </div>
                    <div>
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
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </section>

    <!-- PARTENAIRES -->
    <section class="container-m center partenaires">
        <h2>Nos partenaires</h2>
            <div class="container-s d-flex wrap">
                <?php if( have_rows('partenaires') ): ?>
                    <?php while( have_rows('partenaires') ): the_row(); ?>
                        <img src="<?php the_sub_field('logo_du_partenaire') ?>">
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        <a class="cta" href="<?php echo site_url().'/partenaires' ?>">Découvrir tous nos partenaires</a> 
    </section>

    <!-- BAS DE PAGE -->
    <?php get_template_part( 'templates/footer-metier' ); ?>

<?php get_footer();