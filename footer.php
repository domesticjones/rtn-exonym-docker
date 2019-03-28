<?php
	$footerImages = get_field('footer_images', 'options');
	$footerImage = array_rand($footerImages, 1);
?>
			<footer id="footer-nav" class="animate-parallax animate-z-subtle">
				<div class="module-bg"<?php if($footerImages) { echo ' style="background-image: url(' . $footerImages[$footerImage]['sizes']['jumbo'] . ')"'; } ?>></div>
				<div class="wrap">
					<a href="<?php echo home_url(); ?>">
						<img src="<?php ex_logo('primary', 'light'); ?>" class="logo-footer" alt="Logo for <?php ex_brand(); ?>" />
					</a>
					<nav class="nav-footer" role="navigation">
						<?php wp_nav_menu(array(
							'container' => 'ul',                    // enter '' to remove nav container
							'container_class' => 'footer-links',		// class of container (should you choose to use it)
							'menu' => __('Footer', 'exonym'),	      // nav name
							'menu_class' => 'nav footer-nav cf',    // adding custom nav class
							'theme_location' => 'footer-menu',		  // where it's located in the theme
							'before' => '',							            // before the menu
							'after' => '',							            // after the menu
							'link_before' => '',					          // before each link
							'link_after' => '',						          // after each link
							'depth' => 1,							              // limit the depth of the nav
							'fallback_cb' => ''						          // fallback function
						)); ?>
					</nav>
				</div>
			</footer>
			<footer id="footer" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">
				<div class="wrap">
					<div class="footer-left">
						<?php get_template_part('modules/quotes'); ?>
					</div>
					<img src="<?php echo ex_logo('alternate', 'light'); ?>" alt="Emblem for <?php ex_brand(); ?>" class="emblem-footer" />
					<div class="footer-right">
						<p class="copyright">&copy; Copyright <?php ex_brand('legal'); ?></p>
						<a href="<?php echo esc_url(get_permalink(get_option('wp_page_for_privacy_policy'))); ?>">Privacy Policy</a>
					</div>
				</div>
			</footer>
			<nav id="responsive-nav">
				<a href="<?php echo home_url(); ?>">
					<img src="<?php ex_logo('primary', 'light'); ?>" class="logo-responsive" />
				</a>
				<?php wp_nav_menu(array(
					'container' => 'ul',                    // enter '' to remove nav container
					'menu' => __('Responsive', 'exonym'),	  // nav name
					'theme_location' => 'responsive-menu',	// where it's located in the theme
					'before' => '',							            // before the menu
					'after' => '',							            // after the menu
					'link_before' => '',					          // before each link
					'link_after' => '',						          // after each link
					'depth' => 1,							              // limit the depth of the nav
					'fallback_cb' => ''						          // fallback function
				)); ?>
			</nav>
		</div>
		<?php wp_footer(); ?>
	</body>
</html>
