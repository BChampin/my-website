<!DOCTYPE html>
<html lang="fr">
<head>

  <!-- Meta tags  -->
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <meta charset="UTF-8">

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="core/css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="core/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

  <!-- Icons  -->
  <!-- <link rel="icon" type="image/x-icon" href="<?=img?>My_Logo.png" /> -->
  <!-- <link rel="shortcut icon" type="image/x-icon" href="<?=img?>My_Logo.png" /> -->

  <!-- Title -->
  <title>Words (version pauvre)</title>
</head>

<body>
  <main>
    <br />
    <div class="container">
      <div class="row">
      </div>
      <div class="row center hide-on-small-only">
        <div class="col m2 l2 left-align">
          <a href="#" class="brand-logo center" href="#" title="Accueil"><img src="core/img/logo.png" id="logo"></img></a>
        </div>
        <div class="col m4">
          <button type="button" name="button" onclick="ajax_create_game()">Je crée une partie</button>
          <button type="button" name="button" onclick="ajax_laod_add_media_page()">J'ajoute des médias</button>

        </div>
        <div class="col m4 flex">
          Je rejoins une partie
          <input type="text" name="join_game_id" id="join_game_id" placeholder="Numéro de partie">
          <input type="hidden" name="save_game_id" id="save_game_id">

          <input type="text" name="pseudo" id="pseudo" placeholder="Pseudo">
          <button type="button" name="button" onclick="ajax_load_game()">Rejoindre !</button>

        </div>

      </div>

      <div class="row">
        <div class="divider white-text">
        </div>
      </div>
    </div>
    <div class="container center black-text width-100" id="general_container">
    </div>

  </main>

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="core/js/materialize.min.js"></script>
  <script src="core/js/init.js"></script>
  <script src="core/js/ajax.js"></script>


  </body>
  </html>
