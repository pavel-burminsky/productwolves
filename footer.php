	<footer class="footer">
		<div class="subscribe">
			<div class="container">
				<h2><?php the_field( 'footer_subscribe_cta', 'option' ); ?></h2>
				<a href="<?php echo get_permalink( get_field( 'subscribe_page', 'option' ) ); ?>"><?php _e( 'Subscribe Now', 'pw' ); ?></a>
			</div>
		</div>
		<div class="main">
			<div class="container">
				<div class="footer-row">
					<div>
						<a href="#">
							<img src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/img/logo-footer.svg" alt="Productwolves" class="logo-footer">
						</a>
					</div>
					<div>
						<h4><?php _e( 'Company', 'pw' ); ?></h4>
						<?php wp_nav_menu( array( 'theme_location' => 'footer_1', 'container' => '' ) ); ?>
					</div>
					<div>
						<h4><?php _e( 'Learn more', 'pw' ); ?></h4>
						<?php wp_nav_menu( array( 'theme_location' => 'footer_2', 'container' => '' ) ); ?>
					</div>
					<div>
						<h3><?php the_field( 'footer_subscribe_title', 'option' ); ?></h3>
						<p><?php the_field( 'footer_subscribe_text', 'option' ); ?></p>
						<form action="#" method="post">
							<input type="email" name="email" placeholder="Enter email">
							<input type="submit" name="submit" value="Subscribe">
						</form>
					</div>
				</div>
			</div>
			<div class="copy">
				Copyright &copy; <?php echo date( 'Y' ); ?> Product Wolves. <a href="<?php the_field( 'instagram', 'option' ); ?>" class="instagram">instagram</a> <a href="<?php the_field( 'tiktok', 'option' ); ?>" class="tiktok">tiktok</a>
			</div>
		</div>
	</footer>
	<div class="popup-newsletter">
		<div class="wrap">
			<span class="close-popup"></span>
			<div class="image"></div>
			<h3>Get the cool stuff delivered to your inbox</h3>
			<form action="#" method="post">
				<label for="newsletter-name">Name</label>
				<input type="text" name="name" id="newsletter-name" placeholder="Enter your name">
				<label for="newsletter-email">Email adress</label>
				<input type="email" name="email" id="newsletter-email" placeholder="Enter your email adress">
				<label for="newsletter-message">Message</label>
				<textarea name="email" id="newsletter-email" placeholder="Write your message"></textarea>
				<input type="submit" name="submit" value="Send message">
			</form>
		</div>
	</div>
	<?php wp_footer(); ?>
</body>
</html>