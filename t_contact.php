<?php
/*
Template Name: Contact Us
*/
get_header(); ?>

	<div id="primary" class="content-area">
		<?php $contact_head = get_field('contact_head'); if ($contact_head): ?>
		<section class="section-nav">
			<div class="container-fluid">
				<div class="row">
					<?php foreach ($contact_head as $item): ?>
					<a href="<?php echo $item['url']; ?>" class="nav-item smoothScroll align-center col-md-6 col-sm-6 col-xs-6">
						<?php if ($item['text']): ?>
						<h5><?php echo $item['text']; ?></h5>
						<?php endif; ?>

						<div class="icon">
							<i class="icon-arrow-down"></i>
						</div>
					</a><!-- /team-nav-item -->
					<?php endforeach; ?>
				</div>
			</div>
		</section><!-- /section-nav -->
		<?php endif; ?>

		<section class="contact-us">
			<div class="container">
				<?php $contact_us = get_field('contact_us'); if ($contact_us): ?>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="section-title">
							<h3 class="title text-uppercase"><?php echo $contact_us['title']; ?></h3>
							<span class="separator lg"><span></span></span>
						</div>
					</div>
				</div>
				<?php endif; ?>

				<div class="row">
					<?php $contacts = get_field('contacts', 'options'); if ($contacts): ?>
					<div class="col-md-5 col-sm-12 col-xs-12">
						<div class="content">
							<ul class="list-unstyled">
								<?php foreach ($contacts as $contact): ?>
								<li>
									<?php if ( ( in_array('title', $contact['choose_options'])) && $contact['title'] ): ?>
									<h6><?php echo $contact['title']; ?></h6>
									<?php endif; ?>

									<?php if ( ( in_array('name', $contact['choose_options'])) && $contact['name'] ): ?>
									<h5><?php echo $contact['name']; ?></h5>
									<?php endif; ?>

									<?php if ( ( in_array('address', $contact['choose_options']) ) && $contact['address'] ): ?>
									<a href="<?php echo $contact['address']['google_map_url'] ?>" class="adress" target="_blank"><?php echo $contact['address']['address'] ?></a>
									<?php endif; ?>

									<?php if ( ( in_array('email', $contact['choose_options']) ) && $contact['email'] ): ?>
									<p>Email: <a href="mailto:<?php echo $contact['email']; ?>"><?php echo $contact['email']; ?></a></p>
									<?php endif; ?>

									<?php if ( ( in_array('phone1', $contact['choose_options']) ) && $contact['phone_1'] || ( in_array('phone2', $contact['choose_options']) ) && $contact['phone_2'] ): ?>
									<p>Office: <a href="tel:<?php echo $contact['phone_1']; ?>"><?php echo $contact['phone_1']; ?></a> <?php if ( ( in_array('phone2', $contact['choose_options']) ) && $contact['phone_2']): ?>/ <a href="tel:<?php echo $contact['phone_2']; ?>"><?php echo $contact['phone_2']; ?></a><?php endif; ?></p>
									<?php endif; ?>
								</li>
								<?php endforeach; ?>
							</ul>
						</div>
					</div>
					<?php endif; ?>

					<div class="col-md-7 col-sm-12 col-xs-12">
						<div class="contact-us-form">
							<?php echo do_shortcode('[gravityform id="2" title="false" description="false" tabindex="20" ajax="true"]'); ?>
						</div>
					</div>
				</div>
			</div>
		</section><!-- /contact-us -->

		<section class="countries features">
			<div class="container-fluid">
				<div class="row eq-height justify-content-center">
					<a href="#asia" class="single-location smoothScroll feature text-center col-md-2 col-sm-4 col-xs-6 col">
						<div class="icon">
							<i class="icon-asia"></i>
						</div>

						<div class="content">
							<h5>Asia</h5>
						</div>

						<div class="arrow">
							<button><i class="icon-arrow-down"></i></button>
						</div>
					</a><!-- /single-location -->

					<a href="#" class="single-location smoothScroll feature text-center col-md-2 col-sm-4 col-xs-6 col">
						<div class="icon">
							<i class="icon-africa"></i>
						</div>

						<div class="content">
							<h5>Africa</h5>
						</div>

						<div class="arrow">
							<button><i class="icon-arrow-down"></i></button>
						</div>
					</a><!-- /single-location -->

					<a href="#" class="single-location smoothScroll feature text-center col-md-2 col-sm-4 col-xs-6 col">
						<div class="icon">
							<i class="icon-europe"></i>
						</div>

						<div class="content">
							<h5>Europe</h5>
						</div>

						<div class="arrow">
							<button><i class="icon-arrow-down"></i></button>
						</div>
					</a><!-- /single-location -->

					<a href="#" class="single-location smoothScroll feature text-center col-md-2 col-sm-4 col-xs-6 col">
						<div class="icon">
							<i class="icon-meast"></i>
						</div>

						<div class="content">
							<h5>Middle East</h5>
						</div>

						<div class="arrow">
							<button><i class="icon-arrow-down"></i></button>
						</div>
					</a><!-- /single-location -->

					<a href="#" class="single-location smoothScroll feature text-center col-md-2 col-sm-4 col-xs-6 col">
						<div class="icon">
							<i class="icon-namerica"></i>
						</div>

						<div class="content">
							<h5>N. America</h5>
						</div>

						<div class="arrow">
							<button><i class="icon-arrow-down"></i></button>
						</div>
					</a><!-- /single-location -->

					<a href="#" class="single-location smoothScroll feature text-center col-md-2 col-sm-4 col-xs-6 col">
						<div class="icon">
							<i class="icon-samerica"></i>
						</div>

						<div class="content">
							<h5>S. America</h5>
						</div>

						<div class="arrow">
							<button><i class="icon-arrow-down"></i></button>
						</div>
					</a><!-- /single-location -->
				</div>
			</div>
		</section><!-- /countrys -->

		<section id="locations">
			<div class="container">
				<div id="asia">
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="section-title">
								<h3 class="title text-uppercase">Asia</h3>
								<span class="separator lg"></span>
							</div>
						</div>
					</div>

					<div class="row location-item">
						<div class="col-md-4 col-sm-4 col-xs-12">
							<h6 class="title text-uppercase">Worldwide Sales & Marketing</h6>
						</div>

						<div class="col-md-4 col-sm-4 col-xs-12">
							<div class="location">
								<h5 class="name">Stella Liu</h5>
								<span class="lc-name">Hong Kong</span>
								<ul class="list-unstyled">
									<li>Email: <a href="mailto:awong@beaconintermodal.com">awong@beaconintermodal.com</a></li>
									<li>Office: <a href="tel:+1-925-566-8361">+1-925-566-8361</a></li>
									<li>Office: <a href="tel:+1-925-566-8361">+1-925-566-8361</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-4 col-sm-4 col-xs-12">
							<div class="location">
								<h5 class="name">Dan Deblasio</h5>
								<span class="lc-name">New York, Ny. Usa</span>
								<ul class="list-unstyled">
									<li>Email: <a href="mailto:awong@beaconintermodal.com">awong@beaconintermodal.com</a></li>
									<li>Office: <a href="tel:+1-925-566-8361">+1-925-566-8361</a></li>
									<li>Office: <a href="tel:+1-925-566-8361">+1-925-566-8361</a></li>
								</ul>
							</div>
						</div>
					</div><!-- /row -->

					<div class="row location-item">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<span class="separator lg"></span>
						</div>
						<div class="col-md-4 col-sm-4 col-xs-12">
							<h6 class="title text-uppercase">Regional Operations</h6>
						</div>

						<div class="col-md-4 col-sm-4 col-xs-12">
							<div class="location">
								<h5 class="name">Stella Liu</h5>
								<span class="lc-name">Hong Kong</span>
								<ul class="list-unstyled">
									<li>Email: <a href="mailto:awong@beaconintermodal.com">awong@beaconintermodal.com</a></li>
									<li>Office: <a href="tel:+1-925-566-8361">+1-925-566-8361</a></li>
									<li>Office: <a href="tel:+1-925-566-8361">+1-925-566-8361</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-4 col-sm-4 col-xs-12">
							<div class="location">
								<h5 class="name">Dan Deblasio</h5>
								<span class="lc-name">New York, Ny. Usa</span>
								<ul class="list-unstyled">
									<li>Email: <a href="mailto:awong@beaconintermodal.com">awong@beaconintermodal.com</a></li>
									<li>Office: <a href="tel:+1-925-566-8361">+1-925-566-8361</a></li>
									<li>Office: <a href="tel:+1-925-566-8361">+1-925-566-8361</a></li>
								</ul>
							</div>
						</div>
					</div><!-- /row -->
				</div><!-- /asia -->

				<div id="china">
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="section-title">
								<h3 class="title text-uppercase">China</h3>
								<span class="separator lg"></span>
							</div>
						</div>
					</div>

					<div class="row location-item">
						<div class="col-md-4 col-sm-4 col-xs-12">
							<h6 class="title text-uppercase">Sales & Marketing</h6>
						</div>

						<div class="col-md-4 col-sm-4 col-xs-12">
							<div class="location">
								<h5 class="name">Stella Liu</h5>
								<span class="lc-name">Hong Kong</span>
								<ul class="list-unstyled">
									<li>Email: <a href="mailto:awong@beaconintermodal.com">awong@beaconintermodal.com</a></li>
									<li>Office: <a href="tel:+1-925-566-8361">+1-925-566-8361</a></li>
									<li>Office: <a href="tel:+1-925-566-8361">+1-925-566-8361</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-4 col-sm-4 col-xs-12">
							<div class="location">
								<h5 class="name">Dan Deblasio</h5>
								<span class="lc-name">New York, Ny. Usa</span>
								<ul class="list-unstyled">
									<li>Email: <a href="mailto:awong@beaconintermodal.com">awong@beaconintermodal.com</a></li>
									<li>Office: <a href="tel:+1-925-566-8361">+1-925-566-8361</a></li>
									<li>Office: <a href="tel:+1-925-566-8361">+1-925-566-8361</a></li>
								</ul>
							</div>
						</div>
					</div><!-- /row -->

					<div class="row location-item">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<span class="separator lg"></span>
						</div>
						<div class="col-md-4 col-sm-4 col-xs-12">
							<h6 class="title text-uppercase">Operations</h6>
						</div>

						<div class="col-md-4 col-sm-4 col-xs-12">
							<div class="location">
								<h5 class="name">Stella Liu</h5>
								<span class="lc-name">Hong Kong</span>
								<ul class="list-unstyled">
									<li>Email: <a href="mailto:awong@beaconintermodal.com">awong@beaconintermodal.com</a></li>
									<li>Office: <a href="tel:+1-925-566-8361">+1-925-566-8361</a></li>
									<li>Office: <a href="tel:+1-925-566-8361">+1-925-566-8361</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-4 col-sm-4 col-xs-12">
							<div class="location">
								<h5 class="name">Dan Deblasio</h5>
								<span class="lc-name">New York, Ny. Usa</span>
								<ul class="list-unstyled">
									<li>Email: <a href="mailto:awong@beaconintermodal.com">awong@beaconintermodal.com</a></li>
									<li>Office: <a href="tel:+1-925-566-8361">+1-925-566-8361</a></li>
									<li>Office: <a href="tel:+1-925-566-8361">+1-925-566-8361</a></li>
								</ul>
							</div>
						</div>
					</div><!-- /row -->

					<div class="row location-item">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<span class="separator lg"></span>
						</div>
						<div class="col-md-4 col-sm-4 col-xs-12">
							<h6 class="title text-uppercase">Technical Operations</h6>
						</div>

						<div class="col-md-4 col-sm-4 col-xs-12">
							<div class="location">
								<h5 class="name">Stella Liu</h5>
								<span class="lc-name">Hong Kong</span>
								<ul class="list-unstyled">
									<li>Email: <a href="mailto:awong@beaconintermodal.com">awong@beaconintermodal.com</a></li>
									<li>Office: <a href="tel:+1-925-566-8361">+1-925-566-8361</a></li>
									<li>Office: <a href="tel:+1-925-566-8361">+1-925-566-8361</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-4 col-sm-4 col-xs-12">
							<div class="location">
								<h5 class="name">Dan Deblasio</h5>
								<span class="lc-name">New York, Ny. Usa</span>
								<ul class="list-unstyled">
									<li>Email: <a href="mailto:awong@beaconintermodal.com">awong@beaconintermodal.com</a></li>
									<li>Office: <a href="tel:+1-925-566-8361">+1-925-566-8361</a></li>
									<li>Office: <a href="tel:+1-925-566-8361">+1-925-566-8361</a></li>
								</ul>
							</div>
						</div>
					</div><!-- /row -->
				</div><!-- /asia -->
			</div>
		</section><!-- /single-locations -->

		<?php $resale = get_field('resale_information'); if ($resale): ?>
		<section id="resale-information" class="contact-information coverbg" <?php if($resale['bg']): ?>style="background-image: url(<?php echo $resale['bg']; ?>);"<?php endif; ?>>
			<div class="container">
				<div class="row">
					<?php if ($resale['sub_title'] || $resale['title'] || $resale['content']): ?>
					<div class="col-md-5 col-sm-5 col-xs-12">
						<?php if ($resale['sub_title'] || $resale['title']): ?>
						<div class="section-title">
							<?php if ($resale['sub_title']): ?>
							<h6 class="sub-title text-uppercase"><?php echo $resale['sub_title']; ?></h6>
							<?php endif; ?>

							<?php if ($resale['title']): ?>
							<h3 class="title text-uppercase"><?php echo $resale['title']; ?></h3>
							<span class="separator left"><span></span></span>
							<?php endif; ?>
						</div>
						<?php endif; ?>

						<?php if ($resale['content']): ?>
						<?php echo $resale['content']; ?>
						<?php endif; ?>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</section><!-- /contact-information -->
		<?php endif; ?>

		<section class="back-top">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<a href="#header" class="content smoothScroll">
							<div class="icon">
								<i class="icon-arrow-up"></i>
							</div>
							<h6>Back to Top</h6>
						</div>
					</div>
				</div>
			</div>
		</section><!-- /back-top -->

	</div><!-- /primary -->
	
<?php get_footer(); ?>