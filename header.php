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
	<meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">

	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<nav class="sticky-top navbar navbar-expand-lg navbar-light bg-white  ">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>


			<div class="collapse navbar-collapse" id="navbarTogglerDemo03">
				<a href="<?= get_site_url() ?>" class="navbar-brand custom-logo-link" rel="home"><img width="770" height="132" src="<?= get_site_url() ?>/wp-content/uploads/2020/04/cropped-logo.png" class="custom-logo" alt="MATRIX SE" srcset="<?= get_site_url() ?>/wp-content/uploads/2020/04/cropped-logo.png 770w, <?= get_site_url() ?>/wp-content/uploads/2020/04/cropped-logo-300x51.png 300w, <?= get_site_url() ?>/wp-content/uploads/2020/04/cropped-logo-768x132.png 768w, <?= get_site_url() ?>/wp-content/uploads/2020/04/cropped-logo-600x103.png 600w, <?= get_site_url() ?>/wp-content/uploads/2020/04/cropped-logo-64x11.png 64w" sizes="(max-width: 770px) 100vw, 770px"></a>
					<?= do_shortcode('[wcas-search-form]') ?>

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

				<ul class=" main-menu-header-links nav nav-pills navbar-nav ">
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
					<li class="nav-item">
						<div class="header-link-to-checkout justify-content-end" style="margin-left:1em;">
								<button type="button" class="btn">
									<?= do_shortcode('[woo_cart_but]');?>
								</button>
						</div>
					</li>
				</ul>

			</div>
		</nav>	
		<?php /* if (!isset($_COOKIE['valid_pincode'])){ ?>
		<div id="check-postcode" class="alert alert-primary alert-dismissible fade show" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<?php } */?>

	<div id="container-fluid" class="site-content">
<style>

.scrollbar {
/* margin-left: 30px; */
float: left;
height: 300px;
width: 65px;
background: #fff;
overflow-y: scroll;
margin-bottom: 25px;
}
.force-overflow {
min-height: 450px;
}

.scrollbar-primary::-webkit-scrollbar {
width: 12px;
background-color: #f1f1f1; }

.scrollbar-primary::-webkit-scrollbar-thumb {
border-radius: 10px;
-webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
background-color: #ced6de; }

.scrollbar-primary {
scrollbar-color: #ced6de #f1f1f1;
}

</style>
		<div class="row">
			<nav class="overflow-auto scrollbar scrollbar-primary col-md-2 d-none d-md-block bg-light sidebar">
				<div class="sidebar-sticky">
				<div class="container-fluid h-100">
					<div class="row h-100">
						<div class="col-2 collapse d-md-flex bg-faded pt-2 h-100" id="sidebar">
							<ul class="nav nav-pills flex-column">
								<li class="nav-item first-step"><a class="nav-link" href="#">
								<img src="<?= get_site_url() ?>/assets/icon/kategorier/nyhet.png" alt="">
									Nyhet</a></li>
								<li class="nav-item first-step"><a class="nav-link" href="#">
									<img src="<?= get_site_url() ?>/assets/icon/kategorier/kort_datum.png" alt="">
									Kort Datum</a></li>
								<li class="nav-item first-step"><a class="nav-link" href="#">
									<img src="<?= get_site_url() ?>/assets/icon/kategorier/super_klip.png" alt="">
									Super Klipp</a></li>
								<li  class="nav-item">
									<hr>
										<?php
											if(is_active_sidebar('left-navigation')){
												dynamic_sidebar('left-navigation');
											}
										?>
								</li>
							</ul>

							<hr>

					</div>
				</div>							
			</nav>
			<main role="main" class="col-md-8">