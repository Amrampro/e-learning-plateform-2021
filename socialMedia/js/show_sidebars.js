// Show the main_sideMenu_left menu when the button is clicked
function show_main_sideMenu_left(){
  var sel = document.getElementById("main_sideMenu_left");
  sel.style.marginLeft="0%";
  var but = document.getElementById("main_sideMenu_left_but");
  but.style.display="none";
}

// Hide the main_sideMenu_left menu when the main_sideMenu_left menu is clicked
function hide_main_sideMenu_left_el(){
  var sb = document.getElementById("main_sideMenu_left");
  sb.style.marginLeft="-100%";
  var but = document.getElementById("main_sideMenu_left_but");
  but.style.display="block";
}
