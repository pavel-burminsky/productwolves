<?php


function pw_enqueue() {
	wp_enqueue_style( 'style', get_stylesheet_directory_uri() . '/assets/css/style.css' );
	wp_enqueue_style( 'lato', 'https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap' );

	wp_enqueue_script( 'theme-jquery', get_template_directory_uri() . '/assets/js/jquery-3.6.0.min.js', array(), '3.6.0', true );
	wp_enqueue_script( 'theme', get_template_directory_uri() . '/assets/js/theme.js', array( 'theme-jquery' ), '1.0.0', true );
	wp_localize_script( 'theme', 'ada_ajax_object',
		array( 
			'ajaxurl' => admin_url( 'admin-ajax.php' )
		)
	);
}
add_action( 'wp_enqueue_scripts', 'pw_enqueue' );


function pw_products_init() {
	$labels = array(
		'name'                  => _x( 'Products', 'Post type general name', 'pw' ),
		'singular_name'         => _x( 'Product', 'Post type singular name', 'pw' ),
		'menu_name'             => _x( 'Products', 'Admin Menu text', 'pw' ),
		'name_admin_bar'        => _x( 'Product', 'Add New on Toolbar', 'pw' ),
		'add_new'               => __( 'Add New', 'pw' ),
		'add_new_item'          => __( 'Add New Product', 'pw' ),
		'new_item'              => __( 'New Product', 'pw' ),
		'edit_item'             => __( 'Edit Product', 'pw' ),
		'view_item'             => __( 'View Product', 'pw' ),
		'all_items'             => __( 'All Products', 'pw' ),
		'search_items'          => __( 'Search Products', 'pw' ),
		'parent_item_colon'     => __( 'Parent Products:', 'pw' ),
		'not_found'             => __( 'No Products found.', 'pw' ),
		'not_found_in_trash'    => __( 'No Products found in Trash.', 'pw' ),
	);     
	$args = array(
		'labels'             => $labels,
		'description'        => 'Product custom post type.',
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'product' ),
		'menu_icon'          => 'dashicons-cart',
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 10,
		'supports'           => array( 'title', 'editor', 'custom-fields', 'thumbnail' ),
		'show_in_rest'       => true
	);

	register_post_type( 'Product', $args );

	$labels = array(
		'name'              => _x( 'Categories', 'taxonomy general name', 'pw' ),
		'singular_name'     => _x( 'Category', 'taxonomy singular name', 'pw' ),
		'search_items'      => __( 'Search Categories', 'pw' ),
		'all_items'         => __( 'All Categories', 'pw' ),
		'view_item'         => __( 'View Category', 'pw' ),
		'parent_item'       => __( 'Parent Category', 'pw' ),
		'parent_item_colon' => __( 'Parent Category:', 'pw' ),
		'edit_item'         => __( 'Edit Category', 'pw' ),
		'update_item'       => __( 'Update Category', 'pw' ),
		'add_new_item'      => __( 'Add New Category', 'pw' ),
		'new_item_name'     => __( 'New Category Name', 'pw' ),
		'not_found'         => __( 'No Categories Found', 'pw' ),
		'back_to_items'     => __( 'Back to Categories', 'pw' ),
		'menu_name'         => __( 'Categories', 'pw' ),
	);

	$args = array(
		'labels'            => $labels,
		'hierarchical'      => true,
		'public'            => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'product-category' ),
		'show_in_rest'      => true,
	);


	register_taxonomy( 'product-category', 'product', $args );
}
add_action( 'init', 'pw_products_init' );


function pw_register_nav_menu() {
	register_nav_menus( array(
		'header_menu' => __( 'Header Menu', 'pw' ),
		'cats_menu'   => __( 'Categories Menu', 'pw' ),
		'footer_1'    => __( 'Footer 1', 'pw' ),
		'footer_2'    => __( 'Footer 2', 'pw' ),
	) );
}
add_action( 'after_setup_theme', 'pw_register_nav_menu', 0 );


if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
}


add_theme_support( 'post-thumbnails' );
add_image_size( 'product', 400, 400, true );
add_image_size( 'blog', 330, 220, true );


function pw_similar_products( $post_id ) {
	$posts = new WP_Query( array(
		'post__not_in'   => array( $post_id ),
		'post_type'      => 'product',
		'posts_per_page' => 3
	) );
	foreach( $posts->posts as $post ) {
		?>
		<div>
			<a href="<?php echo get_permalink( $post ); ?>">
				<div class="image" style="background-image: url('<?php echo get_the_post_thumbnail_url( $post, 'product' ); ?>');"></div>
				<h3><?php echo get_the_title( $post ); ?></h3>
				<span>Learn more</span>
			</a>
		</div>
		<?php
	}
}


function pw_front_products() {
	$posts = new WP_Query( array(
		'post_type'      => 'product',
		'posts_per_page' => 9
	) );
	foreach( $posts->posts as $post ) {
		?>
		<div>
			<a href="<?php echo get_permalink( $post ); ?>">
				<div class="image" style="background-image: url('<?php echo get_the_post_thumbnail_url( $post, 'product' ); ?>');"></div>
				<h3><?php echo get_the_title( $post ); ?></h3>
				<span><?php _e( 'Learn more', 'pw' ); ?></span>
			</a>
		</div>
		<?php
	}
}


function pw_why_subscribe() {
	$cols = get_field( 'why_subscribe' );
	$i = 1;
	foreach( $cols as $col ) {
		?>
		<div class="why-col">
			<div>
				<img src="<?php echo $col['icon']; ?>" alt="#<?php echo $i; ?>">
				<h3>#<?php echo $i; ?></h3>
				<p><?php echo $col['text']; ?></p>
			</div>
		</div>
		<?php
		$i++;
	}
}


function pw_latest_blogs( $post_id ) {
	$posts = new WP_Query( array(
		'post__not_in'   => array( $post_id ),
		'post_type'      => 'post',
		'posts_per_page' => 2
	) );
	foreach( $posts->posts as $post ) {
		?>
		<div>
			<a href="<?php echo get_permalink( $post ); ?>">
				<div class="image" style="background-image: url('<?php echo get_the_post_thumbnail_url( $post, 'blog' ); ?>');"></div>
				<h3><?php echo get_the_title( $post ); ?></h3>
				<p><?php echo pw_excerpt( get_the_content( '', '', $post ), 25, '...' ); ?></p>
				<div class="meta">
					<?php echo get_the_date( 'j M Y', $post ); ?> <span><?php _e( 'Read more', 'pw' ); ?></span>
				</div>
			</a>
		</div>
		<?php
	}
}


function pw_excerpt( $content, $length, $more ) {
	$content = wp_strip_all_tags( $content );
	return wp_trim_words( $content, $length, $more );
}


function pw_term_products( $term ) {
	$posts = new WP_Query( array(
		'post_type'      => 'product',
		'posts_per_page' => 9,
		'tax_query' => array(
			array(
				'taxonomy' => 'product-category',
				'field'    => 'term_id',
				'terms'    => $term->term_id,
			),
		),
	) );
	echo '<div class="row">';
	foreach( $posts->posts as $post ) {
		?>
		<div>
			<a href="<?php echo get_permalink( $post ); ?>">
				<div class="image" style="background-image: url('<?php echo get_the_post_thumbnail_url( $post, 'product' ); ?>');"></div>
				<h3><?php echo get_the_title( $post ); ?></h3>
				<span><?php _e( 'Learn more', 'pw' ); ?></span>
			</a>
		</div>
		<?php
	}
	echo '</div>';
}




