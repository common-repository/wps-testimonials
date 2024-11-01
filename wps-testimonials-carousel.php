<?php
/**
 * Plugin Name: Best  Testimonials Slider
 * Plugin URI: http://d3logics.com/plugins/testimonials-plugin
 * Description:  Display testimonials in carousel
 * Version: 5.9.2
 * Author: Vinit Sharma, D3logics
 * Author URI: http://d3logics.com
 * Text Domain: wps-testimonials-carousel
 * Requires: 3.7 or higher
 * License: GPLv2 or later
 *
 * Copyright 2019 D3 Logics   d3logicsindia@gmail.com
 *
 * Best  Testimonials Slider is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * Best  Testimonials Slider is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 */
 if ( ! defined( 'ABSPATH' ) ) exit; 
class wps_tc_TC_TESTIMONIALS_CAROUSEL
{
	public $aParams;
	public $aTesti;	
	public function __construct()
	{	



      /** Global Varibles **/      
      if (get_option("wps_tc_testimonials_slidesToShow")) {
      	$this->aParams['wps_tc_testimonials_slidesToShow']  = get_option("wps_tc_testimonials_slidesToShow");
      }

      if (get_option("wps_tc_testimonials_slidesToScroll")) {
      	$this->aParams['wps_tc_testimonials_slidesToScroll']  = get_option("wps_tc_testimonials_slidesToScroll");
      }

      if (get_option("wps_tc_testimonials_navigation")) {
      	$this->aParams['wps_tc_testimonials_navigation']  = get_option("wps_tc_testimonials_navigation");
      }

      if (get_option("wps_tc_testimonials_dots")) {
      	$this->aParams['wps_tc_testimonials_dots']  = get_option("wps_tc_testimonials_dots");
      }

      if (get_option("wps_tc_testimonials_width")) {
      	$this->aParams['wps_tc_testimonials_width']  = get_option("wps_tc_testimonials_width");
      }
      if (get_option("wps_tc_testimonials_image_size")) {
      	$this->aParams['wps_tc_testimonials_image_size']  = get_option("wps_tc_testimonials_image_size");
      }
       if (get_option("wps_tc_testimonials_category")) {
      	$this->aParams['wps_tc_testimonials_category']  = get_option("wps_tc_testimonials_category");
      }
       if (get_option("wps_tc_testimonials_auto_play")) {
      	$this->aParams['wps_tc_testimonials_auto_play']  = get_option("wps_tc_testimonials_auto_play");
      }
       if (get_option("wps_tc_testimonials_auto_play_speed")) {
      	$this->aParams['wps_tc_testimonials_auto_play_speed']  = get_option("wps_tc_testimonials_auto_play_speed");
      }
	  
    
      
  	  add_shortcode('wps_tc_testimonials_slider', array($this,'wps_tc_Testimonials_fun'));
  	  add_shortcode('wps_tc_testimonials_slider_style2', array($this,'wps_tc_Testimonials_style2_fun'));
	  add_action( 'init', array(&$this,'testimonials_post_type' ) );
	  add_action( 'init', array(&$this,'testimonials_category' ));
	  add_action( 'admin_menu', array($this, 'add_wps_tc_testimonials_admin_menu'));
	  add_action( 'add_meta_boxes',  array(&$this,'add_tbs_fields_meta_box' ) ) ;
	  add_action( 'save_post',  array(&$this,'save_tbs_fields_meta' ), 10, 2);
		

	  //add css and js
	  //add_action( 'wp_footer', array(&$this,'wps_tc_testimonials_css_and_js'));
	  add_action( 'wp_head', array($this, 'wps_tc_testimonials_css'), 20 );	 
	  add_action( 'wp_head', array(&$this,'wps_tc_global_option_js'));
	  add_action( 'wp_footer', array($this, 'wps_tc_testimonials_js'));

    }
      
    public function wps_tc_global_option_js($aParams = array()) { 

	 $slidesToShow = $this->aParams['wps_tc_testimonials_slidesToShow'];
	 $slidesToScroll = $this->aParams['wps_tc_testimonials_slidesToScroll'];
	 $SliderArrows = $this->aParams['wps_tc_testimonials_navigation'];
	 $SliderDots = $this->aParams['wps_tc_testimonials_dots']; 
	$SliderAutoPlay = $this->aParams['wps_tc_testimonials_auto_play'];
	 $SliderAutoPlaySpeed = $this->aParams['wps_tc_testimonials_auto_play_speed']; 

	if ($slidesToShow=='') { $slidesToShow=1; }
	if ($slidesToScroll=='') { $slidesToScroll=1; }
	if ($SliderArrows=='') { $SliderArrows= 'false'; }
	if ($SliderDots=='') { $SliderDots= 'false'; }
	if ($SliderAutoPlay=='') { $SliderAutoPlay= 'false'; }
	if ($SliderAutoPlaySpeed=='') { $SliderAutoPlaySpeed= '2000'; }
    ?>


    <script type="text/javascript">  	 		
 	var slidesToShow = <?php echo $slidesToShow; ?>;
 	var slidesToScroll = <?php echo $slidesToScroll; ?>;
  	var SliderArrows = <?php echo $SliderArrows; ?>;
  	var SliderDots = <?php echo $SliderDots; ?>;
  	var SliderAutoPlay = <?php echo $SliderAutoPlay; ?>;
  	var SliderAutoPlaySpeed = <?php echo $SliderAutoPlaySpeed; ?>;

   </script>

    <?php  }


            //include js and css
		 public function wps_tc_testimonials_js()		   {

		    wp_enqueue_script('wps-script-js', plugins_url( 'src/js/script.js', __FILE__ ) );

		  }

