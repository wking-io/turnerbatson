<?php

$tb_comany_address = get_field( 'tb_company_address', 'options' );
$tb_comany_phone = get_field( 'tb_company_phone', 'options' );
$tb_comany_fax = get_field( 'tb_company_fax', 'options' );
$tb_comany_email = get_field( 'tb_company_email', 'options' );
$tb_form_header = get_field( 'tb_form_header');
$tb_form_description = get_field( 'tb_form_description' );

get_header(); ?>

<section class="bg-black text-white min-h-screen pt-jumbo lg:flex lg:flex-row-reverse lg:justify-between">
  <div class="connect-form lg:w-2/5 px-8 pb-8">
    <h1 class="mb-6 text-2xl uppercase"><?php echo $tb_form_header; ?></h1>
    <div class="leading-normal mb-8"><?php echo $tb_form_description; ?></div>
    <?php gravity_form( 1, false, false, false, '', false ); ?>
  </div>
  <div class="flex-1 relative">
    <div class="connect-map lg:h-full">
      <?php echo do_shortcode( '[huge_it_maps id="1"]' ); ?>
    </div>
    <div class="connect-info lg:absolute lg:pin-t lg:pin-r">
      <address class="bg-primary p-8">
        <p class="mb-6 lg:mb-8 font-bold roman"><?php echo $tb_comany_address; ?></p>
        <p class="mb-1 roman">Phone:</p>
        <p class="mb-6 lg:mb-8 font-bold roman"><a class="text-white no-underline hover:underline" href="tel:<?php echo $tb_comany_phone; ?>"><?php echo $tb_comany_phone; ?></a></p>
        <p class="mb-1 roman">Fax:</p>
        <p class="mb-6 lg:mb-8 font-bold roman text-white"><?php echo $tb_comany_fax; ?></p>
        <p class="mb-1 roman">Email:</p>
        <p class="font-bold roman"><a class="text-white no-underline hover:underline" href="mailto:<?php echo $tb_comany_email; ?>"><?php echo $tb_comany_email; ?></a></p>
      </address>
      <div class="hidden lg:inline-block connect-social">
        <?php if ( is_active_sidebar( 'social-widget-area' ) ) : ?>
            <?php dynamic_sidebar( 'social-widget-area' ); ?>
        <?php endif; ?></div>
    </div>
  </div>
</section>

<?php get_footer();