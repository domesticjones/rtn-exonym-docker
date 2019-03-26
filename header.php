<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title><?php wp_title(); ?></title>
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
		<div id="container">
      <header id="header" role="banner" itemscope itemtype="http://schema.org/WPHeader">
          <a href="<?php echo get_home_url(); ?>">
						<img src="<?php ex_logo('alternate', 'dark'); ?>" alt="Logo for <?php ex_brand(); ?>" class="logo-header" />
					</a>
					<?php
						$quoteQueryArgs = array(
							'post_type'              => array('quote'),
							'posts_per_page'         => '5',
							'orderby'                => 'rand',
						);
						$quoteQuery = new WP_Query($quoteQueryArgs);
						if($quoteQuery->have_posts()):
							echo '<ul class="quotes">';
							while($quoteQuery->have_posts()): $quoteQuery->the_post();
								echo '<li>';
									echo '<blockquote><q>' . get_field('quote') . '</q><cite>' . get_the_title() . '</cite></blockquote>';
								echo '</li>';
							endwhile;
							echo '</ul>';
						endif; wp_reset_postdata();
					?>
          <nav class="nav-header" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
            <?php wp_nav_menu(array(
              'container' => false,								// remove nav container
              'container_class' => '',						// class of container (should you choose to use it)
              'menu' => __('Header', 'exonym'),	  // nav name
              'menu_class' => '',									// adding custom nav class
              'theme_location' => 'header-menu',	// where it's located in the theme
              'before' => '',											// before the menu
              'after' => '',											// after the menu
              'link_before' => '',								// before each link
              'link_after' => '',									// after each link
              'depth' => 0,												// limit the depth of the nav
              'fallback_cb' => ''									// fallback function (if there is one)
            )); ?>
          </nav>
          <?php ex_social(); ?>
					<a href="#" id="responsive-nav-toggle">
	          <span class="line"></span>
	          <span class="line"></span>
	          <span class="line"></span>
					</a>
      </header>
