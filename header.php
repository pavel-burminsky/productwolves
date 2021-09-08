<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title(); ?></title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<?php wp_head(); ?>
	<link rel="icon" href="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/img/favicon.png" sizes="128x128">
</head>
<body <?php body_class(); ?>>
	<header class="header">
		<div class="container">
			<span class="hamburger"></span>
			<a href="<?php bloginfo( 'url' ); ?>">
				<img src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/img/logo.svg" align="Productwolves" class="logo">
			</a>
			<div class="main-nav">
				<?php wp_nav_menu( array( 'theme_location' => 'header_menu', 'container' => '' ) ); ?>
				<span class="nav-close"></span>
			</div>
		</div>
		<?php if( is_front_page() ): ?>
		<div class="front-nav">
			<div class="container">
				<div class="by">By Categories</div>
				<div class="drop-cats">Select</div>
				<div class="categories">
					<?php wp_nav_menu( array( 'theme_location' => 'cats_menu', 'container' => '' ) ); ?>
				</div>
			</div>
		</div>
		<?php endif; ?>
	</header>