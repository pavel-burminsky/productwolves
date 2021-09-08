<?php /* Template Name: Home */
get_header(); ?>
	<div class="container home-products">
		<div class="row">
			<?php pw_front_products(); ?>
		</div>
		<div class="load-products">
			<div><?php _e( 'Load more', 'pw' ); ?></div>
		</div>
	</div>
<?php get_footer(); ?>