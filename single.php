<?php get_header(); ?>
	<main role="main" aria-label="Content">
    <?php $postID = get_option('page_for_posts'); include(locate_template('modules/hero.php', false, false )); ?>
		<?php if(have_posts()): while (have_posts()): the_post(); ?>
			<article class="blog-single page-content wrap">
        <section class="blog-single-wrap">
          <header>
            <?php the_post_thumbnail('large'); ?>
            <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
            <div class="blog-index-meta"><?php ex_post_meta(); ?></div>
          </header>
          <?php the_content(); ?>
        </section>
        </div>
			</article>
		<?php endwhile; endif; ?>
	</main>
<?php get_footer(); ?>
