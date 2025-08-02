<?php

$testIf = $query_item['Is_Cert'];

if ($testIf==1) {
  $upload_btn = '<a href="certificate.php?id=' .$query_item['id']. '" class="btn btn-success btn-lg" style="float: right;"><span class="glyphicon glyphicon-upload"></span> Envoyer Diplome</a><br><br><br>';
}else {
  $upload_btn = '<button type="button"  class="btn btn-success btn-lg" style="float: right;" disabled><span class="glyphicon glyphicon-upload"></span> Envoyer Dimplome(<i>Non validé</i>)</button><br><br><br>';
}
 ?>
