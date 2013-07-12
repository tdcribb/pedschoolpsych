<!-- LANDING PAGE -->
<?php
/*
Template Name: PSP Landing
*/
?>
<?php get_header(); ?>

	<div class="landing-page-section about-us-cont">
		<a name="about-us"><div class="lp-section-title about-us"><div class="title-int-box">ABOUT US</div></div></a>
		<div class="lp-about-us-text">
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
			Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
		</div>
		<div class="lp-about-us-text">
			Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint 
			occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		</div>
		<a href="#top" class="top-link">Back to Top</a>
	</div>
	<div class="landing-page-section services-cont">
		<a name="services" class="lp-services-title"><div class="lp-services"><div class="title-int-box">SERVICES</div></div></a>
		<div class="lp-services-text">
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
			Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
			Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint 
			occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		</div>
		<a href="#top" class="top-link">Back to Top</a>
	</div>
	<div class="landing-page-section our-office-cont">
		<a name="our-office"><div class="lp-section-title our-office"><div class="title-int-box">OUR OFFICE</div></div></a>
		<div class="lp-contact-text">
			3710 Landmark Drive</br>Suite 100</br>Colubmia, SC 29204</br></br>
			803.555.1212</br><a class="lp-email" href="mailto:info@pedschoolpsych.com">info@pedschoolpsych.com</a></br></br>
			<span class="office-hours">
				Office Hours:</br>Mon-Fri 9am - 6pm</br>By Appointment Only
			</span>
		</div>
		<div class="lp-map">
			<iframe width="325" height="275" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=34.018385,-80.986685&amp;num=1&amp;gl=us&amp;ie=UTF8&amp;t=m&amp;z=14&amp;ll=34.017843,-80.986158&amp;output=embed"></iframe><br /><small><a href="https://maps.google.com/maps?q=34.018385,-80.986685&amp;num=1&amp;gl=us&amp;ie=UTF8&amp;t=m&amp;z=14&amp;ll=34.017843,-80.986158&amp;source=embed" style="color:#0000FF;text-align:left">View Larger Map</a></small>
		</div>
		<a href="#top" class="top-link">Back to Top</a>
	</div>
	
	<!-- <div class="landing-page-section documents-cont">
		<a name="documents"><div class="lp-section-title documents"><div class="title-int-box">DOCUMENTS</div></div></a>
		<div class="lp-doc-text">
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
			Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
			Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint 
			occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		</div>
		<ul class="lp-docs-list">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post();    
 			$args = array(
 			  'post_type' => 'attachment',
 			  'numberposts' => -1,
 			  'post_status' => null,
 			  'post_parent' => $post->ID
 			 );
			
 			 $attachments = get_posts( $args );
 			    if ( $attachments ) {
 			       foreach ( $attachments as $attachment ) {
 			          echo '<li>';
 			          the_attachment_link( $attachment->ID, true );
 			          echo '</li>';
 			         }
 			    }
 			endwhile; endif; ?>
 		</ul>
		<a href="#top" class="top-link">Back to Top</a>
	</div> -->

	<div class="landing-page-section contact-us-cont">
		<a name="contact-us"><div class="lp-section-title contact-us"><div class="title-int-box">CONTACT US</div></div></a>
		<div class="lp-form-subtitle">
			PLEASE COMPLETE THE FORM BELOW TO CONTACT OUR OFFICE
		</div>
		<div class="lp-contact-form">
			<?php echo do_shortcode('[contact-form-7 id="69" title="Landing Page Contact Form"]'); ?>
		</div>
		<a href="#top" class="top-link">Back to Top</a>
	</div>

<?php get_footer(); ?>