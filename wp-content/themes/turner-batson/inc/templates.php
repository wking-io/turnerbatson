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

function team_item( $id ) {
  ob_start(); ?>

  <div class="team-item relative lg:mb-8" id="team-member-<?php echo $id ?>" data-drawer-wrapper data-drawer-special data-drawer-expanded="false">
    <div class="relative">
      <div class="team-headshot relative">
        <img class="team-headshot-img" src="<?php the_field( 'tb_team_headshot', $id ); ?>" alt="<?php echo get_the_title( $id ); ?> headshot" />
        <div class="team-headshot-overlay flex lg:absolute lg:pin pt-4 pb-6 lg:py-0">
          <div class="flex-1 lg:flex lg:flex-row lg:justify-between lg:absolute lg:pin-b lg:pin-l lg:pin-r lg:px-3 lg:pb-3">
            <h3 class="uppercase lg:text-white text-bold mb-1 lg:mb-0 lg:leading-none"><?php echo get_the_title( $id ); ?></h3>
            <p class="lg:mb-0 lg:text-white lg:leading-none"><?php the_field( 'tb_team_role', $id ); ?></p>
          </div>
          <button class="team-headshot-button button-link-primary lg:hidden" data-drawer-action-special aria-expanded="false" aria-controls="team-member-<?php echo $id ?>"><span class="show-when-closed">View Bio</span><span class="show-when-open">Close Bio</span></button>
        </div>
        <button class="team-headshot-button button-outline-light absolute pin-center hidden lg:inline-block" data-drawer-action-special aria-expanded="false" aria-controls="team-member-<?php echo $id ?>"><span class="show-when-closed">View Bio</span><span class="show-when-open">Close Bio</span></button>
      </div>
      <div class="team-bio opacity-0 flex flex-col lg:flex-row justify-between items-start lg:items-end">
        <div class="mr-8 flex-1">
          <h3 class="team-bio-name hidden md:block mb-1"><?php echo get_the_title( $id ); ?></h3>
          <h4 class="team-bio-title hidden md:block mb-4"><?php the_field( 'tb_team_role', $id ); ?></h4>
        </div>
        <div class="w-full lg:w-3/5">
          <?php echo get_the_content( $id ); ?>
        </div>
        <button class="team-bio-close hidden md:block" data-drawer-action-special aria-expanded="false" aria-controls="team-member-<?php echo $id ?>"><span></span><span></span></button>
      </div>
    </div>
    <div class="team-spacer team-spacer-<?php echo $id; ?>"></div>
  </div>

  <?php return ob_get_clean();
}

function news_item( $id, $is_featured = false ) {
  $author_id = get_field( 'tb_news_author', $id );
  $author_name = get_the_title( $author_id );
  ob_start(); ?>

  <div class="news-item mb-8 relative<?php echo $is_featured ? ' lg:mb-0' : ''; ?>">
    <a class="text-black no-underline" href="<?php echo get_the_permalink( $id ); ?>">
      <div class="news-img <?php echo $is_featured ? '' : 'aspect-16:9'; ?> bg-cover bg-no-repeat bg-center" style="background-image: url('<?php echo get_the_post_thumbnail_url( $id, 'medium-large' ); ?>');"></div>
      <div class="news-overlay px-4 relative z-20 -mt-8 lg:mt-0 lg:absolute lg:pin">
        <div class="pl-4 border-l-4 border-primary py-2 lg:absolute lg:pin-b lg:pin-x lg:mb-8 lg:mx-8">
          <div class="news-spacer h-12 lg:h-6"></div>
          <h3 class="news-heading font-bold pb-2 text-base lg:text-md"><?php echo get_the_title( $id ); ?></h3>
          <p class="news-date text-sm lg:text-base"><?php echo get_the_date( 'F j, Y', $id ) . ' - ' . $author_name ?></p>
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
    <div class="leading-normal md:text-md mb-8"><?php the_field( 'tb_career_description', 'options' ); ?></div>
    <?php if ( $tb_careers->have_posts() ) : ?>
      <ul class="list-reset flex flex-col md:flex-row md:flex-wrap md:justify-between">
        <?php while ( $tb_careers->have_posts() ) : $tb_careers->the_post(); ?>
            <li class="career-item bg-primary hover:bg-black text-white p-6 pt-8 mb-6 rounded">
              <h4 class="text-md pt-8 mb-1"><?php the_title(); ?></h4>
              <p><a class="text-white hover:no-underline" href="<?php the_permalink(); ?>">View Full Description</a></p>
            </li>
        <?php endwhile; ?>
      </ul>
    <?php else : ?>
      <div class="no-careers"><?php the_field( 'tb_career_no_careers_description', 'options' ); ?></div>
    <?php endif; ?>
  </div>

  <?php return ob_get_clean();
}