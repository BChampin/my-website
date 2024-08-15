 <div class="navbar-fixed">  <!--NOT WORKING ON MOBILE, block sidenav-->
 <?php include('includes/env.php'); ?>

<!-- Dropdown Moi -->
<ul id="dropdown_moi" class="dropdown-content">
  <li id="accueil" title="Accueil"><a href="index.php"><img src="img/nav/home.png" class="logo"></a></li>
  <li id="portfolio" title="Portfolio"><a href="login_portfolio_formulaire.php"><img src="img/nav/person.png" class="logo"></a></li>
  <li id="gaming" title="Gaming"><a href="Gaming.php"><img src="img/nav/videogame.png" class="logo"></a></li>
</ul>

<!-- Dropdown Mail -->
<ul id="dropdown_mail" class="dropdown-content">
  <li id="gmail" title="Gmail"><a href="https://mail.google.com/mail/u/0/#inbox" target="_blank"><img src="img/nav/gamil.png" class="logo"></a></li>
  <li id="outlook" title="Outlook"><a href="<?php echo($ENV['NAV_OUTLOOK']); ?>" target="_blank"><img src="img/nav/outlook.png" class="logo"></a></li>
</ul>

<!-- Dropdown IUT -->
<ul id="dropdown_iut" class="dropdown-content">
  <li id="edt" title="Emploi du Temps"><a href="EmploiDuTemps.php" target="_blank"><img src="img/nav/calendar.png" class="logo"></a>
  <li id="iut" title="Département Info de l'IUT d'Ifs"><a href="<?php echo($ENV['NAV_EDT']); ?>" target="_blank"><img src="img/nav/iut.png" class="logo"></a></li>
  <li id="ecampus" title="Ecampus"><a href="<?php echo($ENV['NAV_ECAMPUS']); ?>" target="_blank"><img src="img/nav/ecampus.png" class="logo"></a></li>
  <li id="zimbra" title="Zimbra"><a href="<?php echo($ENV['NAV_ZIMBRA']); ?>" target="_blank"><img src="img/nav/zimbra.png" class="logo"></a></li>
</ul>

<!-- Dropdown Social -->
<ul id="dropdown_social" class="dropdown-content">
  <li id="facebook" title="Facebook"><a href="https://www.facebook.com/login.php" target="_blank"><img src="img/nav/facebook.png" class="logo"></a></li>
  <li id="messenger" title="Messenger"><a href="https://www.facebook.com/messages/t" target="_blank"><img src="img/nav/messenger.png" class="logo"></a></li>
  <li id="twitter" title="Twitter"><a href="http://www.twitter.com/login" target="_blank"><img src="img/nav/twitter.png" class="logo"></a></li>
  <li id="instagram" title="Instagram"><a href="https://www.instagram.com/accounts/login/?hl=fr" target="_blank"><img src="img/nav/instagram.png" class="logo"></a></li>
  <li id="youtube" title="Abonnements Youtube"><a href="https://www.youtube.com/feed/subscriptions" target="_blank"><img src="img/nav/youtube.png" class="logo"></a></li>
</ul>

<!-- Dropdown Argent -->
<ul id="dropdown_argent" class="dropdown-content">
  <li id="prolific" title="Prolific"><a href="https://app.prolific.ac/login" target="_blank"><img src="img/nav/prolific.png" class="logo"></a></li>
  <li id="swagbucks" title="Swagbucks"><a href="http://www.swagbucks.com" target="_blank"><img src="img/nav/swagbucks.png" class="logo"></a></li>
    <li id="clicworker" title="Clicworker"><a href="https://workplace.clickworker.com/en/clickworker/dashboard" target="_blank"><img src="img/nav/clicworker.png" class="logo"></a></li>

</ul>

<!-- Dropdown Autres -->
<ul id="dropdown_autre" class="dropdown-content">
  <li id="pacary" title="Pacary.eu"><a href="<?php echo($ENV['NAV_PACARY']); ?>" target="_blank"><img src="img/nav/pacary.png" class="logo"></a></li>
  <li id="drive" title="Google Drive"><a href="https://drive.google.com/drive/my-drive" target="_blank"><img src="img/nav/drive.png" class="logo"></a></li>
  <li id="twitch" title="Ma chaîne Twitch"><a href="<?php echo($ENV['NAV_TWITCH']); ?>" target="_blank"><img src="img/nav/twitch.png" class="logo"></a></li>
</ul>

  <nav class="blue-grey darken-3" role="navigation">
    <div class="nav-wrapper container">

      <a id="logo-container" href="<?php echo($ENV['HOSTED_URL']); ?>" class="brand-logo" title="Accueil"><img src="img/nav/Profil.png" style="height: 50px; width: 50px; margin-top: 5px;"></img></a>

      <ul class="right hide-on-med-and-down ">

        <!-- Dropdown Moi -->
        <li><a class="dropdown-trigger" href="#!" data-target="dropdown_moi">Moi</a></li>

        <!-- Dropdown Mail -->
        <li><a class="dropdown-trigger" href="#!" data-target="dropdown_mail">Mail</a></li>

        <!-- Dropdown IUT -->
        <li><a class="dropdown-trigger" href="#!" data-target="dropdown_iut">IUT</a></li>

        <!-- Dropdown Social -->
        <li><a class="dropdown-trigger" href="#!" data-target="dropdown_social">Social</a></li>

        <!-- Dropdown Argent -->
        <li><a class="dropdown-trigger" href="#!" data-target="dropdown_argent">Argent</a></li>

        <!-- Dropdown Autres -->
        <li><a class="dropdown-trigger" href="#!" data-target="dropdown_autre">Autre</a></li>
      </ul>

      <ul id="nav-mobile" class="sidenav">
        <!-- Dropdown Moi -->
        <li><a class="dropdown-trigger" href="#!" data-target="dropdown_moi">Moi</a></li>

        <!-- Dropdown Mail -->
        <li><a class="dropdown-trigger" href="#!" data-target="dropdown_mail">Mail</a></li>

        <!-- Dropdown IUT -->
        <li><a class="dropdown-trigger" href="#!" data-target="dropdown_iut">IUT</a></li>

        <!-- Dropdown Social -->
        <li><a class="dropdown-trigger" href="#!" data-target="dropdown_social">Social</a></li>

        <!-- Dropdown Argent -->
        <li><a class="dropdown-trigger" href="#!" data-target="dropdown_argent">Argent</a></li>

        <!-- Dropdown Autres -->
        <li><a class="dropdown-trigger" href="#!" data-target="dropdown_autre">Autre</a></li>
        </ul>

        <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      </div>
    </nav>
  </div>
<script>
document.addEventListener('DOMContentLoaded', function() {
   var elems = document.querySelectorAll('.dropdown-trigger');
   var instances = M.Dropdown.init(elems, options);
 });
</script>
  <main>
