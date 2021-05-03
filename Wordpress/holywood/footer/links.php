<?php if ( ot_get_option('holywood_footer_link_area') != 'off' ) : ?>
    <!-- FOOTER -->
    <div class="module links-section" style="text-align:<?php echo ot_get_option('holywood_section_align') ; ?>">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 lj-footer-links wow fadeInUp" data-wow-delay="0.6s">
                    <?php
                    $slide = ot_get_option( 'holywood_footer_links', array() );
                    if ( $slide ) {
                        echo '<ul class="footer-links">';
                        foreach( $slide as $value ) {
                            echo '<li><a title="'.esc_html($value['holywood_link_text']).'"
                            target="'.esc_html($value['holywood_link_target']).'"
                            href="'.esc_url($value['holywood_link_url']).'">'.esc_html($value['holywood_link_text']).'</a></li>'; }
                            echo '</ul>';
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- /FOOTER -->
<?php endif; ?>
