<?php

get_header();

// DATA
$tb_featured_projects = get_field( 'tb_portfolio_slider' );
$tb_purpose_video = get_field( 'tb_purpose_video' );
$tb_purpose_video_poster = get_field( 'tb_purpose_video_poster' );
$tb_purpose_description = get_field( 'tb_purpose_description' );
$tb_purpose_button_text = get_field( 'tb_purpose_button_text' );
$tb_purpose_button_link = get_field( 'tb_purpose_button_link' );
$tb_culture_bg_images = get_field( 'tb_culture_bg_images' );
$random_index = array_rand($tb_culture_bg_images);
$tb_culture_bg = $tb_culture_bg_images[$random_index];
$tb_culture_button_text =get_field( 'tb_culture_button_text' );
$tb_culture_button_link =get_field( 'tb_culture_button_link' );
$tb_culture_testimonial = get_field( 'tb_culture_testimonial' );
$tb_latest_news = new WP_Query( array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 5,
    'no_found_rows' => true,
    'update_post_meta_cache' => false,
    'update_post_term_cache' => false,
) );

?>

<section id="hero" class="relative h-screen" data-initializing="true" data-slider="home">
  <ul id="featured-project-slider" class="featured-project-slider slider list-reset h-full">
    <?php foreach( $tb_featured_projects as $i => $project ) : ?>
      <li class="h-full w-screen bg-center bg-cover bg-no-repeat relative" style="background-image: url(<?php the_field( 'tb_project_featured_img', $project['project']); ?>); ?>"><a href="<?php echo get_the_permalink( $project['project'] ); ?>" class="absolute pin"></a></li>
    <?php endforeach; ?>
  </ul>
  <div class="featured-project-nav flex flex-col lg:flex-row justify-between items-start lg:items-center lg:p-6 xl:pb-4 absolute pin-b pin-l pin-r z-30">
    <div class="branding flex flex-col items-start justify-start mb-6 lg:mb-0 lg:mr-4 relative">
      <?php echo do_shortcode( '[logo classname="absolute branding-logo hidden lg:block w-10 mb-3 h-auto" sticky="true"]' ); ?>
      <div class="hidden lg:block w-10 mb-3 h-10" data-sticky-ref></div>
      <?php echo do_shortcode( '[name classname="h-3 branding-name" in-color="true" ]' ); ?>
    </div>
    <ul class="featured-project-slider-nav-items flex justify-between lg:justify-end items-center flex-1 list-reset relative w-full lg:w-auto lg:ml-8">
      <?php if ( ! empty( $tb_featured_projects ) ) :
        foreach ( $tb_featured_projects as $i => $project ) : ?>
          <li class="<?php echo $i !== 0 ? 'absolute ml-0 md:ml-4 lg:ml-8 lg:pl-2' : 'static'; ?> md:static pin-b pin-l w-full md:w-1/3 lg:w-auto opacity-0 md:opacity-100 flex items-center featured-project-slider-nav-item">
            <div class="featured-project-slider-indicator relative h-full pr-4 md:pr-3 lg:pr-4">
              <span class="bg-primary block h-full"></span>
              <span class="bg-primary block absolute pin-l pin-b"></span>
            </div>
            <button class="hidden md:block text-left p-px" data-slider-button="featured" data-slide-to="<?php echo $i; ?>">
              <span class="uppercase text-base md:text-sm xl:text-base font-semibold pb-1 block"><?php echo with_default( 'No short title found', 'project_short_title', $project ); ?></span>
              <span class="text-sm m-0 p-0 block"><?php echo with_default( 'No short subtitle found', 'project_short_subtitle', $project ); ?></span>
            </button>
            <a class="md:hidden text-black no-underline text-left p-px" href="<?php echo get_the_permalink( $project['project'] ); ?>">
              <span class="uppercase text-base md:text-sm xl:text-base font-semibold pb-1 block"><?php echo with_default( 'No short title found', 'project_short_title', $project ); ?></span>
              <span class="text-sm m-0 p-0 block"><?php echo with_default( 'No short subtitle found', 'project_short_subtitle', $project ); ?></span>
            </a>
          </li>
        <?php endforeach;
      else : ?>
      <p>No featured projects found! Try adding them on the Home page in the admin.</p>
      <?php endif; ?>
    </ul>
  </div>
</section>

