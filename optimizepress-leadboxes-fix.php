<?php

/**
 *
 * @link              http://www.optimizepress.com/
 * @since             1.0.0
 * @package           Op_LeadBoxes_Fix
 *
 * @wordpress-plugin
 * Plugin Name:       OptimizePress LeadBoxes plugin fix
 * Plugin URI:        http://www.optimizepress.com/
 * Description:       Fix for LeadBoxes plugin adding their code to every OptimizePress element
 * Version:           1.0.0
 * Author:            OptimizePress
 * Author URI:        http://www.optimizepress.com/
 * Text Domain:       op-leadboxes-fix
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

add_filter('the_content' , 'opFixLeadBoxes', 11);

/**
 * Remove LeadBoxes the_content filter if it was run on OP pages
 *
 * @param $content
 *
 * @return mixed
 */
function opFixLeadBoxes($content)
{
	if (defined('OP_VERSION')) {
		global $post;

		if (is_le_page($post->ID)) {
			remove_filter('the_content', 'lp_leadbox_add');
		}
	}

	return $content;
}