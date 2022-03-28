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

 $sql = "INSERT INTO imagetest (multi_image)VALUES(?)";

    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "s", $list);

    mysqli_stmt_execute($stmt);
}  


?>
