<?php
   $storeInfo = file_get_contents('http://rts.textomation.com/api/store/fetch?storeNum='.$_GET['storeNum']);
   echo $storeInfo;
?>
