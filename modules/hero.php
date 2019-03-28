<?php
  $logo = get_field('hero_logo', $postID);
  $logoSize = get_field('hero_logo_size', $postID);
  $content = get_field('hero_content', $postID);
  $overlay = get_field('hero_overlay', $postID);
  $images = get_field('hero_images', $postID);
  if($content || $images || $logo):
?>
  <header class="module-hero animate-parallax animate-z-normal<?php if($overlay) { echo ' module-hero-overlay'; } ?>">
    <?php if($images): ?>
      <div class="module-bg">
        <div class="hero-slides">
          <?php foreach($images as $image): ?>
            <div class="hero-slide" style="background-image: url(<?php echo $image['sizes']['jumbo']; ?>);"></div>
          <?php endforeach; ?>
        </div>
      </div>
    <?php
      endif;
      if($content):
    ?>
      <div class="hero-content">
        <?php if($logo): ?>
          <div class="hero-logo hero-logo-<?php echo $logoSize; ?>">
            <?php if($logoSize == 'small'): ?>
              <img src="<?php ex_logo('primary', 'light'); ?>" alt="Logo for <?php ex_brand(); ?>" />
            <?php else: ?>
              <img src="<?php ex_logo(); ?>" alt="Logo for <?php ex_brand(); ?>" />
            <?php endif; ?>
          </div>
        <?php
          endif;
          if($content):
        ?>
          <div class="hero-data"><?php echo $content; ?></div>
        <?php endif; ?>
      </div>
    <?php endif; ?>
  </header>
<?php endif; ?>
