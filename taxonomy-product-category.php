<?php  get_header();
$term = get_queried_object(); ?>
	<div class="container home-products">
		<h1><?php echo $term->name; ?></h1>
		<?php if( $term->count < 1 ) {
			?>
			<p><?php _e( 'No products found.', 'pw' ); ?></p>
			<?php
		} else {
			pw_term_products( $term );
		} ?>
		<div class="load-products">
			<div class="load-more-btn" data-btn="product" data-category="<?php echo $term->term_id; ?>"><?php _e( 'Load more', 'pw' ); ?></div>
		</div>
	</div>
<?php get_footer(); ?>