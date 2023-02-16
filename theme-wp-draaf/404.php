<?php get_header(); ?>

    <section class="page404 container-m">
        <div class="img-404">
            <img src="<?= site_url().'/wp-content/uploads/2021/12/404.svg' ?>">
            <div class="line-y"></div>
        </div>
        <p>Il semblerait qu’il n’y ait rien par ici !
        <br>La page que vous demandez est introuvable. Le lien utilisé est rompu ou l’adresse est incorrecte.</p>
        <a class="cta" href="<?php echo home_url( '/' ); ?>">Retourner à la page d’accueil</a>
    </section>

<?php get_footer(); ?>