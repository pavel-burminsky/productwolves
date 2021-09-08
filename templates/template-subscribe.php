<?php /* Template Name: Subscribe */
get_header(); ?>
	<div class="breadcrumbs">
		<div class="container">
			<a href="<?php bloginfo( 'url' ); ?>"><?php _e( 'Home', 'pw' ); ?></a> <span></span> <?php the_title(); ?>
			<div class="newsletter-head">
				<h1><?php the_field( 'title' ); ?></h1>
				<?php the_content(); ?>
				<form action="#" method="post">
					<input type="email" name="email" placeholder="Email">
					<input type="submit" name="submit" value="Subscribe">
				</form>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="newsletter-wrap">
			<h2 class="why-subscribe"><?php _e( 'Why Subscribe?', 'pw' ); ?></h2>
			<div class="row">
				<?php pw_why_subscribe(); ?>
			</div>
			<div class="unsubscribe">
				<?php the_field( 'terms' ); ?>
			</div>
		</div>
	</div>
<?php get_footer(); ?>