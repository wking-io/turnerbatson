<?php

get_header();

// DATA
$tb_featured_projects = get_field( 'tb_portfolio_slider' );
$tb_purpose_poster = get_field( 'tb_purpose_poster' );
$tb_purpose_video = get_field( 'tb_purpose_video' );
$tb_purpose_description = get_field( 'tb_purpose_description' );
$tb_purpose_button_text = get_field( 'tb_purpose_button_text' );
$tb_culture_bg = get_field( 'tb_culture_bg' );
$tb_culture_button_text =get_field( 'tb_culture_button_text' );
$tb_culture_testimonial = get_field( 'tb_culture_testimonial' );
$tb_latest_news = new WP_Query( array(
    'post_type' => 'post',
    'post_status' => 'published',
    'posts_per_page' => 5,
    'no_found_rows' => true,
    'update_post_meta_cache' => false,
    'update_post_term_cache' => false,
) );

?>

<section id="hero" class="relative h-2/3 md:h-screen" data-slider="featured">
  <ul id="featured-project-slider" class="featured-project-slider slider list-reset h-9/10 md:h-full">
    <?php foreach( $tb_featured_projects as $i => $project ) : ?>
      <li class="h-full w-screen bg-center bg-cover bg-no-repeat" style="background-image: url(<?php the_field( 'tb_project_hero_img', $project['project']); ?>); ?>"></li>
    <?php endforeach; ?>
  </ul>
  <div class="featured-project-nav flex flex-col lg:flex-row justify-between items-start lg:items-center p-8 absolute pin-b pin-l pin-r z-30">
    <div class="branding flex flex-col items-start justify-start mb-8 lg:mb-0 lg:mr-4">
      <?php echo do_shortcode( '[logo classname="hidden lg:block w-10 mb-4 h-auto"]' ); ?>
      <?php echo do_shortcode( '[name classname="h-3" in-color="true" ]' ); ?>
    </div>
    <ul class="featured-project-slider-nav-items flex justify-between lg:justify-end items-center flex-1 list-reset relative w-full lg:w-auto lg:ml-8">
      <?php if ( ! empty( $tb_featured_projects ) ) :
        foreach ( $tb_featured_projects as $i => $project ) : ?>
          <li class="<?php echo $i !== 0 ? 'absolute ml-0 md:ml-4 lg:ml-8 lg:pl-2' : 'static'; ?> md:static pin-b pin-l w-full md:w-1/3 lg:w-auto opacity-0 md:opacity-100 flex items-center featured-project-slider-nav-item">
            <div class="featured-project-slider-indicator relative h-full pr-4 md:pr-3 lg:pr-4">
              <span class="bg-primary block h-full"></span>
              <span class="bg-primary block absolute pin-l pin-b"></span>
            </div>
            <button class="text-left p-px" data-slider-button="featured" data-slide-to="<?php echo $i; ?>">
              <span class="uppercase text-base md:text-sm xl:text-base font-semibold pb-1 block"><?php echo with_default( 'No short title found', 'project_short_title', $project ); ?></span>
              <span class="text-sm m-0 p-0 block"><?php echo with_default( 'No short subtitle found', 'project_short_subtitle', $project ); ?></span>
            </button>
          </li>
        <?php endforeach;
      else : ?>
      <p>No featured projects found! Try adding them on the Home page in the admin.</p>
      <?php endif; ?>
    </ul>
  </div>
</section>

<section id="purpose" class="pt-8" data-section data-section-type="light">
  <div class="flex flex-col lg:flex-row justify-between">
    <div class="relative w-full lg:w-3/5 aspect-16:9 bg-cover bg-center bg-no-repeat" style="background-image: url(<?php echo $tb_purpose_poster; ?>);">
      <button class="absolute pin-center opacity-75 hover:opacity-100 purpose-play-button"></button>
    </div>
    <div class="p-8 pb-0 lg:pb-8 w-full lg:w-2/5">
      <h2 class="purpose-heading uppercase text-primary mb-6"><span class="text-black block">Our</span> Purpose</h2>
      <div class="leading-normal mb-8"><?php echo $tb_purpose_description; ?></div>
      <a href="" class="button-outline-dark"><?php echo $tb_purpose_button_text; ?></a>
    </div>
  </div>
</section>

<section id="culture" class="" data-section data-section-type="light">
  <div class="mx-8 culture-accent relative z-30"><div class="w-1 h-full bg-primary lg:absolute lg:pin-t lg:pin-r"></div></div>
  <div class="relative">
    <div class="culture-bg bg-cover bg-fixed bg-center p-8 mb-8" style="background-image: linear-gradient(rgba(63, 66, 67, 0.2), rgba(63, 66, 67, 0.2)), url(<?php echo $tb_culture_bg; ?>);">
      <div class="culture-content">
        <h2 class="culture-tagline text-white mb-6"><?php echo do_shortcode( '[tagline theme="stack"]' ); ?></h2>
        <a href="" class="button"><?php echo $tb_culture_button_text; ?></a>
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

<section id="latest-news" class="" data-section data-section-type="dark">
  <div class="flex flex-between">
    <h2>Latest News</h2>
    <a href="">Give me all news</a>
    <div>
      <button></button>
      <button></button>
    </div>
  </div>
  <div>
    <?php

    // The Loop
    if ( $tb_latest_news->have_posts() ) : 
      while ( $tb_latest_news->have_posts() ) : $tb_latest_news->the_post(); ?>

        <div class="flex flex-col">
          <div>
            <img href="<?php echo get_field( 'tb_news_hero', $post->ID ); ?>" alt="Featured Image" />
          </div>
          <h3><?php the_title(); ?></h3>
        </div>

    <?php endwhile;
    endif;
    // Reset Post Data
    wp_reset_postdata();

    ?>
  </div>
</section>

<section>
  <div class=""></div>
  <div class="">
    <?php 
      echo cl_video_tag( "samples_elephants", 
        array(
          "controls" => true,
          "fallback_content" => "Your browser does not support HTML5 video tags"
        )
      ); 
    ?>
  </div>
</section>

<?php get_footer();