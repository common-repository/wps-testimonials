<?php 
add_meta_box(
	'tbs_fields_meta_box', // $id
	'User  Extra informations', // $title
	array($this,'show_tbs_fields_meta_box'), // $callback
	'wps_tc_testimonials', // $screen
	'normal', // $context
	'high' // $priority
);
?>