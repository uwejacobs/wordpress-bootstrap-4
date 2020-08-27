<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 */

?>
<?php if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- #content -->
    <?php get_template_part( 'footer-widget' ); ?>
	<footer id="colophon" class="site-footer <?php echo esc_attr(wp_bt_bg_class()); ?>" role="contentinfo">
		<div class="container pt-3 pb-3">
            <div class="site-info">
                &copy; <?php echo esc_html(date('Y')); ?> <?php echo '<a href="'.esc_url(home_url()).'">'.esc_html(get_bloginfo('name')).'</a>'; ?>
                <span class="sep"> | </span>
                <a class="credits" href="https://github.com/uwejacobs/wp-bootstrap-4-essentials" target="_blank" title="WordPress Technical Support"><?php echo esc_html__('Bootstrap WordPress Essentials Theme','wp-bootstrap-4-essentials'); ?></a>

            </div><!-- close .site-info -->
		</div>
	</footer><!-- #colophon -->
<?php endif; ?>
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
