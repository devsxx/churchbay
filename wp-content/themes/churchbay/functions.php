<?php

/***** Fetch Options *****/

$mh_magazine_lite_options = get_option('mh_magazine_lite_options');

/***** Custom Hooks *****/

function mh_html_class() {
    do_action('mh_html_class');
}
function mh_before_header() {
    do_action('mh_before_header');
}
function mh_after_header() {
    do_action('mh_after_header');
}
function mh_before_page_content() {
    do_action('mh_before_page_content');
}
function mh_before_post_content() {
    do_action('mh_before_post_content');
}
function mh_after_post_content() {
    do_action('mh_after_post_content');
}
function mh_post_header() {
    do_action('mh_post_header');
}
function mh_before_footer() {
    do_action('mh_before_footer');
}
function mh_after_footer() {
    do_action('mh_after_footer');
}
function mh_before_container_close() {
    do_action('mh_before_container_close');
}

/***** Enable Shortcodes inside Widgets	*****/

add_filter('widget_text', 'do_shortcode');

/***** Theme Setup *****/

if (!function_exists('mh_magazine_lite_setup')) {
	function mh_magazine_lite_setup() {
		load_theme_textdomain('mh-magazine-lite', get_template_directory() . '/languages');
		add_filter('use_default_gallery_style', '__return_false');
		add_theme_support('title-tag');
		add_theme_support('automatic-feed-links');
		add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));
		add_theme_support('post-thumbnails');
		add_theme_support('custom-background', array('default-color' => 'f7f7f7'));
		add_theme_support('custom-header', array('default-image' => '', 'default-text-color' => '000', 'width' => 1080, 'height' => 250, 'flex-width' => true, 'flex-height' => true));
		add_theme_support('custom-logo', array('width' => 300, 'height' => 100, 'flex-width' => true, 'flex-height' => true));
		add_theme_support('customize-selective-refresh-widgets');
		register_nav_menu('main_nav', esc_html__('Main Navigation', 'mh-magazine-lite'));
		add_editor_style();
	}
}
add_action('after_setup_theme', 'mh_magazine_lite_setup');

/***** Add Custom Image Sizes *****/

if (!function_exists('mh_magazine_lite_image_sizes')) {
	function mh_magazine_lite_image_sizes() {
		add_image_size('mh-magazine-lite-slider', 1030, 438, true);
		add_image_size('mh-magazine-lite-content', 678, 381, true);
		add_image_size('mh-magazine-lite-large', 678, 509, true);
		add_image_size('mh-magazine-lite-medium', 326, 245, true);
		add_image_size('mh-magazine-lite-small', 80, 60, true);
	}
}
add_action('after_setup_theme', 'mh_magazine_lite_image_sizes');

/***** Set Content Width *****/

if (!function_exists('mh_magazine_lite_content_width')) {
	function mh_magazine_lite_content_width() {
		global $content_width;
		if (!isset($content_width)) {
			$content_width = 678;
		}
	}
}
add_action('template_redirect', 'mh_magazine_lite_content_width');

/***** Load CSS & JavaScript *****/

if (!function_exists('mh_magazine_lite_scripts')) {
	function mh_magazine_lite_scripts() {
		wp_enqueue_style('mh-google-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,700,600', array(), null);
		wp_enqueue_style('mh-magazine-lite', get_stylesheet_uri(), false, '2.3.9');
		wp_enqueue_style('mh-font-awesome', get_template_directory_uri() . '/includes/font-awesome.min.css', array(), null);
		wp_enqueue_script('mh-scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'));
		if (!is_admin()) {
			if (is_singular() && comments_open() && (get_option('thread_comments') == 1))
				wp_enqueue_script('comment-reply');
		}
	}
}
add_action('wp_enqueue_scripts', 'mh_magazine_lite_scripts');

if (!function_exists('mh_magazine_lite_admin_scripts')) {
	function mh_magazine_lite_admin_scripts($hook) {
		if ('appearance_page_magazine' === $hook || 'widgets.php' === $hook) {
			wp_enqueue_style('mh-admin', get_template_directory_uri() . '/admin/admin.css');
		}
	}
}
add_action('admin_enqueue_scripts', 'mh_magazine_lite_admin_scripts');

/***** Register Widget Areas / Sidebars	*****/

