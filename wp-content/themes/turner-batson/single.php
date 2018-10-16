<?php

$author_id = get_field( 'tb_news_author' );
$author_title = get_field( 'tb_team_role', $author_id );
$date = get_the_date( 'F j, Y' );

get_header();
  while ( have_posts() ) : the_post(); ?>

  <section class="pt-nav lg:pt-0">
    <div class="aspect-16:9 lg:aspect-3:1 bg-cover bg-no-repeat bg-center" style="background-image: url('<?php echo get_the_post_thumbnail_url( $id, 'full' ); ?>');"></div>
    <div class="wrapper flex flex-col lg:flex-row-reverse lg:justify-between lg:items-start py-8 lg:mt-8">
      <div>
        <div class="flex flex-col">
          <h1 class="news-title text-md md:text-xl pb-8"><?php the_title(); ?></h1>
          <div class="flex mb-8 lg:hidden">
            <div class="flex-1">
              <p class="mb-1"><strong><?php echo get_the_author(); ?></strong></p>
              <p class="mb-1"><?php echo $author_title; ?></p>
              <p><?php echo $date; ?></p>
            </div>
            <div class="news-share text-right">
              <p class="mb-2"><strong>Share This:</strong></p>
              <?php if ( is_active_sidebar( 'share-widget-area' ) ) : ?>
                  <?php dynamic_sidebar( 'share-widget-area' ); ?>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div>
          <div class="news-content">
            <?php the_content(); ?>
          </div>
          <div class="flex flex-col md:flex-row items-center pb-8">
            <div class="w-full md:w-auto pt-4 pb-8 md:py-8 md:mr-6 flex justify-between news-pagination">
              <?php previous_post_link( '%link', 'Prev Post' ); ?>
              <?php next_post_link( '%link', 'Next Post' ); ?>
            </div>
            <a class="button-link-primary mb-8 md:mb-0" href="<?php echo home_url( '/news' ); ?>">Back To News</a>
          </div>
        </div>
      </div>
      <div class="hidden lg:flex lg:flex-col lg:text-right lg:mr-8 lg:flex-no-shrink">
        <div class="flex-1 lg:mb-4">
          <p class="mb-1"><strong><?php echo get_the_author(); ?></strong></p>
          <p class="mb-1"><?php echo $author_title; ?></p>
          <p><?php echo $date; ?></p>
        </div>
        <div class="news-share text-right">
          <p class="mb-2"><strong>Share This:</strong></p>
          <?php if ( is_active_sidebar( 'share-widget-area' ) ) : ?>
              <?php dynamic_sidebar( 'share-widget-area' ); ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
    </div>
      
    </div>
    <div class="wrapper lg:flex">
      
    </div>
  </section>

  <?php endwhile;
get_footer();