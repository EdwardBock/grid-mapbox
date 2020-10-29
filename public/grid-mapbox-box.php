<?php
/**
 * Plugin Name: Grid Mapbox Box
 * Plugin URI: https://github.com/EdwardBock/grid-mapbox-box
 * Description: Provides a Mapbox Box for Grid.
 * Version: 1.0
 * Author: Edward Bock <me@edwardbock.de>
 * Author URI: http://www.edwardbock.de
 * Requires at least: 4.0
 * Tested up to: 4.1
 * License: http://www.gnu.org/licenses/gpl-2.0.html GPLv2
 *
 * @copyright Copyright (c) 2015, Edward Bock
 * @package PublicFunctionOrg\Grid\Mapbox
 */

namespace PublicFunctionOrg\Grid\Mapbox;

add_action( "grid_load_classes", function () {

	$access_token = ( defined( 'GRID_MAPBOX_ACCESS_TOKEN' ) ) ? GRID_MAPBOX_ACCESS_TOKEN : "";

	wp_enqueue_script(
		'grid-box-mapbox-script',
		plugins_url( '/js/mapbox.js', __FILE__ ),
		array( 'jquery' ),
		filemtime(plugin_dir_path(__FILE__).'/js/mapbox.js'),
        true
	);
	wp_localize_script(
		'grid-box-mapbox-script',
		'GridBoxMapBox',
		array(
			'accessToken' => apply_filters( 'grid_mapbox_access_token', $access_token ),
		)
	);
	wp_enqueue_style(
		'grid-box-mapbox-css',
		plugins_url( '/css/mapbox.css', __FILE__ ),
        [],
        filemtime(plugin_dir_path(__FILE__)."/css/mapbox.css")
	);
	wp_enqueue_style(
		'grid-box-mapbox-gl-css',
		plugins_url( '/css/mapbox-gl.css', __FILE__ ),
		[],
		filemtime(plugin_dir_path(__FILE__)."/css/mapbox-gl.css")
	);

	require dirname( __FILE__ ) . "/boxes/grid-mapbox-box.inc";
} );


add_filter( "grid_editor_widgets", function ( $widgets ) {
	$widgets["js"]["widget"]  = plugins_url( "/editor-widgets/coordinates.js", __FILE__ );
	$widgets["css"]["widget"] = plugins_url( "/editor-widgets/coordinates.css", __FILE__ );

	return $widgets;
} );


add_filter( "grid_templates_paths", function ( $paths ) {
	$paths[] = dirname( __FILE__ ) . "/templates";

	return $paths;
} );


add_action( 'wp_head', function () {
	?>
    <script src='https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.css' rel='stylesheet' />
	<?php
} );
?>