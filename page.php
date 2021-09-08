<?php get_header(); ?>
	<div class="breadcrumbs">
		<div class="container">
			<a href="<?php bloginfo( 'url' ); ?>"><?php _e( 'Home', 'pw' ); ?></a> <span></span> <?php the_title(); ?>
			<div class="single-head">
				<h1><?php the_title(); ?></h1>
			</div>
		</div>
	</div>
	<div class="container">
		<article class="post-single">
			<?php the_content(); ?>
		</article>
	</div>
<?php get_footer(); ?>