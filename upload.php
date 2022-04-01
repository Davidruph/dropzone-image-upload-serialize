<?php

$uploadDir = 'image';
require 'dbconn.php';

if (!empty($_FILES)) {  
   $name = $_FILES['file']['name'];
 // $tmpFile = $_FILES['file']['tmp_name'];  
 // $filename = $uploadDir.'/'.$name;  
 // move_uploaded_file($tmpFile, $filename); 
   
for($i=0; $i < count($name); $i++){
$tmpFile = $_FILES['file']['tmp_name'][$i]; 
  $filename = $uploadDir.'/'.$name[$i];  
  move_uploaded_file($tmpFile, $filename); 
  $list = serialize($name);
}
   $sql = mysqli_query($conn, "UPDATE imagetest SET multi_image = '$list' WHERE id = 1");
 
}  


?>
