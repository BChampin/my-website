<?php
class Portfolio extends Controller
{
  public function login()
  {
    require(template."head.php");
    require(view."Portfolio/login.php");
    //require(js."loadPage.js");

    echo '<script type="text/javascript">
    function loadPage(askedController, askedMethod)
    {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          // Typical action to be performed when the document is ready:
            document.getElementById("MainContainer").innerHTML=xhttp.responseText;
          }
        };
        var url = "'.urlBase.'?&c=+"askedController"+&m="+askedMethod";
        xhttp.open("GET", url, true);
        xhttp.send();
      }
      </script>';


    require(template."footer.php");
  }

}
?>
