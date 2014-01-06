<?php
/*
Template Name: Single Consultation Service
*/
?>
<?php get_header(); ?>




	<div id="primary">

		<?php if ( have_posts() ) : ?>

			<?php $eval_loop = new WP_Query( array( 'post_type' => 'consultation_service') ); ?>
			<?php while ( have_posts() ) : the_post(); ?>

					<div class="single-service-container" rel="<?php the_title(); ?>">
						<div class="single-service-logo-cont"><img class="single-service-logo" src="/wp-content/images/header/blue-logo.png" /></div>
						<div class="single-service-title"><?php the_title(); ?></div>
						<div class="single-service-divider"><img src="/wp-content/images/hp-content/divider.png" /></div>
						<div class="single-service-content"><?php the_field('service_content') ?></div>
					</div>

					<div class="print-footer-info">
						3612 Landmark Drive, Suite A Columbia, SC 29204</br>
						www.pedschoolpsych.com</br>
						info@pedschoolpsych.com</br>
						843.555.1212
					</div>

			<?php endwhile; ?>

			
		<?php endif; ?>

	</div>

<?php get_footer(); ?>