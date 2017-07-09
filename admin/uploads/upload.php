<?php
if(!empty($_FILES)){
    $storeFolder = $_POST['folder'];
    $name = $_POST['name'];
    if(!file_exists($storeFolder)) {
        mkdir($storeFolder, 0777, true);
    }
    $tempFile = $_FILES['file']['tmp_name'];
    $targetPath = dirname( __FILE__ ) ."/". $storeFolder.'/';
    // $filename =  $_FILES['file']['name'];
    $targetFile =  $targetPath.$name;
    move_uploaded_file($tempFile,$targetFile);
}
