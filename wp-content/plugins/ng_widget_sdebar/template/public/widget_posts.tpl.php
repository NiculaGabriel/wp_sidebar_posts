<?php if( !empty($title) ) {  ?>
	<p class="title-posts-widget"><?php echo $title ?></p>

	<?php

		function getParentRoot($post_id){
			
			global $wpdb;

			$result = $wpdb->get_results( "SELECT post_parent AS parent FROM {$wpdb->posts} WHERE ID = " . (int)$post_id );
 			
 			$id = $post_id;

 			if( !empty( $result[0]->parent ) && (int)$result[0]->parent > 0 ) {
 				$id = getParentRoot( (int)$result[0]->parent );  
 			}

 			return $id;
		}

		function replaceItem($list) {

			global $wpdb;

			$parent_id = getParentRoot( (int)get_queried_object_id() );
			 
			$result = $wpdb->get_results( "SELECT * FROM {$wpdb->posts} WHERE post_type = 'post' AND post_status = 'publish' AND ID = " . (int)$parent_id);
 
			$in_list = false;
			if( !empty($result) ){
				foreach ($list as $key => $value) {
					if( (int)$value == (int)$result->ID ) {
						unset($list[$key]);
						$in_list = true;
					}		
				}
				if(!$in_list){
					array_pop($list);
				}
				array_unshift($list, $result[0]);
			}
			return $list;
		}

		function countChildren($post_id) {
			global $wpdb;
			$result = $wpdb->get_results( "SELECT COUNT(*) AS count FROM {$wpdb->posts} WHERE ID = " . (int)$post_id);		 
			if(isset($result[0]->count)){
			   return (int)$result[0]->count;
			};
		}

		function getChildrenPost($post_id, $index) {
			global $wpdb;
			$childrens = false;
			$result = $wpdb->get_results( "SELECT * FROM {$wpdb->posts} WHERE post_type = 'post' AND post_status = 'publish' AND post_parent = " .  $post_id);
			if(!empty($result)) {
				$has_childrens = true;
				foreach ($result as $key => $value) {
					echo '<ul class="' . ( countChildren($value->ID) > 0 && $index == 0 ? "node active"  : "node" ) . '">';
						echo '<li> <a class="'.((int)get_queried_object_id() == (int)$value->ID ? "self" : "" ).'" href="'.get_permalink($value->ID).'">'. get_the_title($value->ID)  . ' - ID ' . $value->ID . '</a>';
							$childrens = getChildrenPost($value->ID, $index);
							if($childrens){echo '<p class="icon-drop-down"></p>';}
						echo '</li>';
					echo '</ul>';
				}
			}
			return $has_childrens;
		}

		global $wpdb;

		$result = $wpdb->get_results( "SELECT * FROM {$wpdb->posts} WHERE post_type = 'post' AND post_status = 'publish' AND post_parent = 0 ORDER BY ID ASC LIMIT 0, 15;" );
  
		$result = replaceItem($result);

		foreach ($result as $key => $value) {

			echo '<ul class="' . ( countChildren($value->ID) > 0 && $key == 0 ? "root node active"  : "root node" ) . '">';
				echo '<li> <a class="'.((int)get_queried_object_id() == (int)$value->ID ? "self" : "" ).'" href="'.get_permalink($value->ID).'">'. get_the_title($value->ID)  . ' - ID ' . $value->ID . '</a>';
	 				$childrens = getChildrenPost($value->ID, $key);
	 				if($childrens) {echo '<p class="icon-drop-down"></p>';}
	 			echo '</li>';
 			echo '</ul>';
		}

	?>
<?php } ?>