<section id="purpose" class="purpose relative md:pt-8 lg:pt-jumbo bg-white">
  <span class="purpose-bar" data-grow data-grow-buffer="0.5"></span>
  <div class="flex flex-col lg:flex-row justify-between items-center">
    <div class="purpose-video relative w-full lg:w-3/5 aspect-16:9">
      <div class="hidden md:block">
        <?php 
          echo cl_video_tag( $tb_purpose_video, 
            array(
              "loop" => true,
              "autoplay" => true,
              "muted" => true,
              "preload" => true,
              "fallback_content" => "Your browser does not support HTML5 video tags",
              "width" => 1000,
              "crop" => "fit",
            )
          ); 
        ?>
      </div>
      <img class="absolute pin-t pin-l object-cover w-full h-full md:hidden" src="<?php echo $tb_purpose_video_poster; ?>" alt="Video Fallback">
    </div>
    <div class="p-8 pb-0 lg:pb-8 w-full lg:w-2/5">
      <h2 class="purpose-heading uppercase text-primary mb-6"><span class="text-black block">Our</span> Purpose</h2>
      <div class="leading-normal mb-8"><?php echo $tb_purpose_description; ?></div>
      <a href="<?php echo $tb_purpose_button_link; ?>" class="button-outline-dark"><?php echo $tb_purpose_button_text; ?></a>
    </div>
  </div>
</section>

<section id="culture" class="">
  <div class="mx-8 culture-accent relative z-30"><div class="w-1 h-full bg-primary lg:absolute lg:pin-t lg:pin-r" data-grow data-grow-buffer="0.05"></div></div>
  <div class="relative">
    <div class="culture-bg bg-cover md:bg-fixed bg-center p-8 mb-8" style="background-image: linear-gradient(rgba(63, 66, 67, 0.15), rgba(63, 66, 67, 0.05)), url(<?php echo $tb_culture_bg['url']; ?>);">
      <div class="culture-info xl:ml-8 xl:pl-8">
        <h2 class="culture-tagline text-white mb-6 uppercase"><?php echo do_shortcode( '[tagline theme="stack"]' ); ?></h2>
        <a href="<?php echo $tb_culture_button_link; ?>" class="button"><?php echo $tb_culture_button_text; ?></a>
      </div>
    </div>
    <figure class="culture-testimonial p-8 lg:mr-8 lg:w-3/5 lg:absolute lg:text-right pin-r pin-b">
      <blockquote class="leading-normal font-medium text-md lg:text-lg mb-6 lg:mb-1 lg:text-white ">"<?php echo $tb_culture_testimonial->post_content; ?>"</blockquote>
      <footer>
        <cite class="leading-normal roman lg:text-white"><?php echo $tb_culture_testimonial->post_title; ?></cite>
      </footer>
    </figure>
  </div>
</section>

<section id="latest-news" class="pb-8 mt-8 mb-8 md:mb-jumbo md:my-jumbo" data-slider="latest">
  <div class="wrapper flex justify-between items-center py-8">
    <h2 class="text-xl uppercase text-bold">The <span class="text-primary">Latest</span></h2>
    <div class="hidden md:flex md:flex-row md:flex-1 md:justify-end md:items-center">
      <a href="<?php echo home_url('/news'); ?>" class="text-black font-bold">Give me all news</a>
      <div class="ml-8">
        <?php echo do_shortcode( '[slider_nav type="prev"]' ); ?>
        <?php echo do_shortcode( '[slider_nav type="next"]' ); ?>
      </div>
    </div>
  </div>
  <div class="latest-slider slider">
    <?php

    // The Loop
    if ( $tb_latest_news->have_posts() ) : 
      while ( $tb_latest_news->have_posts() ) : $tb_latest_news->the_post(); ?>
        <a class="text-black no-underline hover:underline" href="<?php the_permalink(); ?>">
          <div class="flex flex-col pb-8 md:p-0">
            <div class="aspect-5:3 w-full bg-cover bg-center bg-no-repeat" style="background-image: url(<?php the_post_thumbnail_url( 'medium_large' ); ?>);">
            </div>
            <h3 class="border-l-4 border-primary mt-4 pl-4 py-1 text-normal"><?php the_title(); ?></h3>
          </div>
        </a>

    <?php endwhile;
    endif;
    // Reset Post Data
    wp_reset_postdata();

    ?>
  </div>
  <a href="" class="md:hidden button-outline-dark ml-8">Give me all news</a>
</section>

<?php get_footer();