<?php include('config/env.php'); ?>
<div class="row">
  <div class="col s12">
    <h3>Qui suis-je ?</h3>
  </div>
</div>

<div class="row">
  <div class="col s12 m4">
    <div class="card hoverable bigger_on_hover">
      <div class="card-image">
        <img src="<?=port?>profil.jpg">
        <span class="card-title">PHOTOGRAPHIE DE PROFIL</span>
      </div>
    </div>
  </div>

  <div class="col s12 m8">
    <div class="card hoverable bigger_on_hover">
      <div class="card-content black-text contenu_texte_jus">
        <span class="card-title center">Quelques informations</span>
        <p>
          <strong>Prénom : </strong>Bastien<br /><br />
          <strong>Nom : </strong>Champin<br /><br />
          <strong>Âge : </strong>19 ans<br /><br />
          <strong>Adresse web : </strong> <a href="<?php echo($ENV['HOSTED_URL']); ?>"><?php echo($ENV['HOSTED_URL']); ?></a><br /><br />
          <strong>Adresse de courriel : </strong> <a href="mailto:<?php echo($ENV['CONTACT_EMAIL']); ?>"><?php echo($ENV['CONTACT_EMAIL']); ?></a><br /><br />
          <strong>Formation actuelle : </strong>DUT Informatique à l'Université de Caen (France)<br /><br />
        </p>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="divider white-text"></div>
</div>

<div class="row">
  <div class="col s12">
    <h3>Quels sont mes outils et compétences ?</h3>
  </div>
</div>

<div class="row black-text">
  <div class="col s12 m7">
    <div class="card hoverable bigger_on_hover">
      <div class="card-content center">
        <span class="card-title center">Web</span>
        <p>
          <a href="https://www.w3schools.com/html/" target="_blank"><img src="<?=port?>html.png" class="tool_icon_vert"></a>
          <a href="https://www.w3schools.com/css/" target="_blank"><img src="<?=port?>css.png" class="tool_icon_vert"></a>
          <a href="https://materializecss.com/" target="_blank"><img src="<?=port?>materialize.png" class="tool_icon_hori"></a>
          <a href="http://www.php.net/" target="_blank"><img src="<?=port?>php.png" class="tool_icon_vert"></a>
          <a href="https://www.javascript.com/" target="_blank"><img src="<?=port?>js.png" class="tool_icon_vert"></a>
        </p>
      </div>
    </div>
  </div>
  <div class="col s12 m5">
    <div class="card hoverable bigger_on_hover">
      <div class="card-content center">
        <span class="card-title center">Bases de données</span>
        <p>
          <a href="https://www.mysql.com/fr/" target="_blank"><img src="<?=port?>mysql.png" class="tool_icon_hori"></a>
          <a href="https://www.oracle.com/database/technologies/appdev/sql-developer.html" target="_blank"><img src="<?=port?>sqldevelopper.png" class="tool_icon_sqr"></a>
          <a href="https://www.phpmyadmin.net/" target="_blank"><img src="<?=port?>phpmyadmin.png" class="tool_icon_pma"></a>
        </p>
      </div>
    </div>
  </div>
</div>

<div class="row black-text">
  <div class="col s12 m6">
    <div class="card hoverable bigger_on_hover">
      <div class="card-content center">
        <span class="card-title center">Développement</span>
        <p>
          <a href="https://git-scm.com/" target="_blank"><img src="<?=port?>git.png" class="tool_icon_sqr"></a>
          <a href="https://atom.io/" target="_blank"><img src="<?=port?>atom.png" class="tool_icon_sqr"></a>
          <a href="https://fr.wikipedia.org/wiki/M%C3%A9thode_agile" target="_blank"><img src="<?=port?>agile.png" class="tool_icon_sqr"></a>
          <a href="https://fr.wikipedia.org/wiki/Mod%C3%A8le-vue-contr%C3%B4leur" target="_blank"><img src="<?=port?>mvc.png" class="tool_icon_sqr"></a>



        </p>
      </div>
    </div>
  </div>
  <div class="col s12 m6">
    <div class="card hoverable bigger_on_hover">
      <div class="card-content center">
        <span class="card-title center">Langages</span>
        <p>
          <a href="https://fr.wikipedia.org/wiki/C_(langage)" target="_blank"><img src="<?=port?>c.png" class="tool_icon_sqr"></a>
          <a href="https://fr.wikipedia.org/wiki/Java_(langage)" target="_blank"><img src="<?=port?>java.png" class="tool_icon_sqr"></a>
          <a href="https://fr.wikipedia.org/wiki/Python_(langage)" target="_blank"><img src="<?=port?>python.png" class="tool_icon_sqr"></a>
        </p>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="divider white-text"></div>
