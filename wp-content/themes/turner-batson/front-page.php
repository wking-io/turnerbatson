<?php

get_header();



?>

<section data-section data-make-menu="dark">
  <?php 
    echo cl_video_tag( "samples_elephants", 
      array(
        "controls" => true,
        "fallback_content" => "Your browser does not support HTML5 video tags"
      )
    ); 
  ?>
</section>

<?php get_footer();