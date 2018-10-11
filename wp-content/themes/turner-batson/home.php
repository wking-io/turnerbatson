<?php

global $wp_query;
$current_page = $wp_query->get( 'paged' ) ? $wp_query->get( 'paged' ) : 1;
$is_last_page = $wp_query->max_num_pages == $current_page;

$the_one = '';
$featured_news = '';
$news = '';

if ( have_posts() ) :
  $i = 0;
  while ( have_posts() ) : the_post();
    if ( $i === 0 ) {
      $the_one .= news_item( get_the_ID(), true );
    } elseif ( $i < 3 ) {
      $featured_news .= news_item( get_the_ID(), true );
    } else {
      $news .= news_item( get_the_ID() );
    }
    $i++;
  endwhile;
else :
  $news = no_items( 'news items' );
endif;

get_header(); ?>

<section class="pt-nav lg:pt-0 lg:pb-8">
  <div class="featured-news lg:flex lg:justify-between">
    <?php echo $the_one; ?>
    <div class="featured-sub lg:flex-1 md:flex md:justify-between lg:flex-col">
      <?php echo $featured_news; ?>
    </div>
  </div>
</section>

<section class="lg:py-8">
  <div class="" data-load-more="news">
    <div class="news-container md:flex md:flex-wrap justify-between relative" data-load-more-container>
      <?php if ( have_posts() ) :
        echo $news;
      else :
        echo no_items( 'news items' );
      endif; ?>
    </div>
    <div class="text-center">
      <button class="button button-lg my-8<?php echo $is_last_page ? ' hidden' : '' ;?>" data-load-more-button data-load-more-loading="false" data-load-page="2" data-ppp="20" data-offset="11">Load More News <?php echo do_shortcode( '[loader]' ); ?></button>
    </div>
  </div>
</section>

<?php get_footer();
