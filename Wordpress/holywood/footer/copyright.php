	<?php if ( ot_get_option('powered') != 'off') : ?>
	<!-- FOOTER -->
	<div class="footer module">
	<div class="container">
	  <div class="row">
		<div class="col-sm-6 lj-footer-copyrights wow fadeInUp" data-wow-delay="0.5s">
			<p><?php echo wp_kses(ot_get_option('footerpowered'),holywood_allowed_html()); ?></p>
		</div>
		<div class="col-sm-6 lj-footer-socials wow fadeInUp" data-wow-delay="0.5s">
		    <?php $slide = ot_get_option( 'social' );
			if ($slide) {
				echo '<ul class="footer-social">';
				foreach($slide as $key => $value) { 
				echo '<li><a class="fa fa-'.esc_html($value['social_text']).'" title="'.esc_html($value['social_text']).'" target="_blank" href="'.esc_url($value['social_link']).'"></a></li>'; }
				echo '</ul>';
			} else { ?> <?php } ?>
		</div>
	  </div>
	</div>
	</div>
	<!-- /FOOTER -->
	<?php endif; ?>
