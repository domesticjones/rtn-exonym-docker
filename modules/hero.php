<?php
  $logo = get_field('hero_logo');
  $content = get_field('hero_content');
  $overlay = get_field('hero_overlay');
  $images = get_field('hero_images');
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
          <div class="hero-logo">
            <img src="<?php ex_logo(); ?>" alt="Logo for <?php ex_brand(); ?>" />
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
