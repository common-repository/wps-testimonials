<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php
    $wps_tc_testimonials_countery =get_option('wps_tc_testimonials_countery');
      ?>
<section class="custom-post-slider2 testimonial.element-ten">
   <?php
      $args = array( 'post_type' => 'wps_tc_testimonials', 'posts_per_page' => -1);
      
      $loop = new WP_Query( $args );
      
      if ( $loop->have_posts() ) :
      
        while ( $loop->have_posts() ) : $loop->the_post();   ?>
   <?php $wps_tc_country =  get_post_meta( get_the_ID(), 'wps_tc_country' , true ); ?>
   <?php $wps_tc_city =  get_post_meta( get_the_ID(), 'wps_tc_city' , true ); 
      if (isset($wps_tc_city) && $wps_tc_city!='' && $wps_tc_country!='' ) {
        $spquote = ', ';
      }else {
        $spquote = '';
      }
       ?>
   <div>
      <div class="testimonial-item ">
         <div class="holder matchHeight">
            <div class="testimonial-data"><?php the_content(); ?></div>
            <div class="testimonial-title">
               <div class="testimonial-title-pic"><img width="150" height="150" src="<?php the_post_thumbnail_url('full'); ?>" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="testimo-03" data-no-retina=""></div>
               <div class="testimonial-title-data">
                  <p class="title"><?php the_title(); ?></p>
                  <?php if ($wps_tc_testimonials_countery=='yes') { ?>  <div class="designation"><?php echo $wps_tc_city.''.$spquote.''.$wps_tc_country; ?> </div> <?php }  ?>
               </div>
            </div>
         </div>
      </div>
   </div>
   <?php  endwhile; 
      wp_reset_query(); 
      endif; ?>
</section>
<?php wp_reset_query(); ?>