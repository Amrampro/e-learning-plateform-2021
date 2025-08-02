<?php

$note = "";

if($item['id']==1){
  $note = $query_item['Mod_01_Note'];
}elseif ($item['id']==2) {
  $note = $query_item['Mod_02_Note'];
}elseif ($item['id']==3) {
  $note = $query_item['Mod_03_Note'];
}elseif ($item['id']==4) {
  $note = $query_item['Mod_04_Note'];
}elseif ($item['id']==5) {
  $note = $query_item['Mod_05_Note'];
}elseif ($item['id']==6) {
  $note = $query_item['Mod_06_Note'];
}elseif ($item['id']==7) {
  $note = $query_item['Mod_07_Note'];
}elseif ($item['id']==8) {
  $note = $query_item['Mod_08_Note'];
}elseif ($item['id']==9) {
  $note = $query_item['Mod_09_Note'];
}elseif ($item['id']==10) {
  $note = $query_item['Mod_10_Note'];
}elseif ($item['id']==11) {
  $note = $query_item['Mod_11_Note'];
}elseif ($item['id']==12) {
  $note = $query_item['Mod_12_Note'];
}elseif ($item['id']==13) {
  $note = $query_item['Mod_13_Note'];
}

$mension = "";

if ($note==0) {
  $mension = "<i>---</i>";
}elseif ($note==1) {
  $mension = "<span style='color:red'>Null</span>";
}elseif ($note==2) {
  $mension = "<span style='color:red'>Faible</span>";
}elseif ($note==3) {
  $mension = "<span style='color:red'>Médiocre</span>";
}elseif ($note==4) {
  $mension = "<span style='color:orange'>Pas Assez</span>";
}elseif ($note==5) {
  $mension = "<span style='color:orange'>Insuffissant</span>";
}elseif ($note==6) {
  $mension = "<span style='color:blue'>Passable</span>";
}elseif ($note==7) {
  $mension = "<span style='color:blue'>Bien</span>";
}elseif ($note==8) {
  $mension = "<span style='color:blue'>Très Bien</span>";
}elseif ($note==9) {
  $mension = "<span style='color:blue'>Excellent</span>";
}elseif ($note==10) {
  $mension = "<span style='color:green'>Parfait!</span>";
}else {
  $mension = "-non Valide!-";
}

$final_note_add="";

$final_note_add = ($query_item['Mod_01_Note']+$query_item['Mod_02_Note']+$query_item['Mod_03_Note']+$query_item['Mod_04_Note']+$query_item['Mod_05_Note']+$query_item['Mod_06_Note']+$query_item['Mod_07_Note']+$query_item['Mod_08_Note']+$query_item['Mod_09_Note']+$query_item['Mod_10_Note']+$query_item['Mod_11_Note']+$query_item['Mod_12_Note']
+$query_item['Mod_13_Note'])*2/10;

if ($final_note_add<6) {
  $final_note = "<span style='color:red'>$final_note_add</span>";
}elseif ($final_note_add>=6 && $final_note_add<7) {
  $final_note = "<span style='color:blue'>$final_note_add</span>";
}elseif ($final_note_add>=7) {
  $final_note = "<span style='color:green'>$final_note_add</span>";
}


$mension_finale = "";

if ($final_note_add==0) {
  $mension_finale = "<i>---</i>";
}elseif ($final_note_add>=1 && $final_note_add<2) {
  $mension_finale = "<span style='color:red'>Null</span>";
}elseif ($final_note_add>=2 && $final_note_add<4) {
  $mension_finale = "<span style='color:red'>Très Faible</span>";
}elseif ($final_note_add>=4 && $final_note_add<6) {
  $mension_finale = "<span style='color:red'>Faible</span>";
}elseif ($final_note_add>=6 && $final_note_add<8) {
  $mension_finale = "<span style='color:orange'>Médiocre</span>";
}elseif ($final_note_add>=8 && $final_note_add<10) {
  $mension_finale = "<span style='color:orange'>Pas Assez</span>";
}elseif ($final_note_add>=10 && $final_note_add<12) {
  $mension_finale = "<span style='color:blue'>Insuffissant</span>";
}elseif ($final_note_add>=12 && $final_note_add<13) {
  $mension_finale = "<span style='color:blue'>Passable</span>";
}elseif ($final_note_add>=13 && $final_note_add<14) {
  $mension_finale = "<span style='color:blue'>Assez Bien</span>";
}elseif ($final_note_add>=14 && $final_note_add<16) {
  $mension_finale = "<span style='color:blue'>Bien</span>";
}elseif ($final_note_add>=16 && $final_note_add<18) {
  $mension_finale = "<span style='color:blue'>Très Bien</span>";
}elseif ($final_note_add>=18 && $final_note_add<20) {
  $mension_finale = "<span style='color:blue'>Excellent</span>";
}elseif ($final_note_add==20) {
  $mension_finale = "<span style='color:green'>Parfait!</span>";
}else {
  $mension_finale = "---";
}

include "uploadCert.php";
 ?>
