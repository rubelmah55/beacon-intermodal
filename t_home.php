<?php
/*
Template Name: Home
*/
get_header(); ?>

	<?php $banner = get_field('home_banner'); if ($banner): $bannerImg = $banner['image'] ? $banner['image'] : get_template_directory_uri().'/images/banner.jpg'; ?>
	<section class="banner align-center-v videoBg">
		<video autoplay muted loop class="myVideo coverbg" poster="<?php echo $bannerImg; ?>"><source src="<?php echo $banner['video']; ?>" type="video/mp4">Your browser does not support HTML5 video.</video>
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="content">
						<?php if ($banner['title']): ?>
						<h1 class="text-uppercase"><?php echo $banner['title']; ?></h1>
						<span class="separator left lg"><span></span></span>
						<?php endif; ?>

						<?php if ($banner['description']): ?>
						<?php echo $banner['description']; ?>
						<?php endif; ?>

						<div class="banner-btn align-center-v">
							<a class="scrollDown"><i class="icon-arrow-down"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section><!-- /banner -->
	<?php endif; ?>

	<div id="primary" class="content-area">

		<?php $about = get_field('home_about'); if ($about): ?>
		<section class="about coverbg" style="background-image: url(<?php echo $about['bg']; ?>);">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12 text-center">
						<?php if ($about['sub_title'] || $about['title']): ?>
						<div class="section-title">
							<?php if ($about['sub_title']): ?>
							<h6 class="sub-title text-uppercase"><?php echo $about['sub_title']; ?></h6>
							<?php endif; ?>

								
							<?php if ($about['title']): ?>
							<h3 class="title text-uppercase"><?php echo $about['title']; ?></h3>
							<span class="separator"><span></span></span>
							<?php endif; ?>
						</div>
						<?php endif; ?>

						<?php if ($about['content']): ?>
						<?php echo $about['content']; ?>
						<?php endif; ?>

						<?php if ($about['btn']['text']): ?>
						<a href="<?php echo $about['btn']['url']; ?>" class="btn text-uppercase"><?php echo $about['btn']['text']; ?></a>
						<?php endif ?>
					</div>
				</div>
			</div>
		</section><!-- /about -->
		<?php endif; ?>

		<?php $features = get_field('features'); if ($features): ?>
		<section class="features">
			<div class="container-fluid">
				<div class="row">
					<?php foreach ($features as $feature): ?>
					<a href="<?php echo $feature['url']; ?>" class="feature hover-arrow text-center col-md-3 col-sm-6 col-xs-6 col">
						<?php if ($feature['icon']): ?>
						<div class="icon">
							<i class="icon-<?php echo $feature['icon']; ?>"></i>
						</div>
						<?php endif; ?>

							
						<?php if ($feature['sub_title'] || $feature['title']): ?>
						<div class="content">
							<?php if ($feature['sub_title']): ?>
							<p><?php echo $feature['sub_title']; ?></p>
							<?php endif; ?>
								
							<?php if ($feature['title']): ?>
							<h3><?php echo $feature['title']; ?></h3>
							<?php endif; ?>
						</div>
						<?php endif; ?>

						<div class="arrow">
							<button><i class="icon-arrow-right"></i></button>
						</div>
					</a><!-- /feature -->
					<?php endforeach; ?>
					
				</div>
			</div>
		</section><!-- /features -->
		<?php endif; ?>

		<?php $strong_secure = get_field('strong_secure'); if ($strong_secure): ?>
		<section class="strong-secure">
			<div class="container-fluid">
				<div class="row align-center-v justify-content-center">
					<?php if ($strong_secure['image']): ?>
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="media">
							<img src="<?php echo $strong_secure['image']['url']; ?>" alt="<?php echo $strong_secure['image']['alt']; ?>">
						</div>
					</div>
					<?php endif; ?>

					<?php if ($strong_secure['title'] || $strong_secure['content']): ?>
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="content">
							<?php if ($strong_secure['title']): ?>
							<div class="section-title">
								<h3 class="title text-uppercase"><?php echo $strong_secure['title']; ?></h3>
								<span class="separator left"><span></span></span>
							</div>
							<?php endif; ?>
								
							<?php if ($strong_secure['content']): ?>
							<?php echo $strong_secure['content']; ?>
							<?php endif; ?>
						</div>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</section><!-- /Secure -->
		<?php endif; ?>

		<?php $contact = get_field('home_contact'); if ($contact): ?>
		<section class="contact coverbg" style="background-image: url(<?php echo $contact['bg']; ?>);">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12 text-center">
						<?php if ($contact['sub_title'] || $contact['title']): ?>
						<div class="section-title">
							<?php if ($contact['sub_title']): ?>
							<h6 class="sub-title text-uppercase"><?php echo $contact['sub_title']; ?></h6>
							<?php endif; ?>

							<?php if ($contact['title']): ?>
							<h3 class="title text-uppercase"><?php echo $contact['title']; ?></h3>
							<span class="separator"><span></span></span>
							<?php endif; ?>
						</div>
						<?php endif; ?>
						
						<?php if ($contact['country'] || $contact['locations'] || $contact['btn']): ?>
						<div class="content">
							<?php if ($contact['country']): ?>
							<ul class="country list-inline">
								<?php foreach ($contact['country'] as $country): ?>
								<li><?php echo $country['item']; ?></li>
								<?php endforeach; ?>
							</ul>
							<?php endif; ?>
						
							<?php if ($contact['locations']): ?>
							<ul class="serving list-inline">
								<label>Serving</label>
								<?php foreach ($contact['locations'] as $location): ?>
								<li><a href="<?php echo perm_by_temp('t_contact.php'); ?>#<?php echo $location->post_name; ?>"><?php echo $location->post_title; ?></a></li>
								<?php endforeach; ?>
							</ul>
							<?php endif; ?>

							<?php if ($contact['btn']): foreach($contact['btn'] as $btn): ?>
							<a href="<?php echo $btn['url']; ?>" class="btn text-uppercase"><?php echo $btn['text']; ?></a>
							<?php endforeach; endif; ?>
						</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</section><!-- /contact -->
		<?php endif; ?>

	</div><!-- /primary -->

<?php get_footer(); ?>