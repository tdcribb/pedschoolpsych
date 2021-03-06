<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>

		</div><!-- #main -->
		<footer id="colophon" class="site-footer" role="contentinfo">

			<div class="site-info">
				<a href="/contact">Contact and Location</a>
				<div id="site-credit"><a href="http://lucasandcribb.com">Site Credit: Lucas &amp Cribb</a></div>
			</div><!-- .site-info -->
		</footer><!-- #colophon -->
	</div><!-- #page -->


	<?php $cons_loop = new WP_Query( array( 'post_type' => 'evaluation_service', 'order' => 'ASC' ) ); ?>
	<?php while ( $cons_loop->have_posts() ) : $cons_loop->the_post(); $link = get_permalink();?>
		<div class="service-overlay" rel="<?php the_title(); ?>">
			<div class="overlay-border "></div>
			<img class="close-overlay" src="/wp-content/images/buttons/x.png" />
			<div class="overlay-logo-cont"><img class="overlay-logo" src="/wp-content/images/header/blue-logo.png" /></div>
			<div class="overlay-title"><?php the_title(); ?></div>
			<div class="overlay-divider"><img src="/wp-content/images/hp-content/divider.png" /></div>
			<div class="overlay-content"><?php the_field('service_content'); ?></div>
			<a class="print-service-link" href="<?php echo $link; ?>" target="blank"><div class="print-service">CLICK HERE FOR PRINTABLE VERSION</div></a>
		</div>
	<?php endwhile; ?>

	<?php $cons_loop = new WP_Query( array( 'post_type' => 'consultation_service', 'order' => 'ASC' ) ); ?>
	<?php while ( $cons_loop->have_posts() ) : $cons_loop->the_post(); $link = get_permalink();?>
		<div class="service-overlay" rel="<?php the_title(); ?>">
			<div class="overlay-border "></div>
			<img class="close-overlay" src="/wp-content/images/buttons/x.png" />
			<div class="overlay-logo-cont"><img class="overlay-logo" src="/wp-content/images/header/blue-logo.png" /></div>
			<div class="overlay-title"><?php the_title(); ?></div>
			<div class="overlay-divider"><img src="/wp-content/images/hp-content/divider.png" /></div>
			<div class="overlay-content"><?php the_field('service_content'); ?></div>
			<a class="print-service-link" href="<?php echo $link; ?>" target="blank"><div class="print-service">CLICK HERE FOR PRINTABLE VERSION</div></a>
		</div>
	<?php endwhile; ?>

	<?php $cons_loop = new WP_Query( array( 'post_type' => 'counseling_service', 'order' => 'ASC' ) ); ?>
	<?php while ( $cons_loop->have_posts() ) : $cons_loop->the_post(); $link = get_permalink();?>
		<div class="service-overlay" rel="<?php the_title(); ?>">
			<div class="overlay-border "></div>
			<img class="close-overlay" src="/wp-content/images/buttons/x.png" />
			<div class="overlay-logo-cont"><img class="overlay-logo" src="/wp-content/images/header/blue-logo.png" /></div>
			<div class="overlay-title"><?php the_title(); ?></div>
			<div class="overlay-divider"><img src="/wp-content/images/hp-content/divider.png" /></div>
			<div class="overlay-content"><?php the_field('service_content'); ?></div>
			<a class="print-service-link" href="<?php echo $link; ?>" target="blank"><div class="print-service">CLICK HERE FOR PRINTABLE VERSION</div></a>
		</div>
	<?php endwhile; ?>


</body>
</html>