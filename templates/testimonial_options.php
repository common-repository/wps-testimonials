<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php
$page_url =  admin_url( 'edit.php?post_type=wps_tc_testimonials&page=wps_tc_testimonial_options' );
if ( isset( $_POST['wps-testimonials-carousel-options_nonce_field'] )  && wp_verify_nonce( $_POST['wps-testimonials-carousel-options_nonce_field'], 'wps-testimonials-carousel-options_nonce_action' ) )
{
if($_POST['submit'])
{

$aVals =  array_map( 'sanitize_text_field', wp_unslash( $_POST['val'] ) ); 
  


$datevalue1 =$aVals['wps_tc_testimonials_date']; 

if ($datevalue1=='') {  
$aVals['wps_tc_testimonials_date'] ='';

}

if ($datevalue1=='') {  
$aVals['wps_tc_testimonials_date'] ='';

}

$datevalue2 =$aVals['wps_tc_testimonials_countery']; 
if ($datevalue2=='') {  
$aVals['wps_tc_testimonials_countery'] ='';

}

$datevalue3 =$aVals['wps_tc_testimonials_auto_play']; 
if ($datevalue3=='') {  
$aVals['wps_tc_testimonials_auto_play'] ='';

}

$datevalue4 =$aVals['wps_tc_testimonials_navigation']; 
if ($datevalue4=='') {  
$aVals['wps_tc_testimonials_navigation'] ='';

}

$datevalue5 =$aVals['wps_tc_testimonials_dots']; 
if ($datevalue5=='') {  
$aVals['wps_tc_testimonials_dots'] ='';

}


  foreach($aVals as $aKey => $aVal)
  {

 update_option($aKey,$aVal);
   
   
     }
   
}
}
$wps_tc_testimonials_width = get_option("wps_tc_testimonials_width");
$wps_tc_testimonials_countery = get_option("wps_tc_testimonials_countery");
$wps_tc_testimonials_image_size = get_option("wps_tc_testimonials_image_size");

$wps_tc_testimonials_slidesToShow = get_option("wps_tc_testimonials_slidesToShow"); 
$wps_tc_testimonials_slidesToScroll = get_option("wps_tc_testimonials_slidesToScroll");
$wps_tc_testimonials_navigation = get_option("wps_tc_testimonials_navigation");
$wps_tc_testimonials_dots = get_option("wps_tc_testimonials_dots");
$wps_tc_testimonials_auto_play =  get_option("wps_tc_testimonials_auto_play"); 
$wps_tc_testimonials_auto_play_speed = get_option("wps_tc_testimonials_auto_play_speed");

?>


<div class="wrap-wps_tc_testimonials">
  <h1 class="wps_tc_heading">General Options </h1>

  <form action="" method="post" enctype="multipart/form-data" name="wps-testimonials-carousel-options">
  <?php wp_nonce_field( 'wps-testimonials-carousel-options_nonce_action', 'wps-testimonials-carousel-options_nonce_field' ); ?>
    
          <input type="hidden" value="<?php echo $id; ?>"  name="val[id]"/>
         <table class="form-table">
          <tr>
            <th scope="row" class="titledesc">  <label for="wps_tc_testimonials_width">Max Carousel  Width</label></th> 
            <td> <input name="val[wps_tc_testimonials_width]" id="wps_tc_testimonials_width" type="text" style="min-width:50px;" value="<?php  echo 
            $wps_tc_testimonials_width; ?>" class="" placeholder="400px"> </td>
          </tr>

      


          <tr>
            <th scope="row" class="titledesc">  <label for="wps_tc_testimonials_countery">Show Countery</label></th> 
            <td> <input name="val[wps_tc_testimonials_countery]" id="wps_tc_testimonials_countery" type="checkbox" value="yes" class=""  <?php if ($wps_tc_testimonials_countery=='yes') { echo "checked";   } ?>> Yes </td>
          </tr>

          
          <tr>
            <th scope="row" class="titledesc">  <label for="wps_tc_testimonials_slidesToShow">Slides To Show</label></th> 
            <td> <input name="val[wps_tc_testimonials_slidesToShow]" id="wps_tc_testimonials_slidesToShow" type="text" value="<?php  echo 
            $wps_tc_testimonials_slidesToShow; ?>" class="" placeholder="Slides To Show">  </td>
          </tr>

            <tr>
            <th scope="row" class="titledesc">  <label for="wps_tc_testimonials_slidesToScroll">Slides To Scroll</label></th> 
            <td> <input name="val[wps_tc_testimonials_slidesToScroll]" id="wps_tc_testimonials_slidesToScroll" type="text" value="<?php  echo $wps_tc_testimonials_slidesToScroll; ?>" class="" placeholder="Slides To Scroll">  </td>
          </tr>

            <tr>
            <th scope="row" class="titledesc">  <label for="wps_tc_testimonials_navigation">Carousel Arrows</label></th> 
            <td> <input name="val[wps_tc_testimonials_navigation]" id="wps_tc_testimonials_navigation" type="checkbox" value="true" class=""  <?php if ($wps_tc_testimonials_navigation=='true') { echo "checked";   } ?>> Yes </td>
            </tr>

             <tr>
            <th scope="row" class="titledesc">  <label for="wps_tc_testimonials_dots">Carousel Dots</label></th> 
            <td> <input name="val[wps_tc_testimonials_dots]" id="wps_tc_testimonials_dots" type="checkbox" value="true" class=""  <?php if ($wps_tc_testimonials_dots=='true') { echo "checked";   } ?>> Yes </td>
            </tr>

          <tr>
            <tr>
            <th scope="row" class="titledesc">  <label for="wps_tc_testimonials_auto_play">Carousel Auto Play</label></th> 
            <td> <input name="val[wps_tc_testimonials_auto_play]" id="wps_tc_testimonials_auto_play" type="checkbox" value="true" class=""  <?php if ($wps_tc_testimonials_auto_play=='true') { echo "checked";   } ?>> Yes </td>
          </tr>

            <th scope="row" class="titledesc">  <label for="wps_tc_testimonials_auto_play_speed">Carousel Auto Play Speed</label></th> 
            <td> <input name="val[wps_tc_testimonials_auto_play_speed]" id="wps_tc_testimonials_auto_play_speed" type="text" style="min-width:50px;" value="<?php  echo  $wps_tc_testimonials_auto_play_speed; ?>" class="" placeholder="8000"> </td>
          </tr>

          <tr>
            <th scope="row" class="titledesc">  <label for="wps_tc_testimonials_image_size">Testimonial Image Size</label></th> 
            <td> <input name="val[wps_tc_testimonials_image_size]" id="wps_tc_testimonials_image_size" type="text" style="min-width:50px;" value="<?php  echo 
            $wps_tc_testimonials_image_size; ?>" class="" placeholder="150px"> </td>
          </tr>
   </table>
    <p class="submit"><input type="submit" value="<?php echo  _e('Save Changes', ''); ?>" class="button button-primary" id="submit" name="submit"></p>
  </form>

</div> 
