<?php

get_header();

$tb_featured_projects = new WP_Query( array(
  'post_type' => 'portfolio',
  'project-type' => 'featured',
  'post_status' => 'publish',
  'posts_per_page' => 10,
  'no_found_rows' => true,
  'update_post_meta_cache' => false,
  'update_post_term_cache' => false,
) );

$tb_project_categories = array_merge( array('all' => 'All'), wp_list_pluck( get_terms('project-type'), 'name', 'slug' ) );

?>

<section class="featured-projects md:h-screen pt-nav lg:pt-0" data-slider="featured">
  <div class="featured-projects-preview lg:opacity-0 flex flex-col-reverse lg:flex-row">
    <div class="featured-projects-info relative z-10 p-8 lg:p-0 lg:mt-0 lg:w-3/5">
      <div class="lg:absolute featured-projects-info--nav lg:px-8">
        <div class="slider-sub pt-4">
          <?php foreach( $tb_featured_projects->posts as $featured_project ) : ?>
            <div class="flex-col">
              <p class="uppercase featured-projects-info--category mb-4"><?php echo get_main_category( $featured_project->ID, 'project-type' ) ?></p>
              <h2 class="uppercase featured-projects-info--title mb-4"><a class="no-underline hover:underline text-black" href="<?php echo get_permalink( $featured_project->ID ); ?>"><?php echo get_the_title( $featured_project->ID ) ?></a></h2>
              <p class="featured-projects-info--link"><a class="text-primary font-bold hover:no-underline" href="<?php echo get_permalink( $featured_project->ID ); ?>">View Project</a></p>
            </div>
          <?php endforeach; ?>
        </div>
        <div class="featured-projects-slider-nav absolute pin-t pin-r lg:static lg:mt-8 lg:mr-0">
          <?php echo do_shortcode( '[slider_nav type="prev" vertical="true" secondary="true"]' ); ?>
          <?php echo do_shortcode( '[slider_nav type="next" vertical="true" secondary="true"]' ); ?>
        </div>
      </div>
    </div>
    <div class="featured-projects-slider slider w-full overflow-hidden relative">
      <?php foreach( $tb_featured_projects->posts as $featured_project ) : ?>
        <div class="featured-projects-img lg:hidden bg-cover bg-no-repeat bg-center h-full relative" style="background-image: url(<?php the_field( 'tb_project_featured_img', $featured_project->ID ); ?>);"><a href="<?php echo get_permalink( $featured_project->ID ); ?>" class="absolute"></a></div>
      <?php endforeach; ?>
    </div>
  </div>
  <div class="featured-projects-nav border-t border-b border-primary z-20">
    <div class="lg:hidden h-full">
      <a href="<?php echo home_url( 'portfolio' ); ?>" class="button block h-full text-center p-6">See Full Portfolio</a>
    </div>
    <div class="hidden lg:flex">
      <p class="bg-primary text-white text-center p-6 font-bold featured-projects-nav--info">See Full Portfolio</p>
      <ul class="list-reset flex flex-1 flex-row justify-center items-center">
        <?php foreach( $tb_project_categories as $slug => $name ) :
        if ( $slug !== 'featured' ) : 
          $path = 'all' === $slug ? 'portfolio' : 'portfolio/type/' . $slug . '#projects'; ?>
          <li class="font-bold uppercase p-6"><a href="<?php echo home_url($path); ?>" class="text-black no-underline hover:underline"><?php echo $name; ?></a></li>
        <?php endif; endforeach; ?>
      </ul>
    </div>
    
  </div>
</section>

<?php get_footer();