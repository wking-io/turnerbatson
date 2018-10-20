<?php

$author_id = get_field( 'tb_news_author' );
$author_name = get_the_title( $author_id );
$author_title = get_field( 'tb_team_role', $author_id );
$date = get_the_date( 'F j, Y' );
$tb_content = get_field( 'tb_news_content' );
$tb_gallery = get_field( 'tb_news_gallery' );

get_header();
  while ( have_posts() ) : the_post(); ?>

  <section class="pt-nav lg:pt-0">
    <div class="aspect-16:9 lg:aspect-3:1 bg-cover bg-no-repeat bg-center" style="background-image: url('<?php echo get_the_post_thumbnail_url( $id, 'full' ); ?>');"></div>
    <div class="wrapper flex flex-col lg:flex-row-reverse lg:justify-between lg:items-start py-8 lg:mt-8">
      <div class="news-main">
        <div class="flex flex-col">
          <h1 class="news-title text-md md:text-xl pb-8"><?php the_title(); ?></h1>
          <div class="flex mb-8 lg:hidden">
            <div class="flex-1">
              <p class="mb-1 uppercase"><strong><?php echo $author_name; ?></strong></p>
              <p class="mb-1 text-sm"><?php echo $author_title; ?></p>
              <p class="text-sm"><?php echo $date; ?></p>
            </div>
            <div class="general-share text-right">
              <p class="mb-2"><strong>Share This:</strong></p>
              <?php if ( is_active_sidebar( 'share-widget-area' ) ) : ?>
                  <?php dynamic_sidebar( 'share-widget-area' ); ?>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div data-slider="news">
          <div class="general-content">
            <?php echo $tb_content; ?>
          </div>
          <?php if ( ! empty( $tb_gallery ) ) : ?>
            <div class="relative py-6">
              <div class="absolute py-6 pin-t pin-r lg:pin-l z-20">
                <?php echo do_shortcode( '[slider_nav type="prev"]' ); ?>
                <?php echo do_shortcode( '[slider_nav type="next"]' ); ?>
              </div>
              <ul class="list-reset news-slider slider">
                <?php foreach( $tb_gallery as $image ) : ?>
                  <li class="h-full" style="background-image: url('<?php echo $image['url']; ?>')"><img class="h-full" src="<?php echo $image['url']; ?>" alt="<?php echo $image['title']; ?>"/></li>
                <?php endforeach; ?>
              </ul>
            </div>
          <?php endif; ?>
          <div class="flex flex-col md:flex-row items-center pb-8">
            <div class="w-full md:w-auto pt-4 pb-8 md:py-8 md:mr-6 flex justify-between general-pagination">
              <?php previous_post_link( '%link', 'Prev Post' ); ?>
              <?php next_post_link( '%link', 'Next Post' ); ?>
            </div>
            <a class="button-link-primary mb-8 md:mb-0" href="<?php echo home_url( '/news' ); ?>">Back To News</a>
          </div>
        </div>
      </div>
      <div class="hidden lg:mt-1 lg:flex lg:flex-col lg:text-right lg:mr-8 lg:flex-no-shrink">
        <div class="flex-1 lg:mb-4">
          <p class="mb-1 uppercase author-name"><strong><?php echo $author_name; ?></strong></p>
          <p class="mb-1"><?php echo $author_title; ?></p>
          <p><?php echo $date; ?></p>
        </div>
        <div class="general-share text-right">
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