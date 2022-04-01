<?php
require 'dbconn.php';
if ($_POST['index']) {
	$img_index = $_POST['index'];
	$img_id = $_POST['id'];
	$sql = mysqli_query($conn, "SELECT * FROM imagetest WHERE id = $img_id");
	$row = mysqli_fetch_array($sql);
	$image_list = unserialize($row['multi_image']);
	//var_dump($image_list);
	//var_dump($img_index);
	 foreach($image_list as $value => $key){
	 	if ($value == $img_index) {
	 		$path = 'image/'.$key;
	 		unset($image_list[$value]);
	 		//for example [1, 2, 3], if i unset [2], it will still retain the ordering so the code below makes sure it recounts (0, 1) else it will be (0, 2).
	 		$val = array_values($image_list);
	 		$new_array = serialize($val);
	 		$sql = mysqli_query($conn, "UPDATE imagetest SET multi_image = '$new_array' WHERE id = $img_id");
	 		if ($sql) {
	 			echo "array has been changed";
	 		}
	 		//print_r($val);
	 		//print_r($new_array);
	 		//echo $path;
	 	}
	 }
}