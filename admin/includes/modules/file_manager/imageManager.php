<?php
class imageManager{

	function create_thumb($file_path,$new_image,$thumb_size=100){
		if ($thumb_size>'0'){
			global $_FILES_DIR,$_IMAGE_SMALL_WIDTH,$_IMAGE_MED_WIDTH,$_IMAGE_LARGE_WIDTH;
			include_once('includes/classes/resize.class.php');
			copy($file_path,$new_image);
			$obj = new img_opt(); 
				
				$obj->max_width($thumb_size); 
				$obj->image_path($file_path); 
				$obj->image_new_path($new_image); 
				$obj->image_resize(); 
		}
	}// end function create icon

}