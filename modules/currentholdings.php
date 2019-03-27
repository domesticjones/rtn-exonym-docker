<?php
  the_sub_field('heading');
  $holdings = array_reverse(get_field('holdings', 'options'));
  if($holdings) {
    echo '<section class="holdings-wrap">';
      $firstColor = '';
      $percentTotal = 100;
      $holdingLegend = 1;
      $holdingPie = 1;
      echo '<ul class="holdings-legend">';
        foreach(array_reverse($holdings) as $holding) {
          echo '<li id="holding-legend-' . $holdingLegend . '"><span style="background-color: ' . $holding['color'] . ';"></span><div>' . $holding['name'] . '</div><small>(' . $holding['percent'] . '%)</small></li>';
          if($holdingLegend >= 1) {
            $firstColor = $holding['color'];
          }
          $holdingLegend++;
        }
        echo '<li class="holdings-date">Current holdings as of ' . get_field('holdings_updated', 'options') . '</li>';
      echo '</ul>';
      echo '<svg viewBox="0 0 32 32" class="holdings-pie" style="background-color: ' . $firstColor . '">';
        foreach($holdings as $holding) {
          echo '<circle data-index="holding-legend-' . $holdingPie . '" stroke-dasharray="' . $percentTotal . ' 100" stroke="' . $holding['color'] . '"></circle>';
          $percentTotal = $percentTotal - $holding['percent'];
          $holdingPie++;
        }
      echo '</svg>';
    echo '</div>';
  } else {
    '<p style="text-align: center;"><em>Holdings data unavailable.</em></p>';
  }
?>
