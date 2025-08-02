<?php

$delivered_cert = "";
$deli_state = $item['certification_doc'];

if ($deli_state == "none") {
  $delivered_cert = "<span style='color:red'>Vous N'avez Pas Encore Délivré Le Diplome De Cet élève</span>";
}else {
  $delivered_cert = "Vous avez Délivré Le Diplome De Cet élève";
}

$see_notes = "";
$has_finish = $item['Is_Cert'];

if ($has_finish==1) {
  $see_notes = '<a id="blink" class="btn btn-default" href="notes.php?id=' .$item['id']. '"><span class="glyphicon glyphicon-eye-open"></span> Voir les notes</a>';
}else {
  $see_notes = '<a class="btn btn-default" href="notes.php?id=' .$item['id']. '"><span class="glyphicon glyphicon-eye-open"></span> Voir les notes</a>';
}
 ?>
