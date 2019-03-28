<?php
  the_sub_field('heading');
  if(have_rows('call_to_actions')):
?>
  <ul class="ctas-list">
    <?php while(have_rows('call_to_actions')): the_row(); ?>
      <li>
        <?php
          $type = get_sub_field('type');
          $icon = get_sub_field('icon');
          $file = get_sub_field('file');
          $link = get_sub_field('link');
          $url = $link['url'];
          $title = $link['title'];
          $target = $link['target'];
          $meta = parse_url($url)['host'];
          if($type == 'file') {
            $url = $file['url'];
            $title = $file['title'];
            $target = '_blank';
            $meta = fileSizeDisplay($file['filesize']) . ' &bull; ' . pathinfo($file['filename'], PATHINFO_EXTENSION);
          }
        ?>
        <a href="<?php echo $url; ?>" target="<?php echo $target; ?>" class="cta-single">
          <?php if($icon) { echo '<img src="' . $icon['sizes']['small'] . '" alt="' . $icon['alt'] . '" />'; } ?>
          <span><?php echo $title; ?><small><?php echo $meta; ?></small></span>
        </a>
      </li>
    <?php endwhile; ?>
  </ul>
<?php endif; ?>
