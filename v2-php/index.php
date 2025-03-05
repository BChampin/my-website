<?php include('includes/env.php'); ?>
<?php include('includes/head.php'); ?>

<div class="section no-pad-bot" id="index-banner">
  <br><br>
  <h1 class="header center">Bienvenue !</h1>
</div>

<br><br><br><br><br><br>

<div class="row">
  <div class="col s12 m3 hoverable" onclick="pop('pop_mail')">
    <img class="my_logo" name="mail" src="img/menu/mail.png" title="Mail"/>
  </div>
  <div class="col s12 m3 hoverable" onclick="pop('pop_clavier')">
    <img class="my_logo" name="clavier" src="img/menu/clavier.png" title="IUT"/>
  </div>
  <div class="col s12 m3 hoverable" onclick="pop('pop_social')">
    <img class="my_logo" name="social" src="img/menu/social.png" title="Social"/>
  </div>
  <div class="col s12 m3 hoverable" onclick="pop('pop_autre')">
    <img class="my_logo" name="autre" src="img/menu/autre.png" title="Autre"/>
  </div>
</div>

<div class="row">
  <div class="col s12 m3" id="pop_mail">
    <a title="Gmail" href="https://mail.google.com/mail/u/0/#inbox" target="_blank"><img src="img/nav/gamil.png" class="logo"></a>
    <a title="Outlook" href="<?php echo($ENV['NAV_OUTLOOK']); ?>" target="_blank"><img src="img/nav/outlook.png" class="logo"></a>
  </div>
  <div class="col s12 m3" id="pop_clavier">
    <a title="EmploiDuTemps" href="EmploiDuTemps.php" target="_blank"><img src="img/nav/calendar.png" class="logo"></a>
    <a title="Département Info de l'IUT d'Ifs" href="<?php echo($ENV['NAV_EDT']); ?>" target="_blank"><img src="img/nav/iut.png" class="logo"></a>
    <a title="Ecampus" href="<?php echo($ENV['NAV_ECAMPUS']); ?>" target="_blank"><img src="img/nav/ecampus.png" class="logo"></a>
    <a title="Zimbra" href="<?php echo($ENV['NAV_ZIMBRA']); ?>" target="_blank"><img src="img/nav/zimbra.png" class="logo"></a>
  </div>
  <div class="col s12 m3" id="pop_social">
    <a title="Facebook" href="https://www.facebook.com/login.php" target="_blank"><img src="img/nav/facebook.png" class="logo"></a>
    <a title="Messenger" href="https://www.messenger.com" target="_blank"><img src="img/nav/messenger.png" class="logo"></a>
    <a title="Twitter" href="http://www.twitter.com/login" target="_blank"><img src="img/nav/twitter.png" class="logo"></a>
    <a title="Instagram" href="https://www.instagram.com/accounts/login/?hl=fr" target="_blank"><img src="img/nav/instagram.png" class="logo"></a>
    <a title="Abonnements Youtube" href="https://www.youtube.com/feed/subscriptions" target="_blank"><img src="img/nav/youtube.png" class="logo"></a>
  </div>
  <div class="col s12 m3" id="pop_autre">
    <a title="Prolific" href="https://app.prolific.ac/login" target="_blank"><img src="img/nav/prolific.png" class="logo"></a>
    <a title="Pacary.eu" href="<?php echo($ENV['NAV_PACARY']); ?>" target="_blank"><img src="img/nav/pacary.png" class="logo"></a>
    <a title="Google Drive" href="https://drive.google.com/drive/my-drive" target="_blank"><img src="img/nav/drive.png" class="logo"></a>
    <a title="Ma chaîne Twitch" href="<?php echo($ENV['NAV_TWITCH']); ?>" target="_blank"><img src="img/nav/twitch.png" class="logo"></a>
  </div>
</div>

<br><br><br><br>

<div class="row">
  <!-- Section Accueil-->
  <div class="col s12 hoverable">
    <div class="icon-block">
      <a title="Accès sur connection uniquement" href="login_portfolio_formulaire.php"><p id="lien_portfolio" class="white-text">Envie d'en savoir un<br>peu plus sur moi ?</p></a>
    </div>
  </a>
</div>
</div>

<?php include('includes/footer.php') ?>
