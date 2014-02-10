
<?php
/*
Template Name: Homepage
*/
?>
<?php get_header(); ?>
	
	<div id="primary">

		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>		

			<div id="top-banner-container">
				<div id="hp-slideshow-container">
					<?php echo do_shortcode('[shslideshow id="2"]'); ?>
				</div>
				<div id="hp-top-content">
					<?php echo get_field('homepage_top_content') ?>
				</div>
			</div>

			<div id="hp-divider">
				<img src="/wp-content/images/hp-content/divider.png" />
			</div>

			<div id="hp-bottom-content">
				<?php echo get_field('homepage_bottom_content') ?>
			</div>

			<div id="hp-bottom-box-container">
				<div id="center-boxes">
					<div class="bottom-box">
						<div class="hp-box-title ">PROFESSIONAL SERVICES</div>
						<div class="hp-box-content">
							<a href="/professional-services/">Evaluation</a></br></br>
							<a href="/professional-services/">Collaborative Consultation</a></br></br>
							<a href="/professional-services/">Counseling, Coaching,</br> &amp Intervention</a>
						</div>
					</div>
					<div class="bottom-box">
						<div class="hp-box-title ">FORMS / DOCUMENTS</div>
						<div class="hp-box-content">
							<a href="/forms/">School Forms</a></br></br>
							<a href="/forms/">Child Forms</a></br></br>
							<a href="/forms/">Informational Documents</a></br>
						</div>
					</div>
					<div class="bottom-box">
						<div class="hp-box-title ">CONTACT</div>
						<div class="hp-box-content">
							Contact us for more information</br></br>
							<a href="/contact"><div id="hp-contact-button">CONTACT US</div></a>
						</div>
					</div>
				</div>
			</div>	

			<?php endwhile; ?>
		<?php endif; ?>

	</div>

<?php get_footer(); ?>