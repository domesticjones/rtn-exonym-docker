<?php get_header(); ?>
	<main role="main" aria-label="Content">
		<?php if(have_posts()): while (have_posts()): the_post(); ?>
			<?php $postID = $post->ID; include(locate_template('modules/hero.php', false, false )); ?>
			<article class="page-content wrap">
				<?php
					if(have_rows('content_blocks')) {
						while(have_rows('content_blocks')) {
							the_row();
							echo '<section class="module module-' . get_row_layout() . '">';
								if(get_row_layout() == 'call_to_action') {
									get_template_part('modules/ctas');
								} elseif(get_row_layout() == 'current_holdings') {
									get_template_part('modules/currentholdings');
								} elseif(get_row_layout() == 'icon_list') {
									get_template_part('modules/iconlist');
								} elseif(get_row_layout() == 'process') {
									get_template_part('modules/process');
								} elseif(get_row_layout() == 'single_column') {
									get_template_part('modules/singlecolumn');
								} elseif(get_row_layout() == 'two_column') {
									get_template_part('modules/twocolumn');
								}
							echo '</section>';
						}
					}
				?>
			</article>
		<?php endwhile; endif; ?>
	</main>
<?php get_footer(); ?>
