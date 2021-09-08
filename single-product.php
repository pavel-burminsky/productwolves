<?php get_header(); ?>
	<div class="breadcrumbs">
		<div class="container">
			<a href="<?php bloginfo( 'url' ); ?>"><?php _e( 'Home', 'pw' ); ?></a> <span></span> <?php the_title(); ?>
		</div>
	</div>
	<div class="container">
		<div class="product-single">
			<div class="image">
				<?php the_post_thumbnail( 'product' ); ?>
			</div>
			<div class="description">
				<h1><?php the_title(); ?></h1>
				<div class="text">
					<?php the_content(); ?>
				</div>
				<?php if( get_field( 'buy_now_url' ) ): ?>
				<a href="<?php the_field( 'buy_now_url' ); ?>" target="_blank" class="buy-now"><?php _e( 'Buy now', 'pw' ); ?></a>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<div class="similar-products">
		<?php _e( 'Similar Products', 'pw' ); ?>
	</div>
	<div class="container home-products">
		<div class="row">
			<?php pw_similar_products( $post->ID ); ?>
		</div>
	</div>
<?php get_footer(); ?>