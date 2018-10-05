<?php

function portfolio_item( $id ) {
  ob_start(); ?>

  <div>
    <div class="aspect-16/9" style="background-image: url('<?php the_field( 'tb_project_featured_img', $id ); ?>');"></div>
    <div>
      <p><?php echo get_main_category( $id, 'project-type' ); ?></p>
      <h3><?php echo get_the_title( $id ); ?></h3>
    </div>
  </div>

  <?php return ob_get_clean();
}