if (!function_exists('mh_magazine_lite_widgets_init')) {
	function mh_magazine_lite_widgets_init() {
		register_sidebar(array('name' => esc_html__('Sidebar', 'mh-magazine-lite'), 'id' => 'sidebar', 'description' => esc_html__('Widget area (sidebar left/right) on single posts, pages and archives.', 'mh-magazine-lite'), 'before_widget' => '<div id="%1$s" class="mh-widget %2$s">', 'after_widget' => '</div>', 'before_title' => '<h4 class="mh-widget-title"><span class="mh-widget-title-inner">', 'after_title' => '</span></h4>'));
		register_sidebar(array('name' => sprintf(esc_html_x('Home %d - Full Width', 'widget area name', 'mh-magazine-lite'), 1), 'id' => 'home-1', 'description' => esc_html__('Widget area on homepage.', 'mh-magazine-lite'), 'before_widget' => '<div id="%1$s" class="mh-widget mh-home-1 mh-home-wide %2$s">', 'after_widget' => '</div>', 'before_title' => '<h4 class="mh-widget-title"><span class="mh-widget-title-inner">', 'after_title' => '</span></h4>'));
		register_sidebar(array('name' => sprintf(esc_html_x('Home %d - 2/3 Width', 'widget area name', 'mh-magazine-lite'), 2), 'id' => 'home-2', 'description' => esc_html__('Widget area on homepage.', 'mh-magazine-lite'), 'before_widget' => '<div id="%1$s" class="mh-widget mh-home-2 mh-widget-col-2 %2$s">', 'after_widget' => '</div>', 'before_title' => '<h4 class="mh-widget-title"><span class="mh-widget-title-inner">', 'after_title' => '</span></h4>'));
		register_sidebar(array('name' => sprintf(esc_html_x('Home %d - 1/3 Width', 'widget area name', 'mh-magazine-lite'), 3), 'id' => 'home-3', 'description' => esc_html__('Widget area on homepage.', 'mh-magazine-lite'), 'before_widget' => '<div id="%1$s" class="mh-widget mh-home-3 %2$s">', 'after_widget' => '</div>', 'before_title' => '<h4 class="mh-widget-title"><span class="mh-widget-title-inner">', 'after_title' => '</span></h4>'));
		register_sidebar(array('name' => sprintf(esc_html_x('Home %d - 1/3 Width', 'widget area name', 'mh-magazine-lite'), 4), 'id' => 'home-4', 'description' => esc_html__('Widget area on homepage.', 'mh-magazine-lite'), 'before_widget' => '<div id="%1$s" class="mh-widget mh-home-4 %2$s">', 'after_widget' => '</div>', 'before_title' => '<h4 class="mh-widget-title"><span class="mh-widget-title-inner">', 'after_title' => '</span></h4>'));
		register_sidebar(array('name' => sprintf(esc_html_x('Home %d - 2/3 Width', 'widget area name', 'mh-magazine-lite'), 5), 'id' => 'home-5', 'description' => esc_html__('Widget area on homepage.', 'mh-magazine-lite'), 'before_widget' => '<div id="%1$s" class="mh-widget mh-home-5 mh-widget-col-2 %2$s">', 'after_widget' => '</div>', 'before_title' => '<h4 class="mh-widget-title"><span class="mh-widget-title-inner">', 'after_title' => '</span></h4>'));
		register_sidebar(array('name' => sprintf(esc_html_x('Home %d - 1/3 Width', 'widget area name', 'mh-magazine-lite'), 6), 'id' => 'home-6', 'description' => esc_html__('Widget area on homepage.', 'mh-magazine-lite'), 'before_widget' => '<div id="%1$s" class="mh-widget mh-home-6 %2$s">', 'after_widget' => '</div>', 'before_title' => '<h4 class="mh-widget-title"><span class="mh-widget-title-inner">', 'after_title' => '</span></h4>'));
		register_sidebar(array('name' => sprintf(esc_html_x('Posts %d - Advertisement', 'widget area name', 'mh-magazine-lite'), 1), 'id' => 'posts-1', 'description' => esc_html__('Widget area above single post content.', 'mh-magazine-lite'), 'before_widget' => '<div id="%1$s" class="mh-widget mh-posts-1 %2$s">', 'after_widget' => '</div>', 'before_title' => '<h4 class="mh-widget-title"><span class="mh-widget-title-inner">', 'after_title' => '</span></h4>'));
		register_sidebar(array('name' => sprintf(esc_html_x('Posts %d - Advertisement', 'widget area name', 'mh-magazine-lite'), 2), 'id' => 'posts-2', 'description' => esc_html__('Widget area below single post content.', 'mh-magazine-lite'), 'before_widget' => '<div id="%1$s" class="mh-widget mh-posts-2 %2$s">', 'after_widget' => '</div>', 'before_title' => '<h4 class="mh-widget-title"><span class="mh-widget-title-inner">', 'after_title' => '</span></h4>'));
		register_sidebar(array('name' => sprintf(esc_html_x('Footer %d - 1/4 Width', 'widget area name', 'mh-magazine-lite'), 1), 'id' => 'footer-1', 'description' => esc_html__('Widget area in footer.', 'mh-magazine-lite'), 'before_widget' => '<div id="%1$s" class="mh-footer-widget %2$s">', 'after_widget' => '</div>', 'before_title' => '<h6 class="mh-widget-title mh-footer-widget-title"><span class="mh-widget-title-inner mh-footer-widget-title-inner">', 'after_title' => '</span></h6>'));
		register_sidebar(array('name' => sprintf(esc_html_x('Footer %d - 1/4 Width', 'widget area name', 'mh-magazine-lite'), 2), 'id' => 'footer-2', 'description' => esc_html__('Widget area in footer.', 'mh-magazine-lite'), 'before_widget' => '<div id="%1$s" class="mh-footer-widget %2$s">', 'after_widget' => '</div>', 'before_title' => '<h6 class="mh-widget-title mh-footer-widget-title"><span class="mh-widget-title-inner mh-footer-widget-title-inner">', 'after_title' => '</span></h6>'));
		register_sidebar(array('name' => sprintf(esc_html_x('Footer %d - 1/4 Width', 'widget area name', 'mh-magazine-lite'), 3), 'id' => 'footer-3', 'description' => esc_html__('Widget area in footer.', 'mh-magazine-lite'), 'before_widget' => '<div id="%1$s" class="mh-footer-widget %2$s">', 'after_widget' => '</div>', 'before_title' => '<h6 class="mh-widget-title mh-footer-widget-title"><span class="mh-widget-title-inner mh-footer-widget-title-inner">', 'after_title' => '</span></h6>'));
		register_sidebar(array('name' => sprintf(esc_html_x('Footer %d - 1/4 Width', 'widget area name', 'mh-magazine-lite'), 4), 'id' => 'footer-4', 'description' => esc_html__('Widget area in footer.', 'mh-magazine-lite'), 'before_widget' => '<div id="%1$s" class="mh-footer-widget %2$s">', 'after_widget' => '</div>', 'before_title' => '<h6 class="mh-widget-title mh-footer-widget-title"><span class="mh-widget-title-inner mh-footer-widget-title-inner">', 'after_title' => '</span></h6>'));
	}
}
add_action('widgets_init', 'mh_magazine_lite_widgets_init');

