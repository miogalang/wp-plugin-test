<?php
/**
 * @package Awesome
 * @version 1.1
 */
/*
Plugin Name: Awesome MGalang
Plugin URI: http://wordpress.org/extend/plugins/awesome-mgalang/
Description: Everything is awesome
Author: Mio Galang
Version: 1.1
*/

function get_expression() {
    return 'Everything is awesome yahoo!';
}

// This just echoes the chosen line, we'll position it later
function awesome_text() {
	$chosen = get_expression();
	echo "<p id='awesome'>$chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'awesome_text' );

// We need some CSS to position the paragraph
function awesome_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#awesome {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}

add_action( 'admin_head', 'awesome_css' );

?>
