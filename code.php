<?php

$uploadDir = 'image';
require 'dbconn.php';
    
if (!empty($_FILES)) {  
    $name = $_FILES['file']['name'];
 $tmpFile = $_FILES['file']['tmp_name'];  
 $filename = $uploadDir.'/'.$_FILES['file']['name'];  
 move_uploaded_file($tmpFile,$filename);  

 $sql = "INSERT INTO imagetest (multi_image)VALUES(?)";

    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "s", json_encode($name));

    mysqli_stmt_execute($stmt);
}  


?>
