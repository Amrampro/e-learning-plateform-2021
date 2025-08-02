/*
Market_Comprar
*/
document.getElementById("checkout").addEventListener("click", not_available);

function not_available() {
    alert("\n\nDesolé. \n L'achat N'est Pas Encore Disponible. \n Nous Nous Excusons Du Desagrement Et Vous Le Promettons Pour Très Bientot.");
}

function buy(){
var dark = document.getElementById('comprar_container');
var buy_box = document.getElementById('comprar_box');
dark.style.display = "block";
buy_box.style.display = "block";
}
function unbuy(){
  var dark = document.getElementById('comprar_container');
  var buy_box = document.getElementById('comprar_box');
  dark.style.display = "none";
  buy_box.style.display = "none";
}
