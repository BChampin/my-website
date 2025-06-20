<?php include('includes/env.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>

  <?php include('includes/head.php'); ?>
  <!-- Titre  -->
  <title>Gaming</title>

</head>

<body>
  <?php include('includes/nav.php'); ?>

</br>
<!-- ====================  Twitch ==================== -->
<div id="stream" class="center">
  <iframe class="player--frame" src="<?php echo($ENV['TWITCH_PLAYER_URL']); ?>" height="499px" width="885px" autoplay="" allowfullscreen="" frameborder="0"></iframe>
</div>
</br>

<!-- ====================  Youtube  ==================== -->

<div id="videos" class="center">
  <div id="last_videos">Mes dernières vidéos !</div>
  <iframe id="youtube_video1" width="292" height="165" frameborder="0" allowfullscreen></iframe>
  <iframe id="youtube_video2" width="292" height="165" frameborder="0" allowfullscreen></iframe>
  <iframe id="youtube_video3" width="292" height="165" frameborder="0" allowfullscreen></iframe>
</br>

<a class="waves-effect waves-light btn-large" href="<?php echo($ENV['YOUTUBE_CHANNEL_URL']); ?>" target="_blank">Plus de vidéos !</a>
</br>

</div>
</br>

<!-- ====================  Paypal ==================== -->

<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" class="center">
  <input type="hidden" name="cmd" value="_s-xclick">
  <input type="hidden" name="hosted_button_id" value="<?php echo($ENV['PAYPAL_HOSTED_BUTTON_ID']); ?>">
  <input type="image" src="https://www.paypalobjects.com/fr_FR/FR/i/btn/btn_donate_SM.gif" border="0" name="submit" alt="PayPal, le réflexe sécurité pour payer en ligne">
  <img alt="" border="0" src="https://www.paypalobjects.com/fr_FR/i/scr/pixel.gif" width="1" height="1">
</form>
</br>



<?php include('includes/footer.php'); ?>


<!--  Scripts-->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="js/materialize.js"></script>
<script src="js/init.js"></script>


<!-- ====================  JAVASCRIPT VIDÉOS==================== -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js">//C'est pour les vidéos</script>
<script>
var channelID = "<?php echo($ENV['YOUTUBE_CHANNEL_ID']); ?>";
$.getJSON('https://api.rss2json.com/v1/api.json?rss_url=https%3A%2F%2Fwww.youtube.com%2Ffeeds%2Fvideos.xml%3Fchannel_id%3D'+channelID, function(data) {
  var link = data.items[0].link; //C'est ici, on change le chiffre pour la vidéo
  var id = link.substr(link.indexOf("=")+1);
  $("#youtube_video1").attr("src","https://youtube.com/embed/"+id + "?controls=1&showinfo=1&rel=1");

  for (let index = 0; index <=2 ; index++) {
    const link = data.items[index].link
    const id = link.substr(link.indexOf("=")+1);
    $(`#youtube_video${index + 1}`).attr("src","https://youtube.com/embed/"+id + "?controls=1&showinfo=1&rel=1");
  }
});
</script>

</body>
</html>
