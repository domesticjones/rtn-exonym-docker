<?php get_header(); ?>
	<main role="main" aria-label="Content">
    <?php $postID = get_option('page_for_posts'); include(locate_template('modules/hero.php', false, false )); ?>
		<?php if(have_posts()): while (have_posts()): the_post(); ?>
			<article class="blog-index-single page-content wrap">
        <section class="blog-index-single-wrap">
  				<a href="<?php the_permalink(); ?>" class="blog-index-image">
            <?php if(has_post_thumbnail()): ?>
              <?php the_post_thumbnail('thumbnail-medium'); ?>
            <?php else: ?>
              <img src="<?php ex_logo('alternate', 'dark'); ?>" class="blog-index-logo" />
            <?php endif; ?>
          </a>
          <div class="blog-index-data">
            <header>
              <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
              <div class="blog-index-meta"><?php ex_post_meta(); ?></div>
            </header>
            <?php the_excerpt(); ?>
          </div>
        </section>
			</article>
		<?php endwhile; endif; ?>
	</main>
<?php get_footer(); ?>
