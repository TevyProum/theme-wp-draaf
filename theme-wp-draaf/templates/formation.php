<section class="container-m onglet-formation">
    <section class="container-s center">
        <h2>Trouvez la formation adaptée à votre projet professionnel</h2>
        <p>Presque toutes les formations peuvent se faire sous statut scolaire ou en apprentissage. Mais comment choisir entre les deux ? 
            En apprentissage, on est salarié : paye, contrat de travail, collègues : un bon moyen de découvrir le monde du travail et de gagner son propre argent. 
            Mais il faut s’adapter à un rythme soutenu. En scolaire, on est souvent présent en établissement de formation, ce qui laisse plus de temps pour étudier et préparer les examens.</p>
        <p><i>Vous pouvez filtrer l’affichage des éléments de la carte en cliquant sur le pictogramme oeil dans la légende</i></p>
        <section class="toggle d-flex center">
            <input name="map" type="radio" value="scolaire" id="scolaire" checked="true"><label for="scolaire">Voie scolaire</label>
            <input name="map" type="radio" value="apprentissage" id="apprentissage"><label for="apprentissage">Voie de l'apprentissage</label>
        </section>
    </section>

    <div id="map-scolaire">
        <iframe width="100%" height="800px" frameborder="0" allowfullscreen src="//umap.openstreetmap.fr/fr/map/formations-agricoles_681224#8/50.207/4.109?scaleControl=false&miniMap=false&scrollWheelZoom=false&zoomControl=true&allowEdit=false&moreControl=true&searchControl=null&tilelayersControl=false&embedControl=false&datalayersControl=false&onLoadPanel=caption&captionBar=false&measureControl=false&locateControl=false&editinosmControl=false"></iframe>
    </div>
    <div id="map-apprentissage">
        <iframe width="100%" height="800px" frameborder="0" allowfullscreen src="//umap.openstreetmap.fr/fr/map/apprentissage_686828#8/50.207/4.109?scaleControl=false&miniMap=false&scrollWheelZoom=false&zoomControl=true&allowEdit=false&moreControl=true&searchControl=null&tilelayersControl=false&embedControl=false&datalayersControl=false&onLoadPanel=caption&captionBar=false&measureControl=false&locateControl=false&editinosmControl=false"></iframe>
    </div>
</section>

<div class="container-s"><?php the_field('texte_sous_carte') ?></div>

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