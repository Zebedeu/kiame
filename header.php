<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
		<meta name="description" content="<?php bloginfo( 'description' ); ?>">
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<?php if( is_singular() && pings_open( get_queried_object() ) ): ?>
			<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php endif; ?>

    <?php wp_head();?>
</head>

<body <?php body_class();?>>
<?php wp_body_open();?>

   
<main class="page projets-page">
    <section class="portfolio-block projects compact-grid">
				
		<nav class="navbar navbar-light navbar-expand-lg  bg-white portfolio-navbar">
		  <div class="container colort"><a class="navbar-brand logo" href="<?php echo esc_url(home_url( '/'));?>"><?php echo bloginfo( 'name' );?></a>
			<!-- Brand and toggle get grouped for better mobile display -->
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="sr-only"><?php _e('Toggle navigation','kiame');?></span><span class="navbar-toggler-icon"></span>
			</button>
				<?php
				wp_nav_menu( array(
					'theme_location'    => 'primary',
					'container'         => 'div',
					'container_class'   => 'collapse navbar-collapse',
					'container_id'      => 'navbarNav',
					'menu_class'        => 'nav navbar-nav ml-auto',
					'walker'            => new MZ_Walker_Nav_Menu(),
				) );
				?>

			</div>
		</nav>