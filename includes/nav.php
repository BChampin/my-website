<div class="navbar-fixed">
  <nav>
    <div class="nav-wrapper grey darken-1">
      <a id="logo-container" href="<?php echo($ENV['HOSTED_URL']); ?>" class="brand-logo center" title="Accueil"><img src="img/Profil.png" style="height: 50px; width: 50px; margin-top: 5px;"></img></a>
      <ul id="nav-mobile" class="right">
        <li>
          <form method="get" action="<?php echo($ENV['SEARCH_FORM']); ?>" target="_blank">
            <div class="input-field">
              <i class="material-icons prefix">search</i>
              <input type="text" placeholder="Rechercher ..." name="q" autofocus>
            </div>
          </form>
        </li>
        <li>
          <div id="google_translate_element" class="center" title="Outil de traduction instantanée"></div>
          <script type="text/javascript">
          function googleTranslateElementInit() {
            new google.translate.TranslateElement({pageLanguage: 'fr', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
          }
          </script>
          <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        </li>
      </ul>
    </div>
  </nav>
</div>
<main>
  <div class="container center">
