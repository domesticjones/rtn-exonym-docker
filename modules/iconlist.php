<?php if(have_rows('list_items')): ?>
  <ul class="iconlist-list">
    <?php
      while(have_rows('list_items')):
      the_row();
      $icon = get_sub_field('icon');
      $heading = get_sub_field('heading');
      $content = get_sub_field('content');
    ?>
      <li>
        <div class="iconlist-content">
          <?php if($heading) { echo '<div class="heading">' . $heading . '</div>'; } ?>
          <?php if($content) { echo '<div class="content">' . $content . '</div>'; } ?>
        </div>
        <div class="iconlist-icon">
          <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>" />
        </div>
      </li>
    <?php endwhile; ?>
  </ul>
<?php endif; ?>
