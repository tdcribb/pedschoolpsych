
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
					<?php echo do_shortcode('[slideshow gallery_id="1"]'); ?>
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
							Evaluation</br></br>
							Collaborative Consultation</br></br>
							Counseling, Coaching,</br> &amp Intervention
						</div>
					</div>
					<div class="bottom-box">
						<div class="hp-box-title ">COMING SOON</div>
						<div class="hp-box-content">
							Patient Portal</br></br>
							Clinical Portal</br></br>
							Detailed Printable</br>Information on Services
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