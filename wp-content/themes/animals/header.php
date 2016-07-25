 <?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Animals
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>		

					<div id="header">
                    	<div class="shaper"></div>
                    	<div class="container">
                        	<div class="handler">
                                <div class="header-inner">
                                    <div class="logo">
                                        <a href="<?php echo home_url('/'); ?>">
                                                <h1><?php bloginfo('name'); ?></h1>
                                        </a>
                                            <p><?php bloginfo('description'); ?></p>
                                    </div><!--logo-->					                  
                                    <div class="toggle">
                                        <a class="toggleMenu" href="#"><?php _e('Menu','animals'); ?></a>
                                    </div> 						
                                    <div class="main-nav">
                                        <?php wp_nav_menu( array('theme_location'  => 'primary') ); ?>							
                                    </div>
                                    <div class="clear"></div>			
                                </div><!--header-inner-->
                             </div><!--handler-->
    					</div><!--container-->
					</div><!--header-->
		
		
<?php if ( is_home() || is_front_page() ) { ?>
    <div class="slider-main">
       <?php
			$slideimage = '';
			$slideimage = array(
					'1'	=>	get_template_directory_uri().'/images/slides/slider1.jpg',
					'2'	=>  get_template_directory_uri().'/images/slides/slider2.jpg',
					'3'	=>  get_template_directory_uri().'/images/slides/slider3.jpg',
			);
	   
			$slAr = array();
			$m = 0;
			for ($i=1; $i<4; $i++) {
				if ( get_theme_mod('slide_image'.$i, true) != "" ) {
					$imgSrc 	= esc_url(get_theme_mod('slide_image'.$i, $slideimage[$i]));
					$imgTitle	= esc_attr(get_theme_mod('slide_title'.$i, true));
					$imgDesc	= esc_attr(get_theme_mod('slide_desc'.$i, true));
					$imglink	= esc_url(get_theme_mod('slide_link'.$i, true));
					if ( strlen($imgSrc) > 10 ) {
						$slAr[$m]['image_src'] = esc_url(get_theme_mod('slide_image'.$i, $slideimage[$i]));
						$slAr[$m]['image_title'] = esc_attr(get_theme_mod('slide_title'.$i, true));
						$slAr[$m]['image_desc'] = esc_attr(get_theme_mod('slide_desc'.$i, true));
						$slAr[$m]['image_url'] = esc_url(get_theme_mod('slide_link'.$i, true));
						$m++;
					}
				}
				
			}
			$slideno = array();
			if( $slAr > 0 ){
				$n = 0;?>
                <div id="slider" class="nivoSlider">
                <?php 
                foreach( $slAr as $sv ){
                    $n++; ?><img src="<?php echo esc_url($sv['image_src']); ?>" alt="<?php echo esc_attr($sv['image_title']);?>" title="<?php if ( ($sv['image_title']!='') && ($sv['image_desc']!='')) { echo '#slidecaption'.$n ; } ?>"/><?php
                    $slideno[] = $n;
                }
                ?>
                </div><?php
                foreach( $slideno as $sln ){ ?>
                    <div id="slidecaption<?php echo $sln; ?>" class="nivo-html-caption">
                    <div class="top-bar">
                        <?php if( get_theme_mod('slide_title'.$sln, true) != '' ){ ?>
                            <h2><?php echo esc_attr(get_theme_mod('slide_title'.$sln, __('Slide Title ','animals').$sln)); ?></h2>
                        <?php } ?>
                        <?php if( get_theme_mod('slide_desc'.$sln, true) != '' ){ ?>
                            <p><?php echo esc_attr(get_theme_mod('slide_desc'.$sln, __('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vitae est at dolor auctor faucibus. Aenean hendrerit lorem eget nisi vulputate, vitae fringilla ligula dignissim. Phasellus feugiat quam efficitur Lorem ipsum dolor sit amet, consectetur adipiscing elit.','animals'))); ?></p>
                        <?php } ?>
						<?php if( get_theme_mod('slide_link'.$sln, true) != ''){ ?>
                        	<a class="read-more" href="<?php echo esc_url(get_theme_mod('slide_link'.$sln,'#')); ?>"><?php _e('Learn More','animals'); ?></a>
                        <?php } ?>
                    </div>
                    </div><?php 
                } ?>
                
                </div>
                <div class="clear"></div><?php 
			}
            ?>
        </div>
      </div><!-- slider -->
<?php } ?>


		<?php if ( is_home() || is_front_page() ) { ?>
		<div id="welcome">
        	<div class="wel-shaper"></div>
            	<div class="container">
                    <div class="wel-handler">
                        <div class="welcome-inner">
                            <div class="wel-left">
                            	<?php if( get_theme_mod('shpeone',true) != ''){ echo get_theme_mod('shpeone','<h2>Welcome to Pets Animals...</h2><p>Lorem ipsum dolor sit amo nsec tetuer adipiscing elit</p>'); }; ?>
                            </div><!--wel-left-->
                            
                            <div class="wel-right">
                            	<?php if( get_theme_mod('shapelink',true) != ''){ echo get_theme_mod('shapelink','<a href="'.esc_url(get_theme_mod('shapelink','#')).'">Choose Pets</a>'); }; ?>
                            </div><!--wel-right-->
                            <div class="clear"></div>
                        </div><!--welcome-inner-->
                     </div><!--wel-handler-->
                </div><!--container-->                           
        </div><!--welcome-->
		<?php } ?>

      <div class="main-container">
         <?php if( function_exists('is_woocommerce') && is_woocommerce() ) { ?>
		 	<div class="content-area">
                <div class="middle-align content_sidebar">
                	<div id="sitemain" class="site-main">
         <?php } ?>