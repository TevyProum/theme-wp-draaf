<?php 

// Ajouter la prise en charge des images mises en avant
add_theme_support( 'post-thumbnails' );

// Ajouter automatiquement le titre du site dans l'en-tête du site
add_theme_support( 'title-tag' );

// CPT
function led_register_post_types() {
    $labels = array(
        'name' => 'Métier',
        'all_items' => 'Tous les métiers',  
        'singular_name' => 'Métier',
        'add_new_item' => 'Ajouter un métier',
        'edit_item' => 'Modifier le métier',
        'menu_name' => 'Métier'
    );
	$args = array(
        'labels' => $labels,
        'public' => true,
        'show_in_rest' => true,
        'has_archive' => true,
        'supports' => array( 'title', 'editor','thumbnail' ),
        'menu_position' => 5, 
        'menu_icon' => 'dashicons-hammer',
	);
	register_post_type( 'metier', $args );

    $agenda = array(
        'name' => 'Agenda',
        'all_items' => 'Tous les événements',  
        'singular_name' => 'Agenda',
        'add_new_item' => 'Ajouter un événement',
        'edit_item' => "Modifier l'événement",
        'menu_name' => 'Agenda'
    );
	$arg_agenda = array(
        'labels' => $agenda,
        'public' => true,
        'show_in_rest' => true,
        'has_archive' => true,
        'supports' => array( 'title', 'editor','thumbnail' ),
        'menu_position' => 5, 
        'menu_icon' => 'dashicons-clock',
	);
	register_post_type( 'agenda', $arg_agenda );

    $labels = array(
        'name' => "Type",
        'new_item_name' => 'Nom du nouveau type',
    	'parent_item' => "Type d’événements",
    );
    
    $args = array( 
        'labels' => $labels,
        'public' => true, 
        'show_in_rest' => true,
        'hierarchical' => true, 
    );

    register_taxonomy( 'type', 'agenda', $args );
}
add_action( 'init', 'led_register_post_types' );


// Désactive éditeur classique
add_action('init', 'init_remove_support', 100);
function init_remove_support(){
    $page = 'page';
    remove_post_type_support( $page, 'editor');
    $post = 'post';
    remove_post_type_support( $post, 'editor');
    $metier = 'metier';
    remove_post_type_support( $metier, 'editor');
    $agenda = 'agenda';
    remove_post_type_support( $agenda, 'editor');
}


// Enlever commentaires du BO
function remove_links_tab_menu_pages() {
    remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'remove_links_tab_menu_pages');


// Déclarations CSS + JS
function led_register_assets() {
    wp_enqueue_script('jquery' );

    if( is_singular('metier') ) {
    wp_enqueue_script( 
        'onglet', 
        get_template_directory_uri() . '/js/onglet.js', 
        array( 'jquery' ), '1.0', true );
    }

    wp_enqueue_script( 
        'script', 
        get_template_directory_uri() . '/js/script.js', 
        array( 'jquery' ), '1.0', true );
    wp_localize_script( 
        'script', 
        'my_ajax_object', 
        array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );

    if( is_single() ) {
    wp_enqueue_script( 
        'copy', 
        get_template_directory_uri() . '/js/copy.js', 
        array( 'jquery' ), '1.0', true );
    }

    if( is_front_page() ) {
    wp_enqueue_script( 
        'video', 
        get_template_directory_uri() . '/js/video.js', 
        array( 'jquery' ), '1.0', true );
    } 

    wp_enqueue_script( 
        'toggle', 
        get_template_directory_uri() . '/js/toggle.js', 
        array( 'jquery' ), '1.0', true );
    wp_enqueue_script( 
        'swiper', 
        get_template_directory_uri() . '/js/swiper.js', 
        array( 'jquery' ), '1.0', true );
    wp_enqueue_script( 
        'menu', 
        get_template_directory_uri() . '/js/menu.js', 
        array( 'jquery' ), '1.0', true );
    wp_enqueue_script( 
        'lity', 
        get_template_directory_uri() . '/js/lity.js', 
        array( 'jquery' ), '1.0', true );
    

    wp_enqueue_style( 
        'led',
        get_stylesheet_uri(), 
        array(), 
        '1.0' );
    wp_enqueue_style( 
        'draaf', 
        get_template_directory_uri() . '/css/draaf.css',
        array(), 
        '1.0' );
    wp_enqueue_style( 
        'litycss', 
        get_template_directory_uri() . '/css/lity.css',
        array(), 
        '1.0' );
}
add_action( 'wp_enqueue_scripts', 'led_register_assets' );


// Menus 
register_nav_menus( array(
	'principal' => 'Menu principal',
    'secondaire' => 'Menu secondaire',
    'footer1' => 'Bas de page - Section gauche',
    'footer2' => 'Bas de page - Section milieu',
	'footer3' => 'Bas de page - Section droite',
) );


// BANDEAU CONTACT - OPTION PAGE
if( function_exists( 'acf_add_options_page' ) ) {
	
	acf_add_options_page( array(
		'page_title' 	=> 'Bandeaux',
		'menu_title'	=> 'Bandeaux',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
        'position' => 7, 
		'redirect'		=> false
	) );	
}


// FOOTER EDITABLE
add_filter('wp_nav_menu_items', 'my_wp_nav_menu_items', 10, 2);

function my_wp_nav_menu_items( $items, $args ) {
	$menu = wp_get_nav_menu_object($args->menu);
	if( $args->theme_location == 'footer1' ) {
		$text = the_field('texte-footer', $menu);
		$html_text = '<p>'.$text.'</p>';
		$items = $html_text . $items;
	}
	return $items;
	
}


// FILTRE BLOG
add_action( 'wp_ajax_filter_blog', 'filter_blog' );
add_action( 'wp_ajax_nopriv_filter_blog', 'filter_blog' );

function filter_blog() {
            $post_type = $args['post_type'];
            $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

            global $wp_query;
            $original_query = $wp_query;
            
            $value = $_POST['value'];

            $query_args = array(
                'post_type' => 'post',
                'posts_per_page' => 12,
                'paged' => $paged,
                'category_name' => $value
            );

            $custom_post_type = new WP_Query( $query_args );
            $wp_query = $custom_post_type;
            
            if ( $custom_post_type->have_posts() ) : 
                while ( $custom_post_type->have_posts() ) : $custom_post_type->the_post(); ?>
                                <div class="autres">
                                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                                        <div>
                                            <div class="cat-post"><?= $value ?></div>
                                            <h2><?php the_title(); ?></h2>
                                            <p><?php the_excerpt(); ?></p>
                                            <a class="cta" href="<?php the_permalink(); ?>">Lire l'article</a>
                                        </div>
                                    </a>
                                </div>

            <?php endwhile; endif;
        the_posts_pagination(); 
        wp_reset_postdata(); 
     ?>

	<?php wp_die();
}


// FILTRE AGENDA
add_action( 'wp_ajax_filter_type', 'filter_type' );
add_action( 'wp_ajax_nopriv_filter_type', 'filter_type' );

function filter_type() {
    $type = $_POST['type'];
    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
    $args = array(
        'post_type' => 'agenda',
        'showposts' => -1,
        'tax_query' => array(
            array(
                'taxonomy'  => 'type',
                'field'     => 'slug',
                'terms'     => $type,
            )
        )
    );
    $agenda = new WP_Query( $args );
            if ( $agenda->have_posts() ) : while ( $agenda->have_posts() ) : $agenda->the_post(); 
                get_template_part( 'templates/liste-agenda' ); 
            endwhile; endif;

    the_posts_pagination(); 
    wp_reset_postdata(); ?>

	<?php wp_die();
}