/***** Include Several Functions *****/

if (is_admin()) {
	require_once('admin/admin.php');
}

require_once('includes/mh-customizer.php');
require_once('includes/mh-widgets.php');
require_once('includes/mh-custom-functions.php');

/***** Add Support for WooCommerce *****/

include_once(ABSPATH . 'wp-admin/includes/plugin.php');

if (is_plugin_active('woocommerce/woocommerce.php')) {
	require_once('woocommerce/mh-custom-woocommerce.php');
}

add_filter('show_admin_bar', '__return_false');


// Takes the $charge_response as a parameter so you can pull information from the charge
// For charge response info see: https://stripe.com/docs/api#charge_object
function sc_after_charge_example( $charge_response ) {



    $charge_response = $charge_response->__toArray(TRUE);
    global $sc_options;

    $key = '';

    // Check first if in live or test mode.
    if ( $sc_options->get_setting_value( 'enable_live_key' ) == 1 && $test_mode != 'true' ) {
      if ( ! ( null === $sc_options->get_setting_value( 'live_secret_key_temp' ) ) ) {
      $key = $sc_options->get_setting_value( 'live_secret_key_temp' );
        } else {
      $key = $sc_options->get_setting_value( 'live_secret_key' );
      }
    } else {
      if ( ! ( null === $sc_options->get_setting_value( 'test_secret_key_temp' ) ) ) {
      $key = $sc_options->get_setting_value( 'test_secret_key_temp' );
        } else {
      $key = $sc_options->get_setting_value( 'test_secret_key' );
      }
    }

    \Stripe\Stripe::setApiKey( $key );
    $charge_response = \Stripe\Customer::retrieve( $charge_response['customer'] );

    /**
     * [$charge_response Charge details]
     */
    $charge_response = $charge_response->__toArray(TRUE);

    $post = get_post();
    $getPost = get_metadata('post', $post->ID, $key='', $single=false);

    update_post_meta($post->ID, 'adverts_stripe_id', $charge_response['id']);

    /**
     * Buyers details
     */
    $buyersEmail = $charge_response['email'];
    $buyersName = $charge_response['sources']['data'][0]['name'];
    $buyersAddress= $charge_response['sources']['data'][0]['address_line1'] . ', ' .$charge_response['sources']['data'][0]['address_city'] . ', ' .$charge_response['sources']['data'][0]['address_zip'];

    /**
     * Sellers details
     */
    $sellersName = $getPost['adverts_person'][0];
    $sellersEmail = $getPost['adverts_email'][0];
    $sellersPhone = null;
    if(isset($getPost['adverts_phone'][0])) {
      $sellersPhone = $getPost['adverts_phone'][0];
    }

    /**
     * Post details
     */
    $item = $post->item;
    $adLink = $post->guid;

    add_filter( 'wp_mail_content_type', function( $content_type ) {
      return 'text/html';
    });

    /**
     * Send a notification email to the seller
     */
    $html_sellers_email  = '<p>Congratulations!</p>';
    $html_sellers_email .= '<p>Your item <b>' . $item . '</b> has been sold and the donation has been made to the Church.</p>';
    $html_sellers_email .= '<p>Please contact the buyer <i>' . $buyersName . '</i> to arrange collection.<br />';

    $html_sellers_email .= '<p><b>Buyers contact email:</b> <a href="mailto:'.$buyersEmail.'">'.$buyersEmail.'</a><br />';
    $html_sellers_email .= '<p><b>Buyers address:</b> ' . $buyersAddress . '</p>';

    $html_sellers_email .= '<p>Now that you item has been sold, you can now login to your account and delete the advert. To login in to your account click the "Manage My Ads" from the main menu.</p>';
    $html_sellers_email .= '<p>Your ad: ' . $adLink . '</p>';
    $html_sellers_email .= '<p>Thank you for supporting our Church!</p>';

    wp_mail( $sellersEmail, 'Hurrah! Your item has been sold', $html_sellers_email );

    /**
     * Send a notification email to the buyer
     */
    $html_buyers_email  = '<p>Congratulations!</p>';
    $html_buyers_email .= '<p>You have usccessfully purchased the item <b>' . $item . '</b> and your donation has been made to the Church.</p>';
    $html_buyers_email .= '<p>Please contact the seller <i>' . $sellersName . '</i> to arrange collection.<br />';

    $html_buyers_email .= '<p><b>Sellers contact email:</b> <a href="mailto:'.$sellersEmail.'">'.$sellersEmail.'</a><br />';
    if(!empty($sellersPhone)) {
      $html_buyers_email .= '<b>Sellers contact Phone:</b> <a href="tel:'.$sellersPhone.'">'.$sellersPhone.'</a></p>';
    }
    $html_buyers_email .= '<p>Thank you for supporting our Church!</p>';

    wp_mail( $buyersEmail, 'You have successfully purchased and item', $html_buyers_email );

    /* Buyer details */
    $html = '<div class="sc-payment-details-wrap">';
    $html .= '<h4>You have purchased this item!</h4>';
    $html .= '<p>Thanks for purchasing this item, and email has been sent to seller notifiying them of the purchase.</p>';
    $html .= '<p>Please contact the seller <b>'.$sellersName.'</b> to arrange collection<br />';
    $html .= '<p><b>Sellers Contact Email:</b> <a href="mailto:'.$sellersEmail.'">'.$sellersEmail.'</a><br />';
    if(!empty($sellersPhone)) {
      $html .= '<b>Sellers contact Phone:</b> <a href="tel:'.$sellersPhone.'">'.$sellersPhone.'</a></p>';
    }
    $html .='</div>';
    echo $html;

}
add_action( 'sc_after_charge', 'sc_after_charge_example' );


