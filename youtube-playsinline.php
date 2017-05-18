<?php
/**
 * Plugin Name: VA YouTube Playsinline
 * Plugin URI: https://github.com/visualive/va-youtube-playsinline
 * Description: Play YouTube videos inline on iOS.
 * Author: KUCKLU
 * Version: 1.0.0
 * Author URI: https://www.visualive.jp/
 * Text Domain: va-youtube-playsinline
 * Domain Path: /langs
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 *
 * @package    WordPress
 * @subpackage VA YouTube Playsinline
 * @since      1.0.0
 * @author     KUCKLU <oss@visualive.jp>
 * @licenses   GNU General Public License v3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Play YouTube video inline on iOS.
 */
add_filter( 'oembed_dataparse', function ( $return, $data ) {
	if ( is_object( $data ) && 'YouTube' === $data->provider_name && ! empty( $data->html ) && is_string( $data->html ) ) {
		$return = preg_replace( '/src="([^"]+)"/', 'src="$1&playsinline=1"', $data->html );
	}

	return $return;
}, 10, 2 );
