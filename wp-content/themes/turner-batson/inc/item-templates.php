<?php

function portfolio_item( $id ) {
  ob_start(); ?>

  <div class="portfolio-item mb-8 relative">
    <a class="text-black" href="<?php echo get_the_permalink( $id ); ?>">
      <div class="aspect-16:9 bg-cover bg-no-repeat bg-center" style="background-image: url('<?php the_field( 'tb_project_featured_img', $id ); ?>');"></div>
      <div class="portfolio-overlay mt-4 lg:mt-0 lg:absolute lg:opacity-0">
        <div class="pl-4 border-l-4 border-primary py-2 lg:absolute lg:pin-b lg:pin-l lg:mb-8 lg:mx-8">
          <p class="text-sm lg:text-base pb-2"><?php echo get_main_category( $id, 'project-type' ); ?></p>
          <h3 class="font-bold uppercase text-base lg:text-lg"><?php echo get_the_title( $id ); ?></h3>
        </div>
      </div>
    </a>
  </div>

  <?php return ob_get_clean();
}