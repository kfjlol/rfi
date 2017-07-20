<?php
   $storeInfo = file_get_contents('http://rts.rfinstallations.com/msg?pipeline=lookupStore&storeNum='.$_GET['storeNum']);
   echo $storeInfo;
?>