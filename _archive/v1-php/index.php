<?php include('includes/env.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>

  <?php include('includes/head.php'); ?>
  <!-- Titre  -->
  <title>Accueil</title>

</head>

<body>
  <?php include('includes/nav.php'); ?>


  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <h1 class="header center blue-grey-text">Accueil</h1>

      <div class="row center">
        <h5 class="header col s12 light">Vous êtes sur la page d'accueil de mon site.</h5>
      </div>
    </div>
  </div>
</div>

<br><br>

<div class="container">
  <div class="row">
    <form class="col s12" method="get" target="_blank" action="<?php echo($ENV['SEARCH_FORM']); ?>">
      <div class="row center">
        <div class="input-field col s3">
          <i class="material-icons prefix">search</i>
          <input class="center" type="text" id="src_google" name="q" size="20" maxlength="255" autofocus/>
          <label for="src_google">Rechercher ...</label>
        </div>
      </div>
    </form>
  </div>
</div>

<div class="container">
  <div class="section">
    <div class="row">

      <!-- Section Accueil-->
      <div class="col s12 m4 hoverable">
        <a href="">
          <div class="icon-block">
            <h2 class="center light-blue-text"><i class="material-icons">power_settings_new</i></h2>
            <h5 class="center black-text">Accueil</h5>
            <p class="light black-text" style="text-align: justify;">Vous trouverez ici plein de raccourcis plutôt utiles, ainsi qu'une barre de recherche.</p>
          </div>
        </a>
      </div>

      <!-- Section Portfolio-->
      <div class="col s12 m4 hoverable">
        <a href="login_portfolio_formulaire.php">
          <div class="icon-block">
            <h2 class="center light-blue-text"><i class="material-icons">group</i></h2>
            <h5 class="center black-text">Portfolio</h5>
            <p class="light black-text" style="text-align: justify;">Pour en savoir un peu plus sur moi, il suffit de venir ici ! </br> <div class="center black-text">/!\ Accès sur connection uniquement /!\</div></p>
          </div>
        </a>
      </div>

      <!-- Section Gaming-->
      <div class="col s12 m4 hoverable">
        <a href="Gaming.php">
          <div class="icon-block">
            <h2 class="center light-blue-text"><i class="material-icons">games</i></h2>
            <h5 class="center black-text">Gaming Area</h5>
            <p class="light black-text" style="text-align: justify;">Je fais des streams de temps en temps, venez donc me rejoindre si vous le souhaitez ! N'hésitez pas à me suivre pour être au courant de tous mes lives, et abonnez-vous à mes chaînes Twitch et Youtube !</p>
          </div>
        </a>
      </div>
    </div>
  </div>
</div>

<br><br>

<?php include('includes/footer.php'); ?>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="js/materialize.js"></script>
<script src="js/init.js"></script>
<script>
 M.AutoInit();

document.addEventListener('DOMContentLoaded', function() {
  var elems = document.querySelectorAll('.dropdown-trigger');
  var instances = M.Dropdown.init(elems, options);
});

// Or with jQuery

$('.dropdown-trigger').dropdown();

$(".dropdown-trigger").dropdown();
</script>

</body>
</html>