</div>

<div class="row">
  <div class="col s12">
    <h3>Quels sont mes projets ?</h3>
  </div>
</div>

<div class="row black-text">
  <div class="col s12">
    <div class="card hoverable bigger_on_hover">
      <div class="card-content">
        <span class="card-title">Refonte Aatchi & Aatchi</span>
        <p class="left">
          Dans le cadre du DUT Informatique, nous devons réaliser en groupe un projet qui s'étale sur les deux ans de la formation. Suite à des remaniements entre ces deux années, j'ai rejoint le projet Refonte Aatchi & Aatchi cette année. Nous devons assurer la refonte technique du site <a href="https://aatchi.fr" target="_blank">aatchi.fr</a>, qui présente les oeuvres d'un collectif d'artistes. Ce projet nous permet de confronter nos capacités techniques avec les souhaits d'un client.
        </p>
        <br><br><br>
        <br>
        <div class="divider"></div>
        <br>
        <p class="left">
          État : En cours &nbsp; &nbsp; &nbsp; - &nbsp; &nbsp; &nbsp; Réalisation : En groupe, dans le cadre de mon DUT Informatique
        </p>
        <br>
        <br>
        <div class="divider"></div>
        <br>
        <p class="left">
          Technologies :
          <span class="new badge teal darken-4 arrondi" data-badge-caption="">MVC</span>
          <span class="new badge teal darken-4 arrondi" data-badge-caption="">Méthode Agile</span>
          <span class="new badge teal darken-4 arrondi" data-badge-caption="">Git</span>
          <span class="new badge indigo darken-4 arrondi" data-badge-caption="">MySQL</span>
          <span class="new badge red darken-4 arrondi" data-badge-caption="">JS</span>
          <span class="new badge red darken-4 arrondi" data-badge-caption="">PHP</span>
          <span class="new badge red darken-4 arrondi" data-badge-caption="">Materialize</span>
          <span class="new badge red darken-4 arrondi" data-badge-caption="">HTML / CSS</span>
        </p>
        <br>
      </div>
    </div>
  </div>
</div>

<div class="row black-text">
  <div class="col s12">
    <div class="card hoverable bigger_on_hover">
      <div class="card-content">
        <span class="card-title">Tour de France</span>
        <p class="left">
          Suite à l'apprentissage des bases de PHP durant mon DUT Informatique, nous avions pour consigne de réaliser une application web permettant de gérer de nombreuses données concernant le Tour de France. Nous travaillions à partir d'une base contenant tous les coureurs, leurs temps, leurs sponsors, les classements, ... depuis le Tour de 1986. Cette application permet de visualiser les données (utlisateur lambda) et de les modifier (administrateur).
        </p>
        <br><br><br>
        <br>
        <div class="divider"></div>
        <br>
        <p class="left">
          État : Terminé &nbsp; &nbsp; &nbsp; - &nbsp; &nbsp; &nbsp; Réalisation : En groupe, dans le cadre de mon DUT Informatique
        </p>
        <br>
        <br>
        <div class="divider"></div>
        <br>
        <p class="left">
          Technologies :
          <span class="new badge teal darken-4 arrondi" data-badge-caption="">MVC</span>
          <span class="new badge teal darken-4 arrondi" data-badge-caption="">Git</span>
          <span class="new badge indigo darken-4 arrondi" data-badge-caption="">MySQL</span>
          <span class="new badge red darken-4 arrondi" data-badge-caption="">JS</span>
          <span class="new badge red darken-4 arrondi" data-badge-caption="">PHP</span>
          <span class="new badge red darken-4 arrondi" data-badge-caption="">Materialize</span>
          <span class="new badge red darken-4 arrondi" data-badge-caption="">HTML / CSS</span>
        </p>
        <br>
      </div>
    </div>
  </div>
</div>

<div class="row black-text">
  <div class="col s12">
    <div class="card hoverable bigger_on_hover">
      <div class="card-content">
        <span class="card-title">Carbon Cube</span>
        <p class="left">
          Ce projet consistait à développer une application web pour un client, en se basant uniquement sur ses objectifs, ses souhaits, nos capacités, ... le tout sur une durée de trois jours. Durant cette courte période, nous avons pu créer l'application web consistant à calculer le volume de CO2 que l'on produit lors d'un trajet, selon certains critères (carburant, type de véhicule, ...) ainsi que l'application mobile. Le site n'est pas encore accessible, mais le sera bientôt.
        </p>
        <br><br><br>
        <br>
        <div class="divider"></div>
        <br>
        <p class="left">
          État : Terminé &nbsp; &nbsp; &nbsp; - &nbsp; &nbsp; &nbsp; Réalisation : En groupe, dans le cadre de mon DUT Informatique
        </p>
        <br>
        <br>
        <div class="divider"></div>
        <br>
        <p class="left">
          Technologies :
          <span class="new badge teal darken-4 arrondi" data-badge-caption="">Méthode Agile</span>
          <span class="new badge teal darken-4 arrondi" data-badge-caption="">Git</span>
          <span class="new badge indigo darken-4 arrondi" data-badge-caption="">MySQL</span>
          <span class="new badge red darken-4 arrondi" data-badge-caption="">JS</span>
          <span class="new badge red darken-4 arrondi" data-badge-caption="">PHP</span>
          <span class="new badge red darken-4 arrondi" data-badge-caption="">Materialize</span>
          <span class="new badge red darken-4 arrondi" data-badge-caption="">HTML / CSS</span>
        </p>
        <br>
      </div>
    </div>
  </div>
