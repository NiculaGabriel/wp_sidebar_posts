<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://www.linkedin.com/in/gabriel-nicula-48a450ba/
 * @since      1.0.0
 *
 * @package    Ng_widget_sdebar
 * @subpackage Ng_widget_sdebar/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Ng_widget_sdebar
 * @subpackage Ng_widget_sdebar/includes
 * @author     Nicula Gabriel <nicula.gabriel87@yahoo.com>
 */
class Ng_widget_sdebar_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'ng_widget_sdebar',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
