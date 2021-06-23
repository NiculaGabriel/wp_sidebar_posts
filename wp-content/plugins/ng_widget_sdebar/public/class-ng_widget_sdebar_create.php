<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.linkedin.com/in/gabriel-nicula-48a450ba/
 * @since      1.0.0
 *
 * @package    Ng_widget_sdebar
 * @subpackage Ng_widget_sdebar/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Ng_widget_sdebar
 * @subpackage Ng_widget_sdebar/public
 * @author     Nicula Gabriel <nicula.gabriel87@yahoo.com>
 */
class Ng_widget_sdebar_Create extends WP_Widget {
	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct() {

	parent::__construct('custom_widget', __( 'NG Posts Widget' , 'ng_widget_sdebar'), array( 'description' => __( 'Display posts' , $theme_domain)));
  
	}
	public function declare_sidebar() {
		$theme_domain = !empty( get_template() ) ? get_template() : "";
	    register_sidebar(
	        array (
	            'name' => __( 'Post Sidebar', $theme_domain ),
	            'id' => 'custom-side-bar',
	            'description' => __( 'Post Sidebar', $theme_domain ),
	            'before_widget' => '<div class="widget-content">',
	            'after_widget' => "</div>",
	            'before_title' => '<h3 class="widget-title">',
	            'after_title' => '</h3>',
	        )
	    );
	} 
	public function all_posts_widget_register_function() {
		register_widget( 'Ng_widget_sdebar_Create' );
	}
	public function widget( $args, $instance ) {	 

		$title = "";
		if ( $instance && isset( $instance['title'] ) ) {
			$title = $instance['title'];
		}
		require_once dirname(dirname( __FILE__ )) . '/template/public/widget_posts.tpl.php';
	}
	function update( $new_instance, $old_instance ) {
		$instance['title'] = strip_tags( $new_instance['title'] );
		return $instance;
	}
	function form( $instance ) { 
		if ( $instance && isset( $instance['title'] ) ) {
			$title = $instance['title'];
		}
	?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:' , $theme_domain); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
	<?php }
}