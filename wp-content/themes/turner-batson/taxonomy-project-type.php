<?php

get_header();

global $wp_query;
$current_page = $wp_query->get( 'paged' ) ? $wp_query->get( 'paged' ) : 1;
$is_last_page = $wp_query->max_num_pages == $current_page;

$tb_project_categories = array_merge( array('all' => 'All'), wp_list_pluck( get_terms('project-type'), 'name', 'slug' ) );

$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );

?>

<section id="projects" class="pb-jumbo pt-nav md:py-jumbo">
  <div class="flex flex-col md:flex-row items-center wrapper pb-8">
    <h2 class="uppercase text-2xl mb-4 md:mb-0">Portfolio</h2>
    <ul class="flex-1 list-reset flex flex-wrap md:flex-no-wrap justify-center md:justify-end items-center">
      <?php foreach( $tb_project_categories as $slug => $name ) : 
        $path = 'all' === $slug ? 'portfolio#projects' : 'portfolio/type/' . $slug . '#projects'; ?>
        <?php if ( $term->slug === $slug ) : ?>
          <li class="font-bold mx-3 mb-2 md:mx-0 md:px-3 lg:px-6 py-2 lg:py-3 border-b-2 md:border border-primary text-sm lg:text-base"><?php echo $name; ?></li>
        <?php elseif ( 'featured' !== $slug ) : ?>
          <li class="font-bold border-b-2 md:border border-transparent hover:border-primary mb-2 mx-3 md:mx-0 md:-ml-px"><a href="<?php echo home_url($path); ?>" class="text-sm lg:text-base text-black no-underline md:px-3 lg:px-6 py-2 lg:py-3 block"><?php echo $name; ?></a></li>
        <?php endif; ?>
      <?php endforeach; ?>
    </ul>
  </div>
  <div class="wrapper" data-load-more="portfolio">
      <div class="md:flex md:flex-wrap" data-load-more-container>
        <?php if ( have_posts() ) :
          while ( have_posts() ) : the_post();
            echo portfolio_item( get_the_ID() );
          endwhile;
        else :
          echo no_items( 'portfolio items' );
        endif; ?>
      </div>
      <div class="text-center">
        <button class="button button-lg my-8<?php echo $is_last_page ? ' hidden' : '' ;?>" data-load-more-button data-load-more-loading="false" data-load-page="2">Load More <?php echo do_shortcode( '[loader]' ); ?></button>
      </div>
  </div>
</section>

<?php get_footer();