<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <meta charset="utf-8">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="shortcut icon" type="image/x-icon" href="core/img/My_Logo.png" />
  <link rel="stylesheet" href="core/css/materialize.min.css">
  <link rel="stylesheet" href="core/css/css.css">
  <title></title>
</head>
<body id="body">

<div id="home" class="parallax-container fullHeight valign-wrapper">
  <div class="container">
    <br><br>
    <h1 class="header center myBlue text-lighten-2">Bastien Champin</h1>
    <div class="row center">
      <h5 class="header col s12 light white-text">Web Designer / Web Developer</h5>
    </div>
    <div class="row center">
      <a href="#about" class="btn-large waves-effect waves-light myBlueBg lighten-1 br30">En savoir plus</a>
    </div>
    <br><br>
  </div>
  <div class="parallax bg_dimmed"><img src="core/img/background1.jpg" alt="Unsplashed background img 1"></div>
</div>

<section>
  <div class="container" id="about">
    <div class="section">
      <div class="row">
        <div class="col s12 m6">
          <div class="icon-block">
            <h2 class="center myBlue"><i class="material-icons fs40">computer</i></h2>
            <h5 class="center">Design</h5>
            <p class="light">Des interfaces simples, sobres et épurées mais fonctionnelles respectant les règles du <a href="https://fr.wikipedia.org/wiki/Material_design" target="_blank">Material Design</a> éditées par Google</p>
          </div>
        </div>

        <div class="col s12 m6">
          <div class="icon-block">
            <h2 class="center myBlue"><i class="material-icons fs40">flash_on</i></h2>
            <h5 class="center">Outils</h5>
            <p class="light">Utilisation de technologies récentes, performantes et toujours mises à jour, pour garantir des temps de chargement courts et des interactions sans délai</p>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col s12 m6">
          <div class="icon-block">
            <h2 class="center myBlue"><i class="material-icons fs40">phonelink</i></h2>
            <h5 class="center">Responsive</h5>
            <p class="light">Des contenus adaptés à tous les périphériques, pour que votre produit soit disponible partout, à tout moment, par tous</p>
          </div>
        </div>

        <div class="col s12 m6">
          <div class="icon-block">
            <h2 class="center myBlue"><i class="material-icons fs40">build</i></h2>
            <h5 class="center">Fonctionnalités</h5>
            <p class="light">Refonte de site web, ajout de fonctionnalité, administration, maintenance, ... le tout en appliquant les bonnes pratiques durant mon développement</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section>
  <div class="parallax-container valign-wrapper">
    <div class="container">
      <div class="row center">
        <h5 class="header col s12 light white-text">Sobre mais efficace</h5>
      </div>
    </div>
    <div class="parallax bg_dimmed"><img src="core/img/background2.jpg" alt="Unsplashed background img 2"></div>
  </div>
</section>

<section>
  <div class="container" id="whoami">
    <div class="section">
      <div class="row">
        <div class="col s12 center">
          <h4>Qui suis-je ?</h4>
          <p class="light">Venant d'un DUT Informatique et en préparation d'un diplôme de Chef de projet SI, je développe de nombreuses applications dans un cadre personnel et professionnel depuis plusieurs années. J'offre mes services en freelance depuis peu, mais je saurai mettre mon expérience (de développeur comme de gestion de projet) à votre service pour tout projet que vous souhaitez que nous entreprenions ensemble.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section>
  <div class="parallax-container valign-wrapper">
    <div class="container">
      <div class="row center">
        <h5 class="header col s12 light white-text"><i>"Le développeur et le chef de projet web sont les artisans du web. Ils façonnent votre identité digitale selon vos besoins."</i></h5>
      </div>
    </div>
    <div class="parallax bg_dimmed"><img src="core/img/background3.jpg" alt="Unsplashed background img 3"></div>
  </div>
</section>

<section>
  <div class="container" id="contact">
    <div class="section">
      <div class="row">
        <div class="col s12 center">
          <h4>Contact</h4>
          <div class="card br30 myBlue" id="responseApi">
            <form class="col s12">
              <div class="row">
                <div class="input-field col s6">
                  <i class="material-icons prefix myBlue">face</i>
                  <input id="email_first" type="text" class="validate">
                  <label for="email_first">Prénom</label>
                </div>
                <div class="input-field col s6">
                  <i class="material-icons prefix myBlue">account_circle</i>
                  <input id="email_name" type="text" class="validate">
                  <label for="email_name">Nom</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s6">
                  <i class="material-icons prefix myBlue">email</i>
                  <input id="email_address" type="email" class="validate">
                  <label for="email_address">Email</label>
                  <span class="helper-text" data-error="Oups, format incorrect !"></span>
                </div>
                <div class="input-field col s6">
                  <i class="material-icons prefix myBlue">insert_comment</i>
                  <input id="email_objet" type="text" class="validate">
                  <label for="email_objet">Objet</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <textarea id="email_message" class="materialize-textarea"></textarea>
                  <label for="email_message">Message</label>
                </div>
              </div>
              <div class="row center">
                <a onclick="sendForm()" class="btn-large waves-effect waves-light curPoint myBlueBg lighten-1 br30">Envoyer !</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="black">
  <div class="container">
    <div class="section">
      <div class="row">
        <div class="col s12 center">
          <a href="#home">Haut de page</a>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <a href="#about">A propos</a>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <a href="#whoami">Qui suis-je ?</a>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <a href="#contact">Contact</a>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Javascript -->
<script src="core/js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
<script src="core/js/materialize.min.js" type="text/javascript" charset="utf-8"></script>
<script src="core/js/js.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>
