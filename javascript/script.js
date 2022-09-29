
  function updatemenu() {
    if (document.getElementById('responsive-menu').checked == true) {
      document.getElementById('menu').style.borderBottomRightRadius = '0';
      document.getElementById('menu').style.borderBottomLeftRadius = '0';
    }else{
      document.getElementById('menu').style.borderRadius = '0px';
    }
  }
  /* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */
function myFunction() {
  var x = document.getElementById("myTopNavbar");
  if (x.className === "topnavbar") {
    x.className += " responsive";
  } else {
    x.className = "topnavbar";
  }
}


  