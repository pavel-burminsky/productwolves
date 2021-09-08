<?php get_header(); ?>
	<div class="breadcrumbs">
		<div class="container">
			<a href="<?php bloginfo( 'url' ); ?>"><?php _e( 'Home', 'pw' ); ?></a> <span></span> <?php echo get_the_title( get_field( 'blog_page', 'option' ) ); ?>
			<div class="blog-head">
				<?php echo get_the_title( get_field( 'blog_page', 'option' ) ); ?>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="blogs">
			<?php if( have_posts() ): while( have_posts() ): the_post(); ?>
			<article>
				<div class="image">
					<a href="<?php the_permalink(); ?>" style="background-image: url('<?php echo get_the_post_thumbnail_url( $post, 'blog' ); ?>');"></a>
				</div>
				<div class="meta">
					<h2>
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</h2>
					<span class="user-icon"></span> <?php _e( 'Post by', 'pw' ); ?>: <?php echo get_the_author(); ?> <span class="calendar-icon"></span> <?php echo get_the_date( 'j M Y', $post ); ?>
					<p><?php echo pw_excerpt( get_the_content( '', '', $post ), 30, '...' ); ?></p>
					<a href="<?php the_permalink(); ?>" class="blog-more"><?php _e( 'Read more', 'pw' ); ?></a>
				</div>
			</article>
			<?php endwhile; endif; wp_reset_query(); ?>
		</div>
		<div class="load-blogs">
			<div><?php _e( 'Load more', 'pw' ); ?></div>
		</div>
	</div>
<?php get_footer(); ?>