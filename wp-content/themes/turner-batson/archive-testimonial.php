<?php


global $wp_query;
$current_page = $wp_query->get( 'paged' ) ? $wp_query->get( 'paged' ) : 1;
$is_last_page = $wp_query->max_num_pages == $current_page;

$tb_testimonial_heading = get_field( 'tb_testimonial_heading', 'options' );
$tb_testimonial_description = get_field( 'tb_testimonial_description', 'options' );

get_header(); ?>

<section>
  <div class="wrapper lg:flex pt-nav lg:pt-0">
    <div class="w-full h-screen md:w-3/4 lg:min-w-4xl mb-8 lg:mb-0 lg:mr-8 lg:flex lg:flex-col lg:justify-center relative">
      <div class="lg:fixed lg:max-w-4xl testimonial-info">
        <div class="h-16 lg:hidden"></div>
        <h1 class="text-2xl md:text-3xl mb-4"><?php echo $tb_testimonial_heading; ?></h1>
        <div class="leading-normal md:text-md"><?php echo $tb_testimonial_description; ?></div>
      </div>
    </div>
    <div class="pb-8" data-load-more="testimonial">
      <ul class="my-8 lg:mt-0 lg:ml-8 flex flex-col md:flex-row md:flex-wrap lg:flex-col xl:flex-row justify-between list-reset" data-load-more-container>
      <?php if ( have_posts() ) :
          while ( have_posts() ) : the_post(); ?>
            <?php echo testimonial_item( get_the_ID() ); ?>
          <?php endwhile;
        else :
          echo no_items( 'team members' );
        endif; ?>
      </ul>
      <div class="text-center">
        <button class="button button-lg my-8<?php echo $is_last_page ? ' hidden' : '' ;?>" data-load-more-button data-load-more-loading="false" data-load-page="2">Load More Team Members <?php echo do_shortcode( '[loader]' ); ?></button>
      </div>
    </div>
  </div>
</section>

<?php get_footer();