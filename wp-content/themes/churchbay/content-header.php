<div class="mh-header-mobile-nav clearfix"></div>
<header class="mh-header">
	<div class="mh-container mh-container-inner mh-row clearfix">
		<?php mh_magazine_lite_custom_header(); ?>
	</div>
	<div class="mh-main-nav-wrap">
		<nav class="mh-navigation mh-main-nav mh-container mh-container-inner clearfix">
			<?php wp_nav_menu(array('theme_location' => 'main_nav')); ?>
			<?php if (is_user_logged_in()) : ?>
				<ul id="menu-menu-1" class="menu" style="float:right">
				<li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="<?php echo wp_logout_url(get_permalink()); ?>">Logout &#8594;</a></li>
			</ul>
		<?php else: ?>
			<ul id="menu-menu-1" class="menu" style="float:right">
			<li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="<?php echo wp_login_url(get_permalink()); ?>">Login &#8594;</a></li>
		</ul>
			<?php endif;?>
		</nav>
	</div>
</header>
