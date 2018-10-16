<?php

$tb_career_bg = get_field( 'tb_career_bg', 'options' );

get_header(); ?>

<section class="min-h-screen pt-nav lg:pt-0 flex flex-col lg:flex-row">
  <div class="aspect-16:9 lg:w-1/3 bg-cover bg-no-repeat bg-center" style="background-image: url('<?php echo $tb_career_bg; ?>');"></div>
  <div class="wrapper-sm lg:px-8 py-8 flex-1 flex flex-col justify-center lg:justify-end mb-8">
    <?php echo job_content(); ?>
  </div>
</section>

<?php get_footer();