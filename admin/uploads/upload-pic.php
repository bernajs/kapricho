<?php
$storeFolder = 'profilepic';
if(!empty($_FILES)){
    $folder = $_POST['folder'];
    $name = $_POST['name'];

    $tempFile = $_FILES['file']['tmp_name'];
    $targetPath = dirname( __FILE__ ) ."/". $storeFolder.'/';
    // $filename =  $_FILES['file']['name'];
    $targetFile =  $targetPath.$name;
    move_uploaded_file($tempFile,$targetFile);
}
