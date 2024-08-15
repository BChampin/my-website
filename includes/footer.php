</div>
</main>
<script>
window.onload = M.AutoInit();

function pop(nom_div)
{
  var x = document.getElementById(nom_div);
  if (x.style.visibility === 'hidden') {
    x.style.visibility = 'visible';
  } else {
    x.style.visibility = 'hidden';
  }
}

document.addEventListener('DOMContentLoaded', function() {
  var elems = document.querySelectorAll('.dropdown-trigger');
  var instances = M.Dropdown.init(elems, options);
});

</script>

<!--  Scripts-->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="js/materialize.js"></script>
<script src="js/init.js"></script>

</body>
</html>
