<?php

global $wp_query;
$current_page = $wp_query->get( 'paged' ) ? $wp_query->get( 'paged' ) : 1;
$is_last_page = $wp_query->max_num_pages == $current_page;

$tb_hero_img = get_field( 'tb_team_hero_img', 'options' );

get_header(); ?>

<section class="team-header pt-nav lg:pt-0">
  <div class="h-full max-h-screen bg-cover bg-no-repeat bg-center aspect-5:3 relative" style="background-image: linear-gradient(to bottom, rgba(63, 66, 67, .6), rgba(63, 66, 67, 0) 30%), url('<?php echo $tb_hero_img; ?>');">
    <div class="w-full md:w-auto bg-white md:inline-block md:absolute pin-b pin-r text-center"><h2 class="text-md xl:text-lg text-grey uppercase font-medium py-6 px-8"><?php echo do_shortcode( '[tagline theme="people-red"]' ); ?></h2></div>
  </div>
</section>

<section class="py-8 md:py-jumbo">
  <div class="py-4 wrapper relative" data-load-more="team">
    <span class="hidden md:block team-bar" data-grow data-grow-buffer="0.01"></span>
    <h1 class="uppercase text-lg md:text-xl mb-6 md:mb-8 pl-8">Meet Our Team</h1>
    <ul class="team-container list-reset md:flex md:flex-wrap relative" data-load-more-container>
      <?php if ( have_posts() ) :
        while ( have_posts() ) : the_post();
          echo team_item( get_the_ID() );
        endwhile;
      else :
        echo no_items( 'team members' );
      endif; ?>
    </ul>
    <div class="text-center">
      <button class="button button-lg my-8<?php echo $is_last_page ? ' hidden' : '' ;?>" data-load-more-button data-load-more-loading="false" data-load-page="2">Load More Team Members<?php echo do_shortcode( '[loader]' ); ?></button>
    </div>
  </div>
</section>



<?php get_footer();