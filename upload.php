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
  //$list = serialize($name);
}
    $qry = mysqli_query($conn, "SELECT * FROM imagetest WHERE id = 1");
    $result = mysqli_fetch_assoc($qry);
    $val_result = unserialize($result['multi_image']);
    var_dump($name);
    var_dump($val_result);
    $new = array_merge($val_result,$name);
    $list = serialize($new);
    var_dump($list);
   $sql = mysqli_query($conn, "UPDATE imagetest SET multi_image = '$list' WHERE id = 1");
 
}  


?>
