<?php
    wp_enqueue_style( 'adverts-frontend' );
    wp_enqueue_style( 'adverts-icons' );
    wp_enqueue_style( 'adverts-icons-animate' );
    wp_enqueue_script( 'adverts-frontend' );

    $stripe_id = get_post_meta( $post_id, "adverts_stripe_id", true);
?>

<?php do_action( "adverts_tpl_single_top", $post_id ) ?>
<div class="adverts-single-box">
    <div class="adverts-single-author">
        <div class="adverts-single-author-avatar">
            <?php echo get_avatar( get_post_meta($post_id, 'adverts_email', true), 48 ) ?>
        </div>
        <div class="adverts-single-author-name">
            <?php echo apply_filters( "adverts_tpl_single_posted_by", sprintf( __("by <strong>%s</strong>", "adverts"), get_post_meta($post_id, 'adverts_person', true) ), $post_id ) ?><br/>
            <?php printf( __('Published: %1$s (%2$s ago)', "adverts"), date_i18n( get_option( 'date_format' ), get_post_time( 'U', false, $post_id ) ), human_time_diff( get_post_time( 'U', false, $post_id ), current_time('timestamp') ) ) ?>
        </div>
    </div>

    <?php if( get_post_meta( $post_id, "adverts_price", true) ): ?>
    <div class="adverts-single-price" style="">
        <span class="adverts-price-box"><?php echo adverts_price_amount( get_post_meta( $post_id, "adverts_price", true) ) ?></span>
    </div>
    <?php endif; ?>
</div>

<div class="adverts-grid adverts-grid-closed-top adverts-grid-with-icons adverts-single-grid-details">
    <?php $advert_category = get_the_terms( $post_id, 'advert_category' ) ?>
    <?php if(!empty($advert_category)): ?>
    <div class="adverts-grid-row ">
        <div class="adverts-grid-col adverts-col-30">
            <span class="adverts-round-icon adverts-icon-tags"></span>
            <span class="adverts-row-title"><?php _e("Category", "adverts") ?></span>
        </div>
        <div class="adverts-grid-col adverts-col-65">
            <?php foreach($advert_category as $c): ?>
            <a href="<?php esc_attr_e( get_term_link( $c ) ) ?>"><?php echo join( " / ", advert_category_path( $c ) ) ?></a><br/>
            <?php endforeach; ?>
        </div>
    </div>

    <?php endif; ?>

    <?php if(get_post_meta( $post_id, "adverts_location", true )): ?>
    <div class="adverts-grid-row">
        <div class="adverts-grid-col adverts-col-30">
            <span class="adverts-round-icon adverts-icon-location"></span>
            <span class="adverts-row-title"><?php _e("Location", "adverts") ?></span>
        </div>
        <div class="adverts-grid-col adverts-col-65">
            <?php echo apply_filters( "adverts_tpl_single_location", esc_html( get_post_meta( $post_id, "adverts_location", true ) ), $post_id ) ?>
        </div>
    </div>
    <?php endif; ?>

    <?php do_action( "adverts_tpl_single_details", $post_id ) ?>
</div>

<div class="adverts-content">
    <?php echo $post_content ?>
</div>
<div class="clear">
<?php  do_action( "adverts_tpl_single_bottom", $post_id ) ?>
</div>
<br />
<?php

if($stripe_id) :
  ?>
<h2>SOLD</h2>
<p>Sorry. This item has now been sold. </p>
  <?php
else:
  if(@$action != "preview") : ?>
  <p>
    [stripe payment_button_label="BUY NOW FOR <?php echo adverts_price_amount( get_post_meta( $post_id, "adverts_price", true) ) ?>" amount="<?php echo adverts_price_stripe_amount( get_post_meta( $post_id, "adverts_price", true) ) ?>" ]
  </p>
  <p>Buying this item will donate <?php echo adverts_price_amount( get_post_meta( $post_id, "adverts_price", true) ) ?> to the Church</p>
  <?php endif;
endif; ?>
