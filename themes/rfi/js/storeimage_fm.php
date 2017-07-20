<?php
    $NewImage =imagecreatefromjpeg("http://rts.textomation.com/api/image/fetch/fm?storeNum=".$_GET['storeNum']);
	header("Content-type: image/jpeg");
    imagejpeg($NewImage);
?>