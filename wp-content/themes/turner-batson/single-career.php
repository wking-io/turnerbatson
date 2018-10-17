<?php

get_header();
  while ( have_posts() ) : the_post(); ?>

  <section class="pt-nav lg:pt-0">
    <div class="wrapper-sm">
      <h1 class="career-title pt-jumbo md:text-3xl pb-3"><?php the_title(); ?></h1>
      <div class="general-share pb-8">
        <p class="mb-2"><strong>Share This:</strong></p>
        <?php if ( is_active_sidebar( 'share-widget-area' ) ) : ?>
            <?php dynamic_sidebar( 'share-widget-area' ); ?>
        <?php endif; ?>
      </div>
      <div class="general-content career-content">
        <?php the_content(); ?>
      </div>
      <div class="flex flex-col md:flex-row items-center pb-8">
        <div class="w-full md:w-auto pt-4 pb-8 md:py-8 md:mr-6 flex justify-between general-pagination">
          <?php previous_post_link( '%link', 'Prev Job' ); ?>
          <?php next_post_link( '%link', 'Next Job' ); ?>
        </div>
        <a class="button-link-primary mb-8 md:mb-0" href="<?php echo home_url( '/career' ); ?>">Back To Careers</a>
      </div>
    </div>
  </section>

  <?php endwhile;
get_footer();