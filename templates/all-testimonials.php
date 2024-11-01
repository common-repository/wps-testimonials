<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php
   $wps_tc_testimonials_width = $aVars['wps_tc_testimonials_width'];
  $wps_tc_testimonials_countery =get_option('wps_tc_testimonials_countery');
   $wps_tc_testimonials_image_size = $aVars['wps_tc_testimonials_image_size'];
   $args = array( 'post_type' => 'wps_tc_testimonials', 'posts_per_page' => -1,);
   $loop = new WP_Query( $args );  ?>
<div class="contaissner wpstestimonials" style="width:<?php echo $wps_tc_testimonials_width; ?>">
   <div class="wrapperslider">
      <div class="StyleOneTimonials">
         <?php
            while ( $loop->have_posts() ) : $loop->the_post(); ?>
         <?php $wps_tc_country =  get_post_meta( get_the_ID(), 'wps_tc_country' , true ); ?>
         <?php $wps_tc_city =  get_post_meta( get_the_ID(), 'wps_tc_city' , true ); 
            if (isset($wps_tc_city) && $wps_tc_city!='' && $wps_tc_country!='' ) {
              $spquote = ', ';
            }else {
              $spquote = '';
            }
             ?>
         <div>
            <div class="inrtesticon">
               <div class="featuredimage"> 
                  <img  style="width: <?php echo   $wps_tc_testimonials_image_size; ?>; height:  <?php echo   $wps_tc_testimonials_image_size; ?>; " src="<?php the_post_thumbnail_url('full'); ?>">
               </div>
               <div class="nametitle"> <?php the_title(); ?></div>
                    <?php if ($wps_tc_testimonials_countery=='yes') { ?>  <div class="designation"><?php echo $wps_tc_city.''.$spquote.''.$wps_tc_country; ?> </div> <?php }  ?>
                <div class="contenteps"><?php the_content(); ?> </div>
            </div>
         </div>
         <?php  endwhile; ?>
      </div>
   </div>
</div>
<?php wp_reset_query(); ?>