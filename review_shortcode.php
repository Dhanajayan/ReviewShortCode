<?php
/*
Plugin Name: Review Shortcode
Version: 1.0
Plugin URI: http://dhananjayan.me
Description: Easy shortcode to insert reviews and emoji inside posts in wordpress
Author: Dhananjayan
Author URI: http://dhananjayan.me

Copyright 2013

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/



//First we enqueue style sheet

wp_enqueue_style('reviews_style', plugin_dir_url( __FILE__ ) . 'css/style.css');



// Then we define our shortcode and enqueue the resources
function reviews_show( $atts, $content=null) {

	

	//extracting the shortcode_atts array
	extract( shortcode_atts( array(
			'rating'	=>	'#',
			'reaction'	=>	'reaction',
			), $atts) );

	
	//It stores the emoji from plugin directory
	switch( $reaction ) {
		case 'wow':
			$emoji = plugins_url('img/wow.png', __FILE__ );
			break;

		case 'meh':
			$emoji = plugins_url('img/meh.png', __FILE__ );
			break;

		case 'bad':
			$emoji = plugins_url('img/bad.png', __FILE__ );
			break;
	}
	

	//get the post thumbnail and return to variable

	$postval = get_the_post_thumbnail();
	$reviewphoto = '<div id="review-div"><div class="hexagon"><span></span></div>
	<div id="rate"><h1>'.$rating.'</h1></div>	<div id="review-thumb">' . $postval . '</div><div id="review-react"><img src="'. $emoji . '" style="z-index: 3;"></img><h1>'. $reaction . '</h1></div>';
	$reviewphoto .= '</div>';


	return $reviewphoto;
}

// adding shortcode plugin begin here
add_shortcode( 'reviews' , 'reviews_show');

// Enqueue JQuery
add_action( 'admin_enqueue_scripts', 'reviews_enqueue_admin_scripts' );
function reviews_enqueue_admin_scripts() {
	wp_enqueue_script( 'jquery' );
}

//registering and adding tinyMCE
add_action( 'init', 'reviews_buttons');
function reviews_buttons() {
	add_filter( "mce_external_plugins", "reviews_add_buttons");
	add_filter( 'mce_buttons', 'reviews_register_buttons');
}

function reviews_add_buttons( $plugin_array ) {

	global $current_screen;

	$type = $current_screen->post_type;

	if( is_admin() && ( $type == 'post' || $type == 'page' ) ) {
		$plugin_array['reviews'] = plugins_url('review_shortcode_plugin.js',__FILE__);
	}
	
	return $plugin_array;
}

function reviews_register_buttons( $buttons ) {

	global $current_screen;

	$type = $current_screen->post_type;

	if( is_admin() && ( $type == 'post' || $type == 'page' ) ) {
		array_push( $buttons, 'addreviews');
	}
	
	return $buttons;
}

// Save Data to pass to TinyMCE
add_action( 'admin_head', 'reviews_save_tinymce_data');

function reviews_save_tinymce_data() {
	?>

	<script type="text/javascript">
		var reviews_data = {
			'php_version': '<?php echo phpversion(); ?>'
		};
	</script>
	<?php
}
