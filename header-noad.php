<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <?php wp_head(); ?>
</head>
<body <?php body_class( $class ); ?> >
  <header class="header">
    <nav class="navbar navbar-toggleable-md navbar-inverse bg-primary fixed-top" id="primary-navbar" role="navigation">
      <div class="container">
        <div class="text-center">
<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      </div>

  				<?php wp_nav_menu(
  					array(
  						'theme_location'  => 'primary',
  						'container_class' => 'collapse navbar-collapse',
  						'container_id'    => 'navbarNavDropdown',
  						'menu_class'      => 'navbar-nav',
  						'fallback_cb'     => '',
  						'menu_id'         => 'main-menu',
  						'walker'          => new WP_Bootstrap_Navwalker(),
  					)
  				); ?>
      </div>
      <script>
      	jQuery(document).ready(function(){
      		jQuery('ul.navbar-nav').superfish({
            delay:       100,                            // one second delay on mouseout
      			animation:   {opacity:'show',height:'show'},  // fade-in and slide-down animation
      			speed:       'fast',                          // faster animation speed
      			autoArrows:  false                            // disable generation of arrow mark-up
          });
      	});
      </script>
    </nav>
  </header><!-- ./header -->

  <main class="site-content">
  <!-- 上面是复用的头部 -->