		              //include js and css
		 public function wps_tc_testimonials_css()
		   {
		    
		    wp_enqueue_style('wps-style-css', plugins_url( 'src/css/style.css', __FILE__ ) );
		    wp_enqueue_style('wps-slick.min-css', plugins_url( 'src/css/slick.min.css', __FILE__ ) );
		    wp_enqueue_style('wps-slick-css', plugins_url( 'src/css/slick-theme.css', __FILE__ ) );

		  }

     

      //Add Admin Menu

         public function add_wps_tc_testimonials_admin_menu()
			{
				
				add_submenu_page('edit.php?post_type=wps_tc_testimonials','Testimonials Options', 'Testimonials Options', 'manage_options', 'wps_tc_testimonial_options',array($this, 'wps_tc_testimonials_options'));
				add_submenu_page('edit.php?post_type=wps_tc_testimonials','Testimonials Shortcode', 'Testimonials Shortcode', 'manage_options', 'wps_tc_testimonial_shortcode',array($this, 'wps_tc_testimonials_shortcode'));
			}

		  public function wps_tc_testimonials_options()
			{	
				//eturn $this->set_template('testimonial_options',$aParams,'admin','Testimonials Options');
				$this->set_template('testimonial_options');
			}

			public function wps_tc_testimonials_shortcode()
			{	
				//eturn $this->set_template('testimonial_options',$aParams,'admin','Testimonials Options');
				$this->set_template('testimonials_shortcode');
			}



         // Add Shortcode Testimonials Style 1
		    public function wps_tc_Testimonials_fun($aParams = array())
			{
				ob_start();
				$this->set_template('all-testimonials');
				return ob_get_clean();

			}
			
			  public function wps_tc_Testimonials_style2_fun($aParams = array())
			{
				ob_start();
				$this->set_template('testimonials-2');
				return ob_get_clean();
			}
			

		
		
           
	      //add custom testimonials

		 function testimonials_post_type() {		 
		// Set UI labels for Custom Post Type
		    $labels = array(
		        'name'                => _x( 'Testimonials', 'Post Type General Name', 'wps_tc_testimonials' ),
		        'singular_name'       => _x( 'Testimonial', 'Post Type Singular Name', 'wps_tc_testimonials' ),
		        'menu_name'           => __( 'Testimonials', 'wps_tc_testimonials' ),
		        'parent_item_colon'   => __( 'Parent Testimonial', 'wps_tc_testimonials' ),
		        'all_items'           => __( 'All Testimonials', 'wps_tc_testimonials' ),
		        'view_item'           => __( 'View Testimonial', 'wps_tc_testimonials' ),
		        'add_new_item'        => __( 'Add New Testimonial', 'wps_tc_testimonials' ),
		        'add_new'             => __( 'Add New', 'wps_tc_testimonials' ),
		        'edit_item'           => __( 'Edit Testimonial', 'wps_tc_testimonials' ),
		        'update_item'         => __( 'Update Testimonial', 'wps_tc_testimonials' ),
		        'search_items'        => __( 'Search Testimonial', 'wps_tc_testimonials' ),
		        'not_found'           => __( 'Not Found', 'wps_tc_testimonials' ),
		        'not_found_in_trash'  => __( 'Not found in Trash', 'wps_tc_testimonials' ),
		    );
		     
		// Set other options for Custom Post Type
		     
		    $args = array(
		        'label'               => __( 'testimonials', 'wps_tc_testimonials' ),
		        'description'         => __( 'testimonial news and reviews', 'wps_tc_testimonials' ),
		        'labels'              => $labels,
		        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
		        'taxonomies'          => array( 'genres' ),		        
		        'hierarchical'        => false,
		        'public'              => false,
		        'show_ui'             => true,
		        'show_in_menu'        => true,
		        'show_in_nav_menus'   => false,
		        'show_in_admin_bar'   => true,
		        'menu_position'       => 5,
		        'can_export'          => true,
		        'has_archive'         => false,
		        'exclude_from_search' => true,
		        'publicly_queryable'  => false,
		        'capability_type'     => 'page',
		        'menu_icon'     => 'dashicons-editor-quote',
		        "supports" => array( "title", "editor", "thumbnail" ),

		    );
		     
		    // Registering your Custom Post Type
		    register_post_type( 'wps_tc_testimonials', $args );
		 
		   }

          //add countery countery

         function testimonials_category() 
         {
          register_taxonomy('testimonials_category','wps_tc_testimonials',array('label' => __( 'Testimonials Category' ),'rewrite' => array( 'slug' => 'testimonials_category' ),'hierarchical' => true,));
          }

	

	public function set_template($aTemplate,$aOpts = array(),$aView = '',$aTitle = '')
	{
		$aParams['view'] = $aView;
		$aParams['title'] = $aTitle;
		$aVars = $aOpts ? array_merge($this->aParams,$aOpts) : $this->aParams;
		include "templates/{$aTemplate}.php";		
		
		
	}

   public function add_tbs_fields_meta_box()
	{
		$aParams = array();
		$this->set_template('create-custom-fields',$aParams,'front','');
	}

	public function show_tbs_fields_meta_box()
	{
		$aParams = array();
		$this->set_template('show-custom-fields',$aParams,'front','');
	}

	public function save_tbs_fields_meta($post_id, $post)
	{
		if ( $post->post_type == 'wps_tc_testimonials' ) {
		    if ( isset( $_POST['tbs_fields'] ) ) {
		    	
		        foreach( $_POST['tbs_fields'] as $key => $value ){
		            update_post_meta( $post_id, $key, $value );
		        }
		    }
		}
	}

	
}

$wpsObj = new wps_tc_TC_TESTIMONIALS_CAROUSEL;

