<?php 

ini_set('memory_limit', '256M');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(isset($_GET['status']) && $_GET['status'] == 'do') {

	require( dirname(dirname( __FILE__ ) )   . '/wp-load.php' );

	global $wpdb;

	$result = $wpdb->get_results( "SELECT * FROM {$wpdb->posts} WHERE post_type = 'post' AND post_status = 'publish' AND post_parent = 0" );
  
	if(is_array($result)) {
		foreach ($result as $key => $value) { 
		 	for($i = 1; $i <= 3; $i++) {
		 		$post = array(
					'post_title' => 'Post Child LvL-2 ' . $i,
					'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum id felis at quam viverra dignissim vitae nec nunc. Proin venenatis sit amet est placerat mattis. Donec auctor convallis augue, non tristique ipsum pretium ut. Suspendisse dignissim in leo non mollis. Maecenas a mollis mauris, sit amet fermentum lectus. Phasellus pharetra imperdiet lectus, vitae viverra est aliquet quis. Mauris a placerat orci, eget ornare dolor. Mauris tempus aliquet urna, venenatis vulputate eros suscipit et. Vestibulum blandit rhoncus dui. Maecenas condimentum non purus sit amet consectetur. Etiam metus massa, scelerisque vitae lorem eget, dapibus suscipit velit. Donec porttitor gravida nunc, eget pretium dui fermentum eget. Vivamus finibus urna ac libero faucibus molestie.',
					'post_status' => 'publish',
					'post_date' => date('Y-m-d H:i:s'),
					'post_author' => $user_ID,
					'post_type' => 'post',
					'post_category' => array(0),
					'post_parent' => $value->ID
				);

				$post_id = wp_insert_post($post);
		 	}
		}
	}
}
