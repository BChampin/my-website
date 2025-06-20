</main>
<?php include('includes/env.php'); ?>

<footer class="page-footer blue-grey darken-3">
  <div class="container">
    <div class="row">
      <div class="col l6 s12">
        <h8 class="white-text">Quelques informations</h8>
        <p class="grey-text text-lighten-4">Salut c'est moi !</p>
      </div>
      <div class="col l3 s12">
        <h5 class="white-text">Quelques liens</h5>
        <ul>
          <li><a class="white-text" href="MentionsLegales.php">Mentions Légales</a></li>
          <li><a class="white-text" href="Contact.php">Contact (Early Access)</a></li>
        </ul>
      </div>
      <div class="col l3 s12">
        <h5 class="white-text">Me rejoindre</h5>
        <ul>
          <li><a class="white-text" href="<?php echo($ENV['FACEBOOK_URL']); ?>" target="_blank">Facebook</a></li>
          <li><a class="white-text" href="<?php echo($ENV['INSTAGARM_URL']); ?>" target="_blank">Instagram</a></li>
          <li><a class="white-text" href="<?php echo($ENV['TWITTER_URL']); ?>" target="_blank">Twitter</a></li>
        </ul>
      </div>
    </div>
  </div>



  <div id="google_translate_element" class="center" title="Outil de traduction instanée"></div><script type="text/javascript">
  function googleTranslateElementInit() {
    new google.translate.TranslateElement({pageLanguage: 'fr', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
  }
  </script>
  <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

  <div class="footer-copyright">
    <div class="container">
      Site réalisé par Bastien Champin. <a href="<?php echo($ENV['CPANEL_URL']); ?>" target="_blank">Panel Admin</a>
    </div>
  </div>



</footer>
