<?php
/*
=====================================
  [[[ Admin & Login Customization ]]]
=====================================
*/

// Admin footer attribution
function remove_footer_admin() {
  echo '<span id="footer-thankyou">Exstructae : <a href="http://domesticjones.com" target="_blank">Exonym</a></span>';
}
add_filter('admin_footer_text', 'remove_footer_admin');

// Kill the admin bar on the front-end
add_filter('show_admin_bar', '__return_false');

// Custom Login Logo
function custom_login_logo() { ?>
  <style type="text/css">
    #login h1 a,
    .login h1 a {
      background-image: url(<?php echo ex_logo('alternate', 'dark'); ?>);
    }
  </style>
<?php }
add_action('login_enqueue_scripts', 'custom_login_logo');

// Enable SVG upload in admin
function wpcontent_svg_mime_type($mimes = array()) {
  $mimes['svg']  = 'image/svg+xml';
  $mimes['svgz'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'wpcontent_svg_mime_type');

// Allow Editors to edit Menus
$roleObject = get_role( 'editor' );
if (!$roleObject->has_cap('edit_theme_options')) {
  $roleObject->add_cap('edit_theme_options');
}

// Website Options & Current Holdings
if(function_exists('acf_add_options_page')) {
	acf_add_options_page(array(
		'page_title' 	=> 'Website Options',
		'menu_title'	=> 'Website Options',
		'menu_slug' 	=> 'website-options',
		'capability'	=> 'edit_posts',
    'icon_url'    => 'dashicons-schedule',
    'position'    => 3
	));
	acf_add_options_page(array(
		'page_title' 	=> 'Current Holdings',
		'menu_title'	=> 'Current Holdings',
		'menu_slug' 	=> 'current-holdings',
		'capability'	=> 'edit_posts',
    'icon_url'    => 'dashicons-chart-pie',
    'position'    => 3
	));
}

// Admin Custom CSS
add_action('admin_head', 'exonym_custom_fonts');
function exonym_custom_fonts() {
  echo '<style>
    .image-wrap img {
      background-image: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz48c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkxheWVyXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IiB2aWV3Qm94PSIwIDAgMTAgMTAiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDEwIDEwOyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+PHN0eWxlIHR5cGU9InRleHQvY3NzIj4uc3Qwe29wYWNpdHk6MC4xO308L3N0eWxlPjxyZWN0IGNsYXNzPSJzdDAiIHdpZHRoPSI1IiBoZWlnaHQ9IjUiLz48cmVjdCB4PSI1IiB5PSI1IiBjbGFzcz0ic3QwIiB3aWR0aD0iNSIgaGVpZ2h0PSI1Ii8+PC9zdmc+) !important;
      background-size: 20px 20px !important;
      background-color: #666 !important;
    }
  </style>';
}
