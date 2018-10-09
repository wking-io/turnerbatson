<?php

$tb_featured_img = get_field( 'tb_project_featured_img' );
$tb_gallery = get_field( 'tb_project_gallery' );
$tb_location = get_field( 'tb_project_location' );
$tb_year = get_field( 'tb_project_year' );
$tb_footage = get_field( 'tb_project_footage' );

$category = get_main_category( get_the_ID(), 'project-type' );
$tb_details = array(
  'industry' => $category,
  'location' => $tb_location,
  'year' => $tb_year,
  'square-footage' => $tb_footage,
);

get_header(); 

while ( have_posts() ) : the_post(); ?>

  <section class="flex flex-col md:justify-end lg:h-screen pt-nav lg:pt-0">
    <div class="h-64 md:h-full bg-cover bg-no-repeat bg-center" style="background-image: linear-gradient(to bottom, rgba(63, 66, 67, .2), rgba(63, 66, 67, 0) 80%), url('<?php echo $tb_featured_img; ?>');"></div>
    <div class="wrapper"><h1 class="project-heading relative text-lg lg:text-3xl uppercase font-bold py-8 pl-6"><?php the_title(); ?></h1></div>
  </section>

  <section class="flex flex-col" data-slider="project">
    <ul class="list-reset slider">
      <?php foreach( $tb_gallery as $image ) : ?>
        <li class="aspect-5:3 bg-cover bg-no-repeat bg-center" style="background-image: url('<?php echo $image['url']; ?>')"></li>
      <?php endforeach; ?>
    </ul>
    <div class="relative">
      <ul class="list-reset text-white bg-primary pt-8 pb-4 flex flex-col md:flex-row md:flex-wrap">
        <?php foreach( $tb_details as $name => $detail ) : ?>
          <li class="pl-8 pb-4 md:pl-0 md:w-1/2">
            <p class="text-sm uppercase pb-1"><?php echo replace_space( $name ); ?></p>
            <p class="text-md font-bold"><?php echo $name === 'square-footage' ? number_format( $detail ) : $detail; ?></p>
          </li>
        <?php endforeach; ?>
      </ul>
      <div class="project-nav absolute">
        <?php echo do_shortcode( '[slider_nav type="prev" large="true"]' ); ?>
        <?php echo do_shortcode( '[slider_nav type="next" large="true"]' ); ?>
      </div>
    </div>
  </section>

  <section class="project-content wrapper py-8">
    <?php the_content(); ?>
    <a class="button-outline-primary my-8" href="<?php echo home_url( '/portfolio#projects' ); ?>">Back To Portfolio</a>
  </section>

  <?php endwhile;

get_footer();