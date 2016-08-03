<!DOCTYPE html>
<html class="no-js<?php mh_html_class(); ?>" <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link href='https://fonts.googleapis.com/css?family=Raleway|Noto+Serif|Varela+Round' rel='stylesheet' type='text/css'>
<?php wp_head(); ?>
<link href='<?php echo get_stylesheet_directory_uri(); ?>/wp-adverts/style-overrides.css' rel='stylesheet' type='text/css'>
</head>
<body id="mh-mobile" <?php body_class(); ?>>
<?php mh_before_header();
get_template_part('content', 'header');
mh_after_header(); ?>
