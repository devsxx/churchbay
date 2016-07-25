<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Animals
 */
?>

        <div class="copyright-wrapper">
        	<div class="inner">
            	<div class="copyright">
                	<p><?php echo esc_attr(get_theme_mod('footer_copy',__('Animals 2016 | All Rights Reserved.','animals'))); ?> <?php echo animals_credit_link(); ?></p>
                </div><!-- copyright -->
                <div class="social-content">
                        <div class="social-icons">
                        	<?php if(get_theme_mod('social_fb',true) != '') { ?>
                        		<a title="facebook" class="fa fa-facebook fa-2x" target="_blank" href="<?php echo esc_url(get_theme_mod('social_fb','#')); ?>"></a>
                            <?php } ?>
                            <?php if(get_theme_mod('social_tw',true) != ''){ ?>
                                <a title="twitter" class="fa fa-twitter fa-2x" target="_blank" href="<?php echo esc_url(get_theme_mod('social_tw','#')); ?>"></a>
                            <?php } ?>
                            <?php if(get_theme_mod('social_linked',true) != '') { ?>
                                <a title="linkedin" class="fa fa-linkedin fa-2x" target="_blank" href="<?php echo esc_url(get_theme_mod('social_linked','#')); ?>"></a>
                            <?php } ?>
                            <?php if(get_theme_mod('social_pint',true) != '') { ?>
                                <a title="pinterest-p" class="fa fa-pinterest-p fa-2x" target="_blank" href="<?php echo esc_url(get_theme_mod('social_pint','#')); ?>"></a>
                            <?php } ?>
                            <?php if(get_theme_mod('social_ytube',true) != '') { ?>
                                <a title="skype" class="fa fa-youtube-play fa-2x" target="_blank" href="<?php echo esc_url(get_theme_mod('social_ytube','#')); ?>"></a></div>
                            <?php } ?>
                </div><!-- social-content -->
                <div class="clear"></div>         
            </div><!-- inner -->
        </div>
    </div>
<?php wp_footer(); ?>
</body>
</html>