<?php

get_header();

$tb_featured_projects = new WP_Query( array(
  'post_type' => 'potfolio',
  'category_name' => 'featured',
  'post_status' => 'publish',
  'posts_per_page' => 10,
  'no_found_rows' => true,
  'update_post_meta_cache' => false,
  'update_post_term_cache' => false,
) );

$tb_project_categories = array_merge( array('all' => 'All'), wp_list_pluck( get_terms('project-type'), 'name', 'slug' ) );

error_log( print_r( $tb_project_categories, true ) );
?>

<section class="featured-projects h-screen">
  <div class="featured-projects-preview">
    <div class="featured-projects-info"></div>
    <div class="featured-projects-slider slider"></div>
  </div>
  <div class="featured-projects-nav border-t border-b border-primary flex ">
    <p class="bg-primary text-white text-center p-6 font-bold">See Projects From Category:</p>
    <ul class="list-reset flex flex-1 flex-row justify-center items-center">
      <?php foreach( $tb_project_categories as $slug => $name ) : 
        $path = 'all' === $slug ? 'portfolio#projects' : 'portfolio/type/' . $slug . '#projects'; ?>
        <li class="font-bold uppercase p-6"><a href="<?php echo home_url($path); ?>" class="text-black no-underline hover:underline"><?php echo $name; ?></a></li>
      <?php endforeach; ?>
      
    </ul>
  </div>
</section>

<section id="projects"></section>

<?php get_footer();