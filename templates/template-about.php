<?php /* Template Name: About */
get_header(); ?>
	<div class="breadcrumbs">
		<div class="container">
			<a href="<?php bloginfo( 'url' ); ?>"><?php _e( 'Home', 'pw' ); ?></a> <span></span> <?php the_title(); ?>
			<div class="blog-head">
				<?php the_title(); ?>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="about-wrap">
			<div>
				<h1><?php the_field( 'main_title' ); ?></h1>
				<?php the_content(); ?>
			</div>
			<div>
				<img src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/img/about.svg" alt="About us">
			</div>
		</div>
	</div>
<?php get_footer(); ?>