	<?php if ( ot_get_option('widgetizefooter') != 'off') : ?>
	<section id="footer-widget-section" class="breaking">
		<div class="color-overlay">
			<div class="footer-widget-wrapper">
				<div class="container">
					<div class="row">
					<div id="footer-subscribe" class="the-subscribe-form-off">
						<?php dynamic_sidebar( 'widgetizefooter' ); ?>
					</div> <!--/ .row -->
					</div> <!--/ .row -->
				</div> <!--/ .container -->
			</div> <!--/ .footer-widget-wrapper -->
		</div><!--/ .color-overlay -->
	</section>
	<?php endif; ?>