</div>

<div class="row black-text">
  <div class="col s12">
    <div class="card hoverable bigger_on_hover">
      <div class="card-content">
        <span class="card-title">Shing Shang</span>
        <p class="left">
          Lors de la première année du DUT Informatique, nous devions réaliser le jeu du "Shing-Shang" dans le langage C, puis en Java. Ce jeu de plateau consiste à amener l'un de ses dragons sur l'un des deux portails adverses. Le but était de rendre ce jeu de plateau jouable sur ordinateur, avec un affichage "console" (donc très simple), avec la possibilité de sauvegarder et de reprendre une partie plus tard.
        </p>
        <br><br><br>
        <br>
        <div class="divider"></div>
        <br>
        <p class="left">
          État : Terminé &nbsp; &nbsp; &nbsp; - &nbsp; &nbsp; &nbsp; Réalisation : Seul, dans le cadre de mon DUT Informatique
        </p>
        <br>
        <br>
        <div class="divider"></div>
        <br>
        <p class="left">
          Technologies :
          <span class="new badge orange darken-4 arrondi" data-badge-caption="">Java</span>
          <span class="new badge orange darken-4 arrondi" data-badge-caption="">C</span>
        </p>
        <br>
      </div>
    </div>
  </div>
</div>

<div class="row black-text">
  <div class="col s12">
    <div class="card hoverable bigger_on_hover">
      <div class="card-content">
        <span class="card-title">Jeux en Python</span>
        <p class="left">
          Dans le cadre de ma spécialité ISN (Informatique et Sciences du Numérique) au lycée, nous devions réaliser en groupes un jeu en Python. La durée allouée pour la création de ce jeu était de trois mois. Avec l'aide de deux camarades, nous avons réalisé un "remake" du célèbre jeu Pacman. De plus, nous avons aussi développé deux autres jeux (le pierre-feuille-ciseaux et le jeu des allumettes) ainsi qu'une interface pour lancer ces différents jeux.
        </p>
        <br><br><br>
        <br>
        <div class="divider"></div>
        <br>
        <p class="left">
          État : Terminé &nbsp; &nbsp; &nbsp; - &nbsp; &nbsp; &nbsp; Réalisation : En groupe, dans le cadre du lycée
        </p>
        <br>
        <br>
        <div class="divider"></div>
        <br>
        <p class="left">
          Technologies :
          <span class="new badge orange darken-4 arrondi" data-badge-caption="">Python</span>
        </p>
        <br>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col s12">
    <div id="slider">
      <figure>
        <img src="<?=slider?>Aatchi_Accueil.png">
        <img src="<?=slider?>Aatchi_Productions.png">
        <img src="<?=slider?>Aatchi_Admin.png">
        <img src="<?=slider?>Tour_Accueil.png">
        <img src="<?=slider?>Tour_Coureur.png">
        <img src="<?=slider?>Tour_Insertion.png">
        <img src="<?=slider?>CarbonCube_Accueil.png">
        <img src="<?=slider?>CarbonCube_Calcul.png">
        <img src="<?=slider?>Shing_Debut.png">
        <img src="<?=slider?>Shing_Game.png">
        <img src="<?=slider?>Shing_Save.png">
        <img src="<?=slider?>Python_Interface.png">
        <img src="<?=slider?>Python_Pachomme.png">
        <img src="<?=slider?>Python_Shifumi.png">
        <img src="<?=slider?>Python_Allumettes.png">
        <img src="<?=slider?>Aatchi_Accueil.png">
      </figure>
    </div>
  </div>
</div>

<div class="row">
  <div class="divider white-text"></div>
</div>

<div class="row">
  <div class="col s12">
    <h3>Un aperçu de mon CV ?</h3>
  </div>
</div>


<iframe src="<?=port?>CV.pdf" width="100%" height="100%" class="center cv"></iframe>
