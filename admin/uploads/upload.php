<?php
// include_once('../_class/class.imgexif.php');
	$name = ''; $type = ''; $size = ''; $error = '';
	function compress_image($source_url, $destination_url, $quality) {
		$info = getimagesize($source_url);

if ($info['mime'] == 'image/jpeg')
			$image = imagecreatefromjpeg($source_url);

elseif ($info['mime'] == 'image/gif')
			$image = imagecreatefromgif($source_url);

elseif ($info['mime'] == 'image/png')
			$image = imagecreatefrompng($source_url);

imagejpeg($image, $destination_url, $quality);

return $destination_url;
}

	if ($_POST) {
    		if ($_FILES["file"]["error"] > 0) {
        			$error = $_FILES["file"]["error"];
    		}
    		else if (($_FILES["file"]["type"] == "image/gif") ||
			($_FILES["file"]["type"] == "image/jpeg") ||
			($_FILES["file"]["type"] == "image/png") ||
			($_FILES["file"]["type"] == "image/pjpeg")) {
			$storeFolder = $_POST['folder'];
			$name = $_POST['name'];
			$url = $storeFolder.'/'.$name;
							// if(!file_exists($storeFolder.'/usuario_'.$uid)) {
							// 		mkdir($storeFolder.'/usuario_'.$uid, 0777, true);
							// }
			$filename = compress_image($_FILES["file"]["tmp_name"], $url, 50);
			$buffer = file_get_contents($url);

			/* Force download dialog... */
			header("Content-Type: application/force-download");
			header("Content-Type: application/octet-stream");
			header("Content-Type: application/download");

			/* Don't allow caching... */
			header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

			/* Set data type, size and filename */
			header("Content-Type: application/octet-stream");
			header("Content-Transfer-Encoding: binary");
			header("Content-Length: " . strlen($buffer));
			header("Content-Disposition: attachment; filename=$url");

			/* Send our file... */
			// echo $buffer;
    		}else {
        			$error = "Uploaded image should be jpg or gif or png";
    		}
	}
?>
