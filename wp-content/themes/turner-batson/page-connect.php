<?php

$tb_comany_address = get_field( 'tb_company_address', 'options' );
$tb_comany_phone = get_field( 'tb_company_phone', 'options' );
$tb_comany_fax = get_field( 'tb_company_fax', 'options' );
$tb_comany_email = get_field( 'tb_company_email', 'options' );
$tb_form_header = get_field( 'tb_form_header');
$tb_form_description = get_field( 'tb_form_description' );

get_header(); ?>

<section class="bg-black text-white min-h-screen pt-jumbo ">
  <div class="connect-form px-8">
    <h1 class="mb-6 text-2xl uppercase"><?php echo $tb_form_header; ?></h1>
    <div class="leading-normal"><?php echo $tb_form_description; ?></div>
    <?php gravity_form( 1, false, false, false, '', false ); ?>
  </div>
  <div>
    <div class="connect-map">
      <?php echo do_shortcode( '[huge_it_maps id="1"]' ); ?>
    </div>
    <div>
      <address class="bg-primary p-8">
        <p class="mb-6 font-bold roman"><?php echo $tb_comany_address; ?></p>
        <p class="mb-1 roman">Phone:</p>
        <p class="mb-6 font-bold roman"><a class="text-white no-underline hover:underline" href="tel:<?php echo $tb_comany_phone; ?>"><?php echo $tb_comany_phone; ?></a></p>
        <p class="mb-1 roman">Fax:</p>
        <p class="mb-6 font-bold roman"><?php echo $tb_comany_fax; ?></p>
        <p class="mb-1 roman">Email:</p>
        <p class="font-bold roman"><a class="text-white no-underline hover:underline" href="mailto:<?php echo $tb_comany_email; ?>"><?php echo $tb_comany_email; ?></a></p>
      </address>
      <div class="hidden lg:block">
        <?php if ( is_active_sidebar( 'social-widget-area' ) ) : ?>
            <?php dynamic_sidebar( 'social-widget-area' ); ?>
        <?php endif; ?></div>
    </div>
  </div>
</section>

<?php get_footer();