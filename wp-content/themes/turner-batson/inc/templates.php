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

function testimonial_item( $id ) {
  ob_start(); ?>
  <li class="testimonial-wrap my-8">
    <figure class="testimonial-item">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 26" class="w-8 mb-4">
        <path fill="#DA291C" fill-rule="evenodd" d="M19 25.5c0-1.042-.024-2.596-.073-4.663a214.7 214.7 0 0 1-.073-4.566c0-1.92.056-3.572.17-4.956.114-1.383.367-2.799.757-4.248.39-1.448.928-2.62 1.612-3.515.683-.895 1.61-1.628 2.783-2.198C25.348.784 26.747.5 28.375.5L31.5 6.75c-2.246 0-3.85.488-4.81 1.465-.96.976-1.44 2.571-1.44 4.785h6.25v12.5H19zm-18.75 0c0-1.042-.024-2.596-.073-4.663a214.7 214.7 0 0 1-.073-4.566c0-1.92.056-3.572.17-4.956.114-1.383.367-2.799.757-4.248.39-1.448.928-2.62 1.612-3.515.683-.895 1.61-1.628 2.783-2.198C6.598.784 7.997.5 9.625.5l3.125 6.25c-2.246 0-3.85.488-4.81 1.465C6.98 9.19 6.5 10.786 6.5 13h6.25v12.5H.25z"/>
      </svg>
      <blockquote class="leading-normal lg:text-md mb-4"><?php echo get_the_content( $id ); ?></blockquote>
      <footer>
        <cite class="leading-normal font-bold text-sm uppercase"><?php echo get_the_title(); ?></cite>
      </footer>
    </figure>
  </li>

  <?php return ob_get_clean();
}

function job_content() {
  $tb_careers = new WP_Query( array(
    'post_type' => 'career',
    'post_status' => 'publish',
    'posts_per_page' => 50,
    'no_found_rows' => true,
    'update_post_meta_cache' => false,
    'update_post_term_cache' => false,
  ) );

  ob_start(); ?>
  
  <div>
    <h3 class="uppercase text-2xl mb-6"><?php the_field( 'tb_career_heading', 'options' ); ?></h3>
    <div class="leading-normal text-md mb-8"><?php the_field( 'tb_career_description', 'options' ); ?></div>
    <?php if ( $tb_careers->have_posts() ) : ?>
      <ul class="list-reset flex flex-col md:flex-row md:flex-wrap md:justify-between">
        <?php while ( $tb_careers->have_posts() ) : $tb_careers->the_post(); ?>
            <li class="career-item bg-primary hover:bg-black text-white p-6 pt-8 mb-6 rounded">
              <h4 class="text-md pt-8"><?php the_title(); ?></h4>
              <p><a class="text-white" href="<?php the_field( 'tb_career_description_link', get_the_ID() ); ?>">View Full Description</a></p>
            </li>
        <?php endwhile; ?>
      </ul>
    <?php else : ?>
      <div><?php the_field( 'tb_career_no_careers_description', 'options' ); ?></div>
    <?php endif; ?>
  </div>

  <?php return ob_get_clean();
}