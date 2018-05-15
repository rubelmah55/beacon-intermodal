<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php if(is_front_page()){ echo' Home '; echo' | '; echo bloginfo('name'); } else { wp_title(''); echo' | '; bloginfo('name');  } ?></title>
		<link rel="icon" type="image/png" href="<?= get_template_directory_uri(); ?>/images/icon/favicon-16x16.png" sizes="16x16">
		<link rel="icon" type="image/png" href="<?= get_template_directory_uri(); ?>/images/icon/favicon-32x32.png" sizes="32x32">
		<link rel="icon" sizes="192x192" href="<?= get_template_directory_uri(); ?>/images/icon/touch-icon-192x192.png">
		<link rel="apple-touch-icon-precomposed" sizes="180x180" href="<?= get_template_directory_uri(); ?>/images/icon/apple-touch-icon-180x180-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?= get_template_directory_uri(); ?>/images/icon/apple-touch-icon-152x152-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?= get_template_directory_uri(); ?>/images/icon/apple-touch-icon-144x144-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?= get_template_directory_uri(); ?>/images/icon/apple-touch-icon-120x120-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?= get_template_directory_uri(); ?>/images/icon/apple-touch-icon-114x114-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="76x76" href="<?= get_template_directory_uri(); ?>/images/icon/apple-touch-icon-76x76-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?= get_template_directory_uri(); ?>/images/icon/apple-touch-icon-72x72-precomposed.png">
		<link rel="apple-touch-icon-precomposed" href="<?= get_template_directory_uri(); ?>/images/icon/apple-touch-icon-precomposed.png">
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<header id="header">
			<div class="navbar navbar-default">
			  	<div class="container-fluid">
					<div class="navbar-header">
					 	<div class="logo">
					 		<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
					 			<?php 
					 			$logo = get_field('logo', 'options'); 
					 			$tagline = get_field('tagline', 'options'); 
					 			if ($logo): ?>
						 		<img src="<?php echo $logo['url']; ?>" class="img-responsive" alt="<?php echo $logo['alt']; ?>">
						 		<?php else: ?>
						 		<img src="<?php echo get_template_directory_uri(); ?>/images/logo2.png" class="img-responsive" alt="Beacon Intermodal">
					 			<?php endif; ?>
					 			<span class="tagline">A Group Company of <strong>Mitsubishi UFJ Lease & Finance</strong></span>
						 	</a>
					 	</div>

					 	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						  	<span class="icon-bar"><span class="inner"></span></span>
						  	<span class="icon-bar"><span class="inner"></span></span>
						  	<span class="icon-bar"><span class="inner"></span></span>
					  	</button>
					</div>
			
					<div class="collapse navbar-collapse">
						<?php $user_login = get_field('user_login', 'options'); if ($user_login): ?>
						<div class="top-bar text-right hidden-sm hidden-xs">
							<ul class="list-inline">
								<li>
									<a href="<?php echo $user_login['url']; ?>" class="btn text-uppercase" target="_blank"><i class="icon-user"></i><?php echo $user_login['text']; ?></a>
								</li>
							</ul>
						</div><!-- /top-bar -->
						<?php endif; ?>

					  	<?php 
					  		wp_nav_menu( array(
	                            'menu'               => 'Primary menu',
	                            'theme_location'     => 'menu-1',
	                            'depth'              => 2,
	                            'container'          => 'false',
	                            'menu_class'         => 'nav navbar-nav navbar-right',
	                            'menu_id'            => '',
	                            'fallback_cb'        => 'wp_bootstrap_navwalker::fallback',
	                            'walker'             => new wp_bootstrap_navwalker(),
	                        ));
	                    ?>

	                    <?php if ($user_login): ?>
					  	<div class="top-bar text-right visible-sm-block visible-xs-block">
							<ul class="list-inline">
								<li>
									<a href="<?php echo $user_login['url']; ?>" class="btn text-uppercase" target="_blank"><i class="icon-user"></i><?php echo $user_login['text']; ?></a>
								</li>
							</ul>
						</div><!-- /top-bar -->
						<?php endif; ?>
			
					</div><!-- /collapse -->
			  	</div><!-- /container-fluid -->
			</div><!--/ Navbar -->
			<div class="header_gutter"></div>
		</header><!-- /header -->

		<?php
			$page_header = get_field('page_header', getPageID());
			$header_bg = get_field('header_bg', getPageID());
			$title = $page_header['title'] ? $page_header['title'] : get_the_title();
			$header_bg = $header_bg ? $header_bg : get_template_directory_uri()."/images/banner-services.jpg";
		if (!is_404() && !is_front_page() && !is_page_template('t_about.php') && !is_singular('our_equipment')): ?>
		<section class="entry-header align-center-v coverbg <?php if($page_header['description']) echo 'paragraph'; ?>" style="background-image: url(<?php echo $header_bg; ?>);">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="content">
							<h2 class="title text-uppercase"><?php echo customizedtitle($title); ?></h2>
							<?php if ($page_header['sub_title']): ?>
							<h6 class="sub-title"><?php echo $page_header['sub_title']; ?></h6>
							<?php endif; ?>

							<?php if ($page_header['description']): ?>
								<?php echo $page_header['description']; ?>
							<?php endif ?>
						</div>
					</div>
				</div>
			</div>
		</section><!-- /entry-header -->
		<?php endif; ?>
		
		<?php if (!is_front_page() && !is_404()): ?>
		<section class="breadcrumb-wrapper">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<?php echo beacon_breadcrumb(); ?>
					</div>
				</div>
			</div>
		</section><!-- /breadcrumb -->
		<?php endif; ?>