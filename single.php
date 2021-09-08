<?php get_header(); ?>
	<div class="breadcrumbs">
		<div class="container">
			<a href="<?php bloginfo( 'url' ); ?>"><?php _e( 'Home', 'pw' ); ?></a> <span></span> <a href="<?php echo get_permalink( get_field( 'blog_page', 'option' ) ); ?>"><?php _e( 'Blog', 'pw' ); ?></a> <span></span> <?php the_title(); ?>
			<div class="single-head">
				<h1><?php the_title(); ?></h1>
				<span class="user-icon"></span> <?php _e( 'Post by', 'pw' ); ?>: <?php echo get_the_author(); ?> <span class="calendar-icon"></span> <?php the_date( 'j M Y' ); ?>
			</div>
		</div>
	</div>
	<div class="container">
		<article class="post-single">
			<?php the_content(); ?>
		</article>
		<div class="latest-blogs"><?php _e( 'Latest Blogs', 'pw' ); ?></div>
		<div class="related-posts">
			<?php pw_latest_blogs( $post->ID ); ?>
		</div>
	</div>
<?php get_footer(); ?>