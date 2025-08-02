// NavBar show/hide
function showNav(){

  var el = document.getElementById("nav_elements");
  var navBut = document.getElementById("navbar_toggle").getAttribute("class");
  var navButc = document.getElementById("navbar_toggle");

  if (navBut == "navbar_toggle"){
      navButc.setAttribute("class", "navbar_toggle_close");
      el.style.marginLeft = "-15px";
  } else {
    navButc.setAttribute("class", "navbar_toggle");
    el.style.marginLeft = "-105%";
  }

}
