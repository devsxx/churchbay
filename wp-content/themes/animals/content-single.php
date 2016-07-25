<?php
/**
 * @package Animals
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('single-post'); ?>>

    <header class="entry-header">
        <h1 class="entry-title"><?php the_title(); ?></h1>
    </header><!-- .entry-header -->

    <div class="entry-content">
        <div class="postmeta">
                	<div class="post-date"><i class="fa fa-user"></i> <?php _e('By','animals'); ?> <?php echo get_the_author(); ?></div><!-- post-date -->  |
                    <div class="post-date"><i class="fa fa-calendar"></i> <?php echo get_the_date(); ?></div><!-- post-date -->
                    <div class="post-comment"> | <i class="fa fa-comments"></i> <a href="<?php comments_link(); ?>"><?php comments_number(); ?></a></div>
                    <div class="post-categories"> | <i class="fa fa-sitemap"></i> <?php the_category( __( ', ', 'animals' )); ?></div>
                    <div class="clear"></div>
                </div><!-- postmeta -->
		<?php 
        if (has_post_thumbnail() ){
			echo '<div class="post-thumb">';
            the_post_thumbnail();
			echo '</div><br />';
		}
        ?>
        <?php the_content(); ?>
        <?php
        wp_link_pages( array(
            'before' => '<div class="page-links">' . __( 'Pages:', 'animals' ),
            'after'  => '</div>',
        ) );
        ?>
        <div class="postmeta">
            <div class="post-categories"><?php the_category( __( ', ', 'animals' )); ?></div>
            <div class="post-tags"><?php the_tags(' | Tags: ', ', ', '<br />'); ?> </div>
            <div class="clear"></div>
        </div><!-- postmeta -->
    </div><!-- .entry-content -->
   
    <footer class="entry-meta">
        <?php edit_post_link( __( 'Edit', 'animals' ), '<span class="edit-link">', '</span>' ); ?>
    </footer><!-- .entry-meta -->

</article>