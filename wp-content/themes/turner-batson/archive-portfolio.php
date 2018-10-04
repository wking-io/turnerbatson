<?php

get_header();

$tb_featured_projects = new WP_Query( array(
  'post_type' => 'portfolio',
  'project_type' => 'featured',
  'post_status' => 'publish',
  'posts_per_page' => 10,
  'no_found_rows' => true,
  'update_post_meta_cache' => false,
  'update_post_term_cache' => false,
) );
$tb_featured_project_solo = $tb_featured_projects->posts[0];

$tb_project_categories = array_merge( array('all' => 'All'), wp_list_pluck( get_terms('project-type'), 'name', 'slug' ) );

?>

<section class="featured-projects h-screen pt-nav lg:pt-0" data-slider="featured">
  <div class="featured-projects-preview lg:opacity-0 flex flex-col-reverse lg:flex-row">
    <div class="featured-projects-info relative z-10 -mt-jumbo lg:mt-0 lg:-mr-jumbojumbo lg:w-1/2">
      <div class="featured-projects-info--solo lg:hidden p-8">
        <h2 class="uppercase text-lg pb-6"><a class="no-underline hover:underline text-black" href="<?php echo get_permalink( $tb_featured_project_solo->ID ); ?>"><?php echo get_the_title( $tb_featured_project_solo->ID ) ?></a></h2>
        <div class="flex items-end justify-between">
          <p class="uppercase"><?php echo get_main_category( $tb_featured_project_solo->ID, 'project-type' ) ?></p>
          <p><a class="text-primary font-bold" href="<?php echo get_permalink( $tb_featured_project_solo->ID ); ?>">View Project</a></p>
        </div>
      </div>
      <div class="absolute featured-projects-info--nav">
        <div class="slider-sub hidden lg:block">
          <?php foreach( $tb_featured_projects->posts as $featured_project ) : ?>
            <div class="flex-col">
              <p class="uppercase featured-projects-info--category"><?php echo get_main_category( $featured_project->ID, 'project-type' ) ?></p>
              <h2 class="uppercase featured-projects-info--title"><a class="no-underline hover:underline text-black" href="<?php echo get_permalink( $featured_project->ID ); ?>"><?php echo get_the_title( $featured_project->ID ) ?></a></h2>
              <p class="featured-projects-info--link"><a class="text-primary font-bold hover:no-underline" href="<?php echo get_permalink( $featured_project->ID ); ?>">View Project</a></p>
            </div>
          <?php endforeach; ?>
        </div>
        <div class="hidden lg:block mt-8">
          <?php echo do_shortcode( '[slider_nav type="prev" vertical="true" secondary="true"]' ); ?>
          <?php echo do_shortcode( '[slider_nav type="next" vertical="true" secondary="true"]' ); ?>
        </div>
      </div>
    </div>
    <div class="featured-projects-slider slider hidden lg:block w-full overflow-hidden relative">
      <?php foreach( $tb_featured_projects->posts as $featured_project ) : ?>
        <div class="featured-projects-img lg:hidden bg-cover bg-no-repeat bg-center h-full" style="background-image: url(<?php the_field( 'tb_project_featured_img', $featured_project->ID ); ?>);"></div>
      <?php endforeach; ?>
    </div>
    <div class="featured-projects-img lg:hidden bg-cover bg-no-repeat bg-center h-full" style="background-image: linear-gradient(to top, rgba(255, 255, 255, 0.75), rgba(255, 255, 255, 0) 55%), url(<?php the_field( 'tb_project_featured_img', $tb_featured_project_solo->ID ); ?>);"></div>
  </div>
  <div class="featured-projects-nav border-t border-b border-primary z-20">
    <div class="lg:hidden h-full">
      <a href="#projects" class="button block h-full text-center p-6">See Full Portfolio Below</a>
    </div>
    <div class="hidden lg:flex">
      <p class="bg-primary text-white text-center p-6 font-bold featured-projects-nav--info">See Full Portfolio Below</p>
      <ul class="list-reset flex flex-1 flex-row justify-center items-center">
        <?php foreach( $tb_project_categories as $slug => $name ) : 
          $path = 'all' === $slug ? 'portfolio#projects' : 'portfolio/type/' . $slug . '#projects'; ?>
          <li class="font-bold uppercase p-6"><a href="<?php echo home_url($path); ?>" class="text-black no-underline hover:underline"><?php echo $name; ?></a></li>
        <?php endforeach; ?>
        
      </ul>
    </div>
    
  </div>
</section>

<section id="projects"></section>

<?php get_footer();