<?php include('config/env.php'); ?>
<div class="row">
  <div class="col s12 m6 l3">
    <div class="card-panel blue-grey lighten-2">
      <a title="Gmail" href="https://mail.google.com/mail/u/0/#inbox" target="_blank"><img src="<?=nav?>gamil.png" class="logo hoverable"></a>
      <a title="Outlook" href="<?php echo($ENV['NAV_OUTLOOK']); ?>" target="_blank"><img src="<?=nav?>outlook.png" class="logo hoverable"></a>
    </div>
  </div>
  <div class="col s12 m6 l3">
    <div class="card-panel blue-grey lighten-2">
      <a title="EmploiDuTemps" href="EmploiDuTemps.php" target="_blank"><img src="<?=nav?>calendar.png" class="logo hoverable"></a>
      <a title="Département Info de l'IUT d'Ifs" href="<?php echo($ENV['NAV_EDT']); ?>" target="_blank"><img src="<?=nav?>iut.png" class="logo hoverable"></a>
      <a title="Ecampus" href="<?php echo($ENV['NAV_ECAMPUS']); ?>" target="_blank"><img src="<?=nav?>ecampus.png" class="logo hoverable"></a>
      <a title="Zimbra" href="<?php echo($ENV['NAV_ZIMBRA']); ?>" target="_blank"><img src="<?=nav?>zimbra.png" class="logo hoverable"></a>
    </div>
  </div>
  <div class="col s12 m6 l3">
    <div class="card-panel blue-grey lighten-2">
      <a title="Facebook" href="https://www.facebook.com/login.php" target="_blank"><img src="<?=nav?>facebook.png" class="logo hoverable"></a>
      <a title="Messenger" href="https://www.messenger.com" target="_blank"><img src="<?=nav?>messenger.png" class="logo hoverable"></a>
      <a title="Twitter" href="http://www.twitter.com/login" target="_blank"><img src="<?=nav?>twitter.png" class="logo hoverable"></a>
      <a title="Instagram" href="https://www.instagram.com/accounts/login/?hl=fr" target="_blank"><img src="<?=nav?>instagram.png" class="logo hoverable"></a>
      <a title="Abonnements Youtube" href="https://www.youtube.com/feed/subscriptions" target="_blank"><img src="<?=nav?>youtube.png" class="logo hoverable"></a>
    </div>
  </div>
  <div class="col s12 m6 l3">
    <div class="card-panel blue-grey lighten-2">
      <a title="Prolific" href="https://app.prolific.ac/login" target="_blank"><img src="<?=nav?>prolific.png" class="logo hoverable"></a>
      <a title="Pacary.eu" href="<?php echo($ENV['NAV_PACARY']); ?>" target="_blank"><img src="<?=nav?>pacary.png" class="logo hoverable"></a>
      <a title="Google Drive" href="https://drive.google.com/drive/my-drive" target="_blank"><img src="<?=nav?>drive.png" class="logo hoverable"></a>
      <a title="Ma chaîne Twitch" href="<?php echo($ENV['NAV_TWITCH']); ?>" target="_blank"><img src="<?=nav?>twitch.png" class="logo hoverable"></a>
    </div>
  </div>
</div>
