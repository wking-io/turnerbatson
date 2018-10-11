<?php

$is_video = get_field( 'is_culture_hero_a_video' );
$tb_hero_content = $is_video ? get_field( 'tb_culture_hero_video' ) : get_field( 'tb_culture_hero_img' );
$tb_culture_hero_heading = get_field( 'tb_culture_hero_heading' );
$tb_culture_scroll_text = get_field( 'tb_culture_scroll_text' );
$tb_culture_content_heading = get_field( 'tb_culture_content_heading' );
$tb_culture_content_description = get_field( 'tb_culture_content_description' );
$tb_culture_people_description = get_field( 'tb_culture_people_description' );
$tb_culture_passion_description = get_field( 'tb_culture_passion_description' );
$tb_culture_purpose_description = get_field( 'tb_culture_purpose_description' );
$tb_culture_content_img = get_field( 'tb_culture_content_img' );

$tb_culture_ps = array(
  'people' => $tb_culture_people_description,
  'passion' => $tb_culture_passion_description,
  'purpose' => $tb_culture_purpose_description
);

get_header(); ?>

<section>
  <div>
    <div></div>
    <h1></h1>
  </div>
  <div></div>
</section>

<section>
  <div>
    <h2><?php echo $tb_culture_content_heading; ?></h2>
    <div><?php echo $tb_culture_content_description; ?></div>
    <ul>
      <?php foreach ( $tb_culture_ps as $name => $content ) : ?>
        <li>
          <h3><?php echo $name; ?></h3>
          <p><?php echo $content; ?></p>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
  <div>
    <img src="<?php echo $tb_culture_content_img; ?>" alt="Culture Image">
  </div>
  <div>
    <?php echo job_content(); ?>
  </div>
</section>

<?php get_footer();