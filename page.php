<?php get_header(); ?>
	<main role="main" aria-label="Content">
		<?php get_template_part('modules/hero'); ?>
		<?php if(have_posts()): while (have_posts()): the_post(); ?>
			<article class="page-content wrap">
				<?php
					if(have_rows('content_blocks')) {
						while(have_rows('content_blocks')) {
							the_row();
							echo '<section class="module-' . get_row_layout() . '">';
								if(get_row_layout() == 'icon_list') {
									get_template_part('modules/iconlist');
								}
							echo '</section>';
						}
					}
				?>
			</article>
		<?php endwhile; endif; ?>
	</main>
<?php get_footer(); ?>
