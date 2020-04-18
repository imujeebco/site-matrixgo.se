<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_4
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1.4">

	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<nav class="navbar navbar-expand-lg navbar-light bg-white">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<a class="navbar-brand" href="#"><?php the_custom_logo(); ?></a>

			<div class="collapse navbar-collapse" id="navbarTogglerDemo03">
				<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
				</ul>
				<div class="main-menu-header-links">
					<style>
						.nav-link.logga-in { background-image:url('<?= get_site_url() ?>/assets/icon/logga-in.png'); }
						.nav-link.logga-in:hover {background-image:url('<?= get_site_url() ?>/assets/icon/logga-in-hover.png');}
						.nav-link.inkopslista {background-image:url('<?= get_site_url() ?>/assets/icon/inkopslista.png');}
						.nav-link.inkopslista:hover {background-image:url('<?= get_site_url() ?>/assets/icon/inkopslista-hover.png');}
						.nav-link.favorite {background-image:url('<?= get_site_url() ?>/assets/icon/favorite.png');}
						.nav-link.favorite:hover {background-image:url('<?= get_site_url() ?>/assets/icon/favorite-hover.png');}
						.nav-link.hitta-butik{background-image:url('<?= get_site_url() ?>/assets/icon/hitta-butik.png');}
						.nav-link.hitta-butik:hover {background-image:url('<?= get_site_url() ?>/assets/icon/hitta-butik-hover.png');}
					</style>
					<ul class="nav nav-pills navbar-nav ">
						<li class="nav-item">
							<a class="nav-link hitta-butik" href="<?= get_site_url() ?>/find-store" >Hitta Butik</a>
						</li>
						<li class="nav-item">
							<a class="nav-link inkopslista" href="<?= get_site_url() ?>/"  >Inköpslista</a>
						</li>
						<li class="nav-item">
							<a class="nav-link favorite" href="<?= get_site_url() ?>/wishlist/" >Favorit</a>
						</li>
						<li class="nav-item">
							<a class="nav-link logga-in" href="<?= get_site_url() ?>/my-account/">Logga in</a>
						</li>
						<span></span>
						<li class="nav-item" style="margin-left:30px;">
							<div class="mini-cart"><img src="<?= get_site_url() ?>/assets/loader.gif" alt=""></div>
						</li>
					</ul>
				</div>
			</div>
		</nav>	
		<nav class=" sticky-top navbar navbar-expand-md navbar-light bg-light justify-content-center">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse delivery-time" id="navbarCollapse" style="max-width: 220px;">
				<div>
						<!-- <span class="badge"><img src="<?= get_site_url() ?>/assets/icon/delivery-time.png" alt="" style="width:30px;"></span> -->
						<span id="delivery-info">
							<img src="<?= get_site_url() ?>/assets/icon/delivery-time.png" alt="">
						</span>
						<span class="sr-only"></span>
				</div>
			</div>
			<div class="collapse navbar-collapse" id="navbarCollapse">
				<?= do_shortcode('[wcas-search-form]') ?>
			</div>
			<div class="header-link-to-checkout justify-content-end">
					<button type="button" class="btn">
						<?= do_shortcode('[woo_cart_but]');?>
					</button>
			</div>
		</nav>
		<?php if (!isset($_COOKIE['valid_pincode'])){ ?>
		<div id="check-postcode" class="alert alert-primary alert-dismissible fade show" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<?php } ?>
	<div id="container-fluid" class="site-content">

		<div class="row">
			<nav class="col-md-3 d-none d-md-block bg-light sidebar">
				<div class="sidebar-sticky">
					<div class="nav flex-column accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">
						<?php

						$menu_name = 'isaa_left_menu';
						
						if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
							$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
						
							$menu_items = wp_get_nav_menu_items($menu->term_id);
							
							$left_menu = [];
							foreach ($menu_items as $key => $menu) {
								$left_menu[$menu->menu_item_parent][$menu->ID] = [
									'menu_id' => $menu->ID,
									'title' => $menu->title,
									'url' => $menu->url
								];
							}

							foreach ($left_menu[0] as $key => $parent_menu) {
								echo '
								<div class="card">
									<!-- Card header -->
									<div class="card-header" role="tab" id="heading'.$key.'">
										<span class="collapsed nav-link active" data-toggle="collapse" data-parent="#accordionEx" href="#collapse-'.$key.'" aria-expanded="false" aria-controls="collapse-'.$key.'" >
											<h5 class="mb-0">
											<a href="'.$parent_menu['url'].'">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
											'. $parent_menu['title'] .'</a>
											</h5><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle">
										</span>
									</div>
								';
								// echo $parent_menu['title'];
								if (isset($left_menu[$parent_menu['menu_id']])){
								echo '
									<div id="collapse-'.$key.'" class="collapse" role="tabpanel" aria-labelledby="heading'.$key.'" data-parent="#accordionEx" style="">
										<div class="card-body">
											<ul class="nav flex-column">
														
								';
									foreach ($left_menu[$parent_menu['menu_id']] as $jkey => $child_menu) {
											echo '<li class="nav-item"><a class="nav-link" href="'.$child_menu['url'].'">' . $child_menu['title'] .'</a></li>';
									}
								echo '
											</ul>							
										</div>
									</div>
								</div>		
								';			
								}

							}
						}

							// wp_nav_menu( array( 
							// 	'theme_location' => 'isaa_left_menu', 

							// 	'menu'            => '',
							// 	'container'       => 'div',
							// 	'container_class' => '',
							// 	'container_id'    => '',
							// 	'menu_class'      => 'menu',
							// 	'menu_id'         => '',
							// 	'echo'            => true,
							// 	'fallback_cb'     => 'wp_page_menu',
							// 	'before'          => '<ul class="card">',
							// 	'after'           => '</ul>',
							// 	'link_before'     => '',
							// 	'link_after'      => '',
							// 	'items_wrap'      =>  '
							// 							<li role="tab" id="%1$s" class="%2$s card-header">%3$s</li></ul>',
							// 	//'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							// 	'item_spacing'    => 'preserve',
							// 	'depth'           => 0,
							// 	'walker'          => '',



							// 	'container_class' => 'custom-menu-class' ) ); 
						?>
					</div>	

				</div>
				
			</nav>
			<main role="main" class="col-md-9 ml-sm-auto col-lg-9 px-4">