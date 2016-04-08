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

//wp_enqueue_style('source_style', plugin_dir_url( __FILE__ ) . 'css/style.css');

//First we register our resources using the init hook

function review_register_resources() {
		//wp_register_script("review-script", plugins_url("js/script.js"), __FILE__), array(), "1.0", false);

	wp_register_style("review-style", plugins_url("css/style.css", __FILE__), array(), "1.0", "all");

	//adding filter for add_buttons and register buttons
/**	add_filter( "mce_external_plugins", "reviews_add_buttons");
	add_filter( "mce_buttons", "reviews_register_buttons"); */
}


add_action( 'init' , 'review_register_resources');

// Then we define our shortcode and enqueue the resources
function review_show( $atts, $content = null) {

	wp_enqueue_style("review-style");

	//extracting the shortcode_atts array
	extract( shortcode_atts( array(
			'rating'	=>	'#',
			'reaction'	=>	'reaction',
			), $atts) );

	//get the post thumbnail and return to variable

	$emoji = plugins_url('img/happy.png', __FILE__ );
	$postval = get_the_post_thumbnail();
	$reviewphoto = '<div id="review-div"><div id="review-thumb">' . $postval . '</div><div id="review-react"><img src="'. $emoji . '"></img><h3>wow</h3></div></div>';


	return $reviewphoto;
}

// adding shortcode plugin begin here
add_shortcode( 'reviewsec' , 'review_show');


/**function reviews_add_buttons( $plugin_array ) {
	$plugin_array['reviews'] = plugins_url('reviews_shortcode_plugin.js', __FILE__);
	return $plugin_array;
}


function reviews_register_buttons( $buttons ) {
	array_push( $buttons, 'add reviews');
	return $buttons;
} */


?>