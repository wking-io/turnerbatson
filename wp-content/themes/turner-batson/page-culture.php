<?php

$is_video = get_field( 'is_culture_hero_a_video' );
$tb_hero_content = $is_video ? get_field( 'tb_culture_hero_video' ) : get_field( 'tb_culture_hero_img' );
$tb_hero_poster = get_field( 'tb_culture_hero_video_poster' );
$tb_culture_hero_heading = get_field( 'tb_culture_hero_heading' );
$tb_culture_scroll_text = get_field( 'tb_culture_scroll_text' );
$tb_culture_content_heading = get_field( 'tb_culture_content_heading' );
$tb_culture_content_description = get_field( 'tb_culture_content_description' );
$tb_culture_people_description = get_field( 'tb_culture_people_description' );
$tb_culture_passion_description = get_field( 'tb_culture_passion_description' );
$tb_culture_purpose_description = get_field( 'tb_culture_purpose_description' );
$tb_culture_content_images = get_field( 'tb_culture_content_images' );
$random_index = array_rand($tb_culture_content_images);

$tb_culture_ps = array(
  'people' => $tb_culture_people_description,
  'passion' => $tb_culture_passion_description,
  'purpose' => $tb_culture_purpose_description
);

get_header(); ?>

<section class="h-screen flex flex-col-reverse lg:flex-row">
  <div class="bg-primary text-white relative z-20 px-8 pb-8 culture-hero-info lg:flex items-end">
    <h1 class="culture-heading pb-8 lg:mb-8"><?php echo $tb_culture_hero_heading; ?></h1>
    <div class="scroll-block relative lg:absolute items-center flex pb-8 lg:pb-0">
      <p class="scroll-text font-bold mr-8"><?php echo $tb_culture_scroll_text; ?></p>
      <svg class="scroll-arrow w-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 11 18" class="button-slider-arrow">
        <path fill="#ffffff" fill-rule="evenodd" d="M10.886 2.4L4.286 9l6.6 6.6L9 17.485.515 9 9 .515 10.886 2.4z"/>
      </svg>
    </div>
  </div>
  <?php if ( $is_video ) : ?>
    <div class="culture-video relative overflow-hidden flex-1 lg:aspect-4:3">
      <div class="hidden md:block">
        <?php 
          echo cl_video_tag( $tb_hero_content, 
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
      <img class="absolute pin-t pin-l object-cover w-full h-full md:hidden" src="<?php echo $tb_hero_poster; ?>" alt="Video Fallback">
    </div>
  <?php else : ?>
    <div class="aspect-4:3 bg-cover bg-no-repeat bg-center" style="background-image: linear-gradient(rgba(63, 66, 67, 0.4), rgba(63, 66, 67, 0.4)), url('<?php echo $tb_hero_content; ?>');"></div>
  <?php endif; ?>
</section>

<section class="md:py-8">
  <div class="wrapper-sm pt-8">
    <h2 class="text-md md:text-lg lg:text-xl leading-tight mb-6"><?php echo $tb_culture_content_heading; ?></h2>
    <div class="leading-normal culture-content mb-8"><?php echo $tb_culture_content_description; ?></div>
    <ul class="list-reset md:flex md:flex-row md:flex-wrap md:justify-between">
      <?php foreach ( $tb_culture_ps as $name => $content ) : ?>
        <li class="p-item pb-8">
          <h3 class="text-primary uppercase text-lg mb-1"><?php echo $name; ?></h3>
          <p class="leading-normal"><?php echo $content; ?></p>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
  <div class="culture-img my-8 aspect-16:9 md:aspect-2:1 bg-cover bg-no-repeat bg-center" style="background-image: url('<?php echo $tb_culture_content_images[$random_index]['url']; ?>');"></div>
  <div class="wrapper-sm py-8">
    <?php echo job_content(); ?>
  </div>
</section>

<?php get_footer();