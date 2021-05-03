<?php

if ( ot_get_option('contact') != 'off' ) :

    $footer_adress_column = ot_get_option('footer_adress_column');
    $footer_adress_column = $footer_adress_column ? $footer_adress_column : 'col-sm-4';
    $footer_contact_column = ot_get_option('footer_contact_column');
    $footer_contact_column = $footer_contact_column ? $footer_contact_column : 'col-sm-4';
    $footer_desc_column = ot_get_option('footer_desc_column');
    $footer_desc_column = $footer_desc_column ? $footer_desc_column : 'col-sm-4';

    ?>
    <!-- CONTACT -->
    <div class="contact module">
        <div class="container">
            <div class="row">
                <div class="<?php echo esc_attr( $footer_adress_column ); ?> lj-contact wow fadeInDown" data-wow-delay="0.5s">
                <?php if ( ot_get_option('location_title') ) : ?>
                    <h4><?php echo esc_html( ot_get_option('location_title') ); ?></h4>
                <?php else : ?>
                    <h4><?php esc_html_e( 'Location', 'holywood' ); ?></h4>
                <?php endif; ?>
                <p><?php echo wp_kses(ot_get_option('adress'),holywood_allowed_html()); ?><br>
                    <?php echo wp_kses(ot_get_option('adress2'),holywood_allowed_html()); ?></p>
                </div>

                <div class="<?php echo esc_attr( $footer_contact_column ); ?> lj-contact wow fadeInDown" data-wow-delay="0.5s">
                    <?php if ( ot_get_option('contact_title') ) : ?>
                        <h4><?php echo esc_html( ot_get_option('contact_title') ); ?></h4>
                    <?php else : ?>
                        <h4><?php esc_html_e( 'Contact', 'holywood' ); ?></h4>
                    <?php endif; ?>
                    <p><?php echo wp_kses(ot_get_option('mail'), holywood_allowed_html()) ; ?><br>
                    <?php echo wp_kses(ot_get_option('phone'), holywood_allowed_html()) ; ?></p>
                </div>

                <div class="<?php echo esc_attr( $footer_desc_column ); ?> lj-contact wow fadeInDown" data-wow-delay="0.5s">
                    <?php if ( ot_get_option('desc_title') ) : ?>
                        <h4><?php echo esc_html( ot_get_option('desc_title') ); ?></h4>
                    <?php else : ?>
                        <h4><?php esc_html_e( 'Tell us about you', 'holywood' ); ?></h4>
                    <?php endif; ?>
                    <p><?php echo wp_kses( ot_get_option('desc'), holywood_allowed_html()); ?></p>
                </div>
            </div>
        </div>
    </div>
    <!-- /CONTACT -->
<?php endif; ?>
