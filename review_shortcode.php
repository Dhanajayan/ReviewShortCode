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
}


add_action( 'init' , 'review_register_resources');

// Then we define our shortcode and enqueue the resources
function review_show() {

	wp_enqueue_style("review-style");

	$data = '<div id="review-div"><h1>Hello World</h1></div>';

	return $data;
}

// adding shortcode plugin begin here
add_shortcode( 'reviewsec' , 'review_show');

