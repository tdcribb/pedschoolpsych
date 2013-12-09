
<?php
/*
Template Name: Contact Page
*/
?>
<?php get_header(); ?>
	
	<div id="primary">

		<div id="top-contact-container">
			<!-- <div id="map-container">
				<iframe width="600" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?oe=utf-8&amp;client=firefox-a&amp;q=3612+Landmark+Drive,+Suite+A+Columbia,+SC+29204&amp;ie=UTF8&amp;hq=&amp;hnear=3612+Landmark+Dr,+Columbia,+South+Carolina+29204&amp;gl=us&amp;ll=34.01811,-80.987568&amp;spn=0.011792,0.018196&amp;t=m&amp;z=14&amp;output=embed"></iframe>
			</div> -->



			<script src="//maps.google.com/maps/api/js?sensor=true" type="text/javascript"></script>
			<div id="map-container"></div>
			<script>
				//GOOGLE MAPS//
				var latlng = new google.maps.LatLng(34.01811,-80.987568);
				var options = {
    				zoom: 15, // This number can be set to define the initial zoom level of the map
    				center: latlng,
    				mapTypeId: google.maps.MapTypeId.ROADMAP // This value can be set to define the map type ROADMAP/SATELLITE/HYBRID/TERRAIN
    			};
    			var map = new google.maps.Map(document.getElementById('map-container'), options);
				var image = new google.maps.MarkerImage('/wp-content/images/psp-drop-pin.png',
    			 	// This marker is 129 pixels wide by 42 pixels tall.
    			 	new google.maps.Size(150, 150),
    			 	// The origin for this image is 0,0.
    			 	new google.maps.Point(0,0),
    			 	// The anchor for this image is the base of the flagpole at 18,42.
    			 	new google.maps.Point(10, 70)
 				);
 				// Add Marker
 				var marker1 = new google.maps.Marker({
    			 	position: new google.maps.LatLng(34.01811,-80.987568),
    			 	map: map,
    			 	icon: image // This path is the custom pin to be shown. Remove this line and the proceeding comma to use default pin
 				});
 				google.maps.event.addListener(marker1, 'click', function() {
   					infowindow1.open(map, marker1);
    			});
			
    			var infowindow1 = new google.maps.InfoWindow({
    			    content:  createInfo('<div id="bublble-title">Pediatric School Psychology</div>', '<div id="bubble-addr-1">3612 Landmark Drive, Suite A</div><div id="bubble-addr-2">Columbia, SC 29204</div><div id="bubble-phone">843.555.1212</div>')
    			});
				function createInfo(title, content) {
    			    return '<div class="infowindow"><strong>'+ title +'</strong>'+content+'</div>';
    			}
    			//END GOOGLE MAPS//
			</script>



			<div id="contact-info">
				<div class="contact-name">Pediatric School Psychology Evalutation and Consultation Services</div>
				<div class="contact-address">3612 Landmark Drive, Suite A</br>Columbia, SC 29204</div>
				<div class="contact-phone">803.309.5234</div>
				<div class="contact-email"><a href="mailto:info@pedschoolpsych.com">info@pedschoolpsych.com</a></div>
			</div>
		</div>

		<div id="contact-divider">
			<img src="/wp-content/images/hp-content/divider.png" />
		</div>

		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>	
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>
		<?php endif; ?>

	</div>

<?php get_footer(); ?>