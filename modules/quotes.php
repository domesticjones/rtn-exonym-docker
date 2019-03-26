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
