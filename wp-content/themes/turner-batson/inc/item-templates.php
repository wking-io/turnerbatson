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

function team_item( $id, $i ) {
  $is_right = ( $i % 2 === 0 ) ? true : false;
  ob_start(); ?>

  <div class="team-item relative md:hidden" id="team-member-<?php echo $id ?>a" data-drawer-wrapper data-drawer-expanded="false">
    <div data-drawer-full>
      <div data-drawer-visible>
        <div class="team-headshot aspect-5:3 bg-no-repeat" style="background-image: url('<?php the_field( 'tb_team_headshot', $id ); ?>'), radial-gradient(at bottom, #FFFFFF, #EAEAEA, #C6C6C6);"></div>
        <div class="relative py-4 flex items-start">
          <div class="flex-1">
            <h3 class="uppercase text-bold mb-1"><?php echo get_the_title( $id ); ?></h3>
            <p><?php the_field( 'tb_team_role', $id ); ?></p>
          </div>
          <button class="button-link-primary lg:hidden" data-drawer-action data-open-text="View Bio" data-close-text="Hide Bio" aria-expanded="false" aria-controls="team-member-<?php echo $id ?>a">View Bio</button>
        </div>
      </div>
      <div class="team-bio pb-4 md:pb-0">
        <button class="team-bio-close" data-drawer-action aria-expanded="false" aria-controls="team-member-<?php echo $id ?>a"><span></span><span></span></button>
        <h3 class="hidden md:block"><?php echo get_the_title( $id ); ?></h3>
        <h4 class="hidden md:block"><?php the_field( 'tb_team_role', $id ); ?></h4>
        <div class="">
          <?php echo get_the_content( $id ); ?>
        </div>
      </div>
    </div>
  </div>

  <div class="team-item<?php echo $is_right ? ' team-item--right' : ''; ?> relative hidden md:block lg:mb-8" id="team-member-<?php echo $id ?>b" data-drawer-wrapper data-drawer-special data-drawer-expanded="false">
      <div class="team-headshot aspect-5:3 lg:aspect-16:9 bg-no-repeat" style="background-image: url('<?php the_field( 'tb_team_headshot', $id ); ?>'), radial-gradient(at bottom, #FFFFFF, #EAEAEA, #C6C6C6);"></div>
      <div class="relative py-4 flex items-start lg:absolute lg:pin">
        <div class="flex-1 lg:flex lg:flex-row lg:justify-between lg:absolute lg:pin-b lg:pin-l lg:pin-r lg:px-3 lg:pb-3">
          <h3 class="uppercase text-bold mb-1 lg:mb-0 lg:leading-none"><?php echo get_the_title( $id ); ?></h3>
          <p class="lg:mb-0 lg:leading-none"><?php the_field( 'tb_team_role', $id ); ?></p>
        </div>
        <button class="button-link-primary lg:hidden" data-drawer-action-special aria-expanded="false" aria-controls="team-member-<?php echo $id ?>b">View Bio</button>
        <div class="team-overlay absolute pin lg:opacity-0 hidden lg:flex lg:justify-center lg:items-center">
          <button class="button-outline-primary" data-drawer-action-special aria-expanded="false" aria-controls="team-member-<?php echo $id ?>b">View Bio</button>
        </div>
    </div>
    <div class="team-bio pb-4 md:pb-0">
      <button class="team-bio-close" data-drawer-action-special aria-expanded="false" aria-controls="team-member-<?php echo $id ?>b"><span></span><span></span></button>
      <h3 class="hidden md:block mb-1"><?php echo get_the_title( $id ); ?></h3>
      <h4 class="hidden md:block mb-4"><?php the_field( 'tb_team_role', $id ); ?></h4>
      <div class="">
        <?php echo get_the_content( $id ); ?>
      </div>
    </div>
  </div>

  <?php return ob_get_clean();
}

function news_item( $id, $is_featured = false ) {
  ob_start(); ?>

  <div class="news-item mb-8 relative<?php echo $is_featured ? ' lg:mb-0' : ''; ?>">
    <a class="text-black no-underline" href="<?php echo get_the_permalink( $id ); ?>">
      <div class="news-img <?php echo $is_featured ? '' : 'aspect-16:9'; ?> bg-cover bg-no-repeat bg-center" style="background-image: url('<?php echo get_the_post_thumbnail_url( $id, 'medium-large' ); ?>');"></div>
      <div class="news-overlay px-4 relative z-20 -mt-8 lg:mt-0 lg:absolute lg:pin">
        <div class="pl-4 border-l-4 border-primary py-2 lg:absolute lg:pin-b lg:pin-x lg:mb-8 lg:mx-8">
          <div class="news-spacer h-12 lg:h-6"></div>
          <h3 class="news-heading font-bold pb-2 text-base lg:text-md"><?php echo get_the_title( $id ); ?></h3>
          <p class="news-date text-sm lg:text-base"><?php echo get_the_date( 'F j, Y', $id ) . ' - ' . get_the_author() ?></p>
        </div>
      </div>
    </a>
  </div>

  <?php return ob_get_clean();
}