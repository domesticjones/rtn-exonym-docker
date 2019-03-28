<?php
  the_sub_field('heading');
  if(have_rows('steps')):
    $number = 1;
?>
<ol class="steps-list">
  <?php while(have_rows('steps')): the_row(); ?>
    <li>
      <h2 class="step-number"><?php echo $number; ?></h2>
      <div class="step-data"><?php the_sub_field('step'); ?></div>
    </li>
  <?php $number++; endwhile; ?>
</ol>
<?php endif; ?>