add_action( 'show_user_profile', 'add_extra_social_links' );
add_action( 'edit_user_profile', 'add_extra_social_links' );

function add_extra_social_links( $user )
{
    ?>
        <h3>User Address</h3>

        <table class="form-table">
            <tr>
                <th><label for="address1">Address 1</label></th>
                <td><input type="text" name="address1" value="<?php echo esc_attr(get_the_author_meta( 'address1', $user->ID )); ?>" class="regular-text" /></td>
            </tr>

            <tr>
                <th><label for="address2">Address 2</label></th>
                <td><input type="text" name="address2" value="<?php echo esc_attr(get_the_author_meta( 'address2', $user->ID )); ?>" class="regular-text" /></td>
            </tr>

            <tr>
                <th><label for="postcode">Postcode</label></th>
                <td><input type="text" name="postcode" value="<?php echo esc_attr(get_the_author_meta( 'postcode', $user->ID )); ?>" class="regular-text" /></td>
            </tr>
        </table>
    <?php
}

// add_action( 'personal_options_update', 'save_address' );
// add_action( 'edit_user_profile_update', 'save_address' );
//
// function save_address( $user_id )
// {
//     update_user_meta( $user_id,'address1', 'x');
//     update_user_meta( $user_id,'address2', 'x');
//     update_user_meta( $user_id,'postcode', 'x');
// }

?>
