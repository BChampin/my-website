<?php include('includes/env.php'); ?>
<!DOCTYPE html>

<html>

<head>


	<!-- CSS Export Mahara -->

	<!--<link rel="stylesheet" type="text/css" href="./static/theme/raw/static/export/style/style.css">
	<link rel="stylesheet" type="text/css" href="./static/theme/raw/static/export/style/print.css">-->
	<link rel="stylesheet" type="text/css" href="./static/theme/raw/static/style/views.css">
	<link rel="stylesheet" type="text/css" href="./static/theme/raw/static/style/tinymce.css">
	<link rel="stylesheet" type="text/css" href="./static/theme/raw/static/style/style.css">
	<link rel="stylesheet" type="text/css" href="./static/theme/raw/static/style/style-blessed1.css">
	<link rel="stylesheet" type="text/css" href="./static/theme/raw/static/style/select2.css">
	<link rel="stylesheet" type="text/css" href="./static/theme/raw/static/style/datepicker.css">
	<link rel="stylesheet" type="text/css" href="./static/theme/raw/static/style/cookieconsent.css">
	<link rel="stylesheet" type="text/css" href="./static/theme/cemu20161/static/style/style.css">


	<?php include('includes/head.php'); ?>
	<!-- Titre  -->
	<title>Portfolio</title>


</head>


<body>

	<?php include('includes/nav.php'); ?>
	<?php include('includes/securite_bdd.php'); ?>


	<!-- ####################################################################### -->

	<!-- ############# Connection à la base + vérif si ok ###################### -->

	<!-- ####################################################################### -->

	<?php

	try   // PDO est censé marcher avec tout SGBD

	{

		// Sous WAMP (Windows)

		//$bdd = new PDO($ENV['BDD_WAMP_CONNECTION'], $ENV['BDD_WAMP_USER'], $ENV['BDD_WAMP_PASSWORD']);


		// Sur le site

		$bdd = new PDO($ENV['BDD_LIVE_CONNECTION'], $ENV['BDD_LIVE_USER'], $ENV['BDD_LIVE_PASSWORD']);

	}

	catch(Exception $e)

	{

		// En cas d'erreur, on affiche un message et on arrête tout

		die('Erreur : '.$e->getMessage());

	}


	// Si tout va bien, on peut continuer


	$reponse = $bdd->query('SELECT * FROM LOGIN_PORTFOLIO order by ID asc');


	while ($donnees = $reponse->fetch())

	{

		//Un petit peu de sécurité, cf securite_bdd.php pour plus d'infos
		$NomUti = Securite::bdd($_POST['NomUtilisateur']);
		$Passe = Securite::bdd($_POST['MotDePasse']);

		if(isset($NomUti) AND isset($Passe) AND $donnees['NomUtilisateur'] == $NomUti AND $donnees['MotDePasse'] == $Passe)

		{

			?>

			<!-- ################################################################### -->

			<!-- ################################################################### -->


			<div class="container">

				<div id="content">

					<div class="row-content">
						<div class="column-layout" style="width: 100%; margin-top: 20px;">
							<h4 class="left">E-Portfolio de Bastien Champin</h4>
							<div class="right">
								<h6>
									<?php echo "Bienvenue ".Securite::html($NomUti); ?>
								</h6>
							</div>
						</div>
					</div>

					<div id="row_1" class="clearfix">

						<div class="row-content">

							<div id="row_1_column_1" class="column-layout columns2 first col-width-33" style="width:31%;">

								<div class="column-content">

									<div class="bt-image panel panel-secondary clearfix " id="blockinstance_423097">

										<h3 class="title panel-heading js-heading">Photographie de profil</h3>

										<div class="block"  id="blockinstance_423097_target" data-blocktype-noajax="423097">

											<div class="imageblock panel-body" itemscope itemtype="http://schema.org/ImageObject">

												<div class="image">

													<img src="img/profil.jpg">

												</div>

											</div>

										</div>

									</div>

									<div class="bt-profileinfo panel panel-secondary clearfix " id="blockinstance_411897" style="padding:5px;">

										<h3 class="title panel-heading js-heading">Informations générales</h3>

										<div class="block"  id="blockinstance_411897_target" data-blocktype-noajax="411897">

											<div class="panel-body flush">

												<ul class="unstyled profile-info">

													<li><strong>Prénom:</strong> Bastien</li>

													<li><strong>Nom:</strong> Champin</li>

													<li><strong>Adresse web officielle:</strong> <a href="<?php echo($ENV['HOSTED_URL']); ?>"><?php echo($ENV['HOSTED_URL']); ?></a></li>

													<li><strong>Adresse de courriel:</strong> <a href="mailto:<?php echo($ENV['CONTACT_EMAIL']); ?>"><?php echo($ENV['CONTACT_EMAIL']); ?></a></li>

												</ul>

											</div>

										</div>

									</div>

									<div class="bt-internalmedia panel panel-secondary clearfix " id="blockinstance_431020">

										<h3 class="title panel-heading js-heading">

											Présentation audiovisuelle

										</h3>

										<div class="block"  id="blockinstance_431020_target" data-blocktype-noajax="431020">

											<div class="mediaplayer-container panel-body flush"><div class="mediaplayer">

												<video controls="controls" width=100%>

													<source src="files/Presentation_Bastien_CHAMPIN.mp4" type="video/mp4"/>

												</video>

												<div class="media-download content-text">

													<span class="icon icon-download left" role="presentation" aria-hidden="true">

													</span><span class="sr-only">Télécharger</span>

													<a class="media-link text-small" href="files/Presentation_Bastien_CHAMPIN.mp4">Presentation_Bastien_CHAMPIN.mp4</a>

													<span class="text-midtone text-small"> [36,58MB] </span>

												</div>

											</div>

										</div>

									</div>

								</div>

							</div>

						</div>

						<div id="row_1_column_2" class="column-layout columns2 last col-width-67" style="width:65%;">

							<div class="column-content">

								<div class="bt-text panel panel-secondary clearfix " id="blockinstance_411883" style="padding:5px;">

									<h3 class="title panel-heading js-heading">

										Présentation

									</h3>

									<div class="block"  id="blockinstance_411883_target" data-blocktype-noajax="411883">

										<div class="textblock panel-body flush">

											<h4><em><span style="font-weight:400;">Qui suis-je ?</span></em></h4>

											<p style="text-align:justify;"><span style="font-weight:400;">    Bienvenue, je m'appelle Bastien CHAMPIN, je suis né le 13 Novembre 1999. Je suis actuellement étudiant en première année de DUT Informatique à l'<a href="http://www.unicaen.fr/iutcaen/" target="_blank">IUT de Caen</a> (antenne d'Ifs).</span></p>

											<p style="text-align:justify;"><span style="font-weight:400;">    J'ai rejoint cette formation après avoir obtenu mon baccalauréat scientifique avec mention très bien, au lycée <a href="https://guehenno.etab.ac-caen.fr/" target="_blank">Jean Guéhenno de Flers</a>.</span></p>

											<p><span style="font-weight:400;"> </span></p>

											<h4><em><span style="font-weight:400;">Mes motivations ?</span></em></h4>

											<p style="text-align:justify;">    J'ai toujours été curieux et avide de connaissances, dans n'importe quel domaine que ce soit. Cependant, seul le domaine de l'informatique me permettait de devoir maintenir ces connaissances à jour régulièrement. Le stage de découverte en 3ème m'a permis de découvrir une entreprise de l'intérieur (<a href="http://www.informathis.com/" target="_blank">Inform'Athis</a>) et d'approfondir mes connaissances en informatique. Il a aussi confirmé mon choix de m'engager dans des études informatiques par la suite.</p>

											<p style="text-align:justify;">   Je souhaite découvrir les mécanismes internes des ordinateurs, des sites web, ... et c'est pourquoi je pense m'orienter vers une école d'ingénieurs dans le but de devenir webmaster après l'obtention de mon DUT.</p>

										</div>

									</div>

								</div>

								<div class="bt-text panel panel-secondary clearfix " id="blockinstance_423116">

									<h3 class="title panel-heading js-heading">

										Compétences informatiques

									</h3>

									<div class="block"  id="blockinstance_423116_target" data-blocktype-noajax="423116" style="padding:5px;">

										<div class="textblock panel-body flush">

											<table class="tg">

												<tr>

													<th class="tg-yw4l">Web</th>

													<th class="tg-yw4l">Programmation<br></th>

													<th class="tg-yw4l">Bases de données <br></th>

												</tr>

												<tr>

													<td>★★★★☆ - HTML<br>★★★★☆ - CSS<br>★★★★☆ - Javascript<br></td>

													<td>★★★★☆ - C<br>★★★☆☆ - Java<br>★★★☆☆ - Python<br></td>

													<td>★★★☆☆ - SQL<br>★☆☆☆☆ - PL/SQL<br>★★★☆☆ - PHP<br></td>

												</tr>

											</table>

										</div>

									</div>

								</div>

								<div class="bt-text panel panel-secondary clearfix " id="blockinstance_428886">

									<h3 class="title panel-heading js-heading">

										Compétences linguistiques

									</h3>

									<div class="block"  id="blockinstance_428886_target" data-blocktype-noajax="428886">

										<div class="textblock panel-body flush">

											<ul>
												<li>Français : parfaitement maîtrisé (langue maternelle)</li>

												<li>Anglais : parlé et écrit à un niveau tout à fait convenable (Certification de Cambridge de niveau B1)</li>

												<li>Espagnol : parlé et écrit à un niveau correct</li>

											</ul>

										</div>

									</div>

								</div>

								<div class="bt-filedownload panel panel-secondary clearfix" id="blockinstance_429346">

									<h3 class="title panel-heading">

										Fichier(s) à télécharger

									</h3>

									<div class="block collapse in"  id="blockinstance_429346_target" data-blocktype-noajax="429346">

										<ul class="list-group">

											<li class="filedownload-item list-group-item">

												<a href="files/SHING_SHANG_C_BASTIEN_CHAMPIN.zip" class="outer-link icon-on-hover">

													<span class="sr-only">

														Télécharger SHING_SHANG_C_BASTIEN_CHAMPIN.zip

													</span>

												</a>

												<span class="icon icon-archive icon-lg left" role="presentation" aria-hidden="true"></span>

												<h4 class="title list-group-item-heading text-inline">

													<a href="files/SHING_SHANG_C_BASTIEN_CHAMPIN.zip" class="inner-link">

														SHING_SHANG_C_BASTIEN_CHAMPIN.zip

														<span class="sr-only">

															Détails

														</span>

													</a>

												</h4>

												<span class="text-small text-midtone"> <br/>

													Taille de l'archive :

													[670Ko]

												</span>

												<span class="icon icon-download icon-lg pull-right text-watermark icon-action" role="presentation" aria-hidden="true"></span>

											</li>

											<li class="filedownload-item list-group-item">
												<a href="files/CHAMPIN_Bastien_LEMAZIER_Elise.32.zip" class="outer-link icon-on-hover">
													<span class="sr-only">
														Télécharger CHAMPIN_Bastien_LEMAZIER_Elise.32.zip
													</span>
												</a>
												<span class="icon icon-archive icon-lg left" role="presentation" aria-hidden="true"></span>
												<h4 class="title list-group-item-heading text-inline">
													<a href="files/CHAMPIN_Bastien_LEMAZIER_Elise.32.zip" class="inner-link">
														CHAMPIN_Bastien_LEMAZIER_Elise.32.zip
														<span class="sr-only">
															Détails
														</span>
													</a>
												</h4>
												<span class="text-small text-midtone"> <br/>
													Taille de l'archive :
													[1058Ko]
												</span>
												<span class="icon icon-download icon-lg pull-right text-watermark icon-action" role="presentation" aria-hidden="true"></span>
											</li>
											<li class="filedownload-item list-group-item">

												<a href="files/JEUX_PYTHON_BASTIEN_CHAMPIN.zip" class="outer-link icon-on-hover">

													<span class="sr-only">

														Télécharger JEUX_PYTHON_BASTIEN_CHAMPIN.zip

													</span>

												</a>

												<span class="icon icon-archive icon-lg left" role="presentation" aria-hidden="true"></span>

												<h4 class="title list-group-item-heading text-inline">

													<a href="files/JEUX_PYTHON_BASTIEN_CHAMPIN.zip" class="inner-link">

														JEUX_PYTHON_BASTIEN_CHAMPIN.zip

														<span class="sr-only">

															Détails

														</span>

													</a>

												</h4>

												<span class="text-small text-midtone"> <br/>

													Taille de l'archive :

													[4,2Mo]

												</span>

												<span class="icon icon-download icon-lg pull-right text-watermark icon-action" role="presentation" aria-hidden="true"></span>

											</li>

											<li class="filedownload-item list-group-item">

												<a href="files/CV_Bastien_CHAMPIN.doc.pdf" class="outer-link icon-on-hover">

													<span class="sr-only">

														Télécharger mon CV

													</span>

												</a>

												<span class="icon icon-archive icon-lg left" role="presentation" aria-hidden="true"></span>

												<h4 class="title list-group-item-heading text-inline">

													<a href="files/CV_Bastien_CHAMPIN.doc.pdf" class="inner-link">

														CV_Bastien_CHAMPIN.doc.pdf

														<span class="sr-only">

															Détails

														</span>

													</a>

												</h4>

												<span class="text-small text-midtone"> <br/>

													Taille du document :

													[160Ko]

												</span>

												<span class="icon icon-download icon-lg pull-right text-watermark icon-action" role="presentation" aria-hidden="true"></span>

											</li>

										</ul>

									</div>

								</div>

							</div>

						</div>

					</div>

				</div>

				<div id="row_2" class="clearfix">

					<div class="row-content">

						<div id="row_2_column_1" class="column-layout columns1 first last col-width-100" style="width: 100%;">

							<div class="column-content">

								<div class="bt-pdf panel panel-secondary clearfix" id="blockinstance_428977">

									<h3 class="title panel-heading">

										Curriculum Vitae

									</h3>

									<div class="block collapse in"  id="blockinstance_428977_target" data-blocktype-noajax="428977">

										<div class="panel-body">

											<iframe src="files/CV_Bastien_CHAMPIN.doc.pdf" width="100%" height="500" frameborder="0" view="FitB"></iframe>

										</div>

									</div>

								</div>

							</div>

						</div>

					</div>

				</div>

				<div id="row_3" class="clearfix">

					<div class="row-content">

						<div id="row_3_column_1" class="column-layout columns1 first last col-width-100" style="width: 100%; margin-top: 20px;">

							<div class="column-content">

								<div class="bt-blog panel panel-secondary clearfix " id="blockinstance_429409">

									<h3 class="title panel-heading">

										Mes projets terminés, en cours ou futurs

									</h3>

									<div class="block"  id="blockinstance_429409_target" data-blocktype-noajax="429409">

									</div>

								</div>

							</div>

						</div>

					</div>

				</div>

				<div id="row_4" class="clearfix">

					<div class="row-content">

						<div id="row_4_column_1" class="column-layout columns3 first col-width-25" style="width:23%;">

							<div class="column-content">

								<div class="bt-text panel panel-secondary clearfix " id="blockinstance_429329">

									<h3 class="title panel-heading">
										Jeux en Python

									</h3>

									<div class="block collapse in"  id="blockinstance_429329_target" data-blocktype-noajax="429329" style="padding:5px;">

										<div class="textblock panel-body flush">

											<p style="text-align:justify;">Dans le cadre de ma spécialité ISN (Informatique et Sciences du Numérique) au lycée, nous devions réaliser par groupes un jeu en Python. La durée allouée pour la création de ce jeu était de trois mois. Avec l'aide de deux camarades, nous avons réalisé un "remake" du célèbre jeu Pacman. Comme nous avancions rapidement, nous avons aussi développé deux autres jeux (le pierre-feuille-ciseaux et le jeu des allumettes) ainsi qu'une interface pour lancer ces différents jeux.</p>

											<p style="text-align:justify;"><a href="http://comparaisonordinateur.blogspot.fr/2012/11/les-regles-du-jeu-et-de-la-strategie.html" target="_blank">Voir les règles du Pacman</a></p>

											<p style="text-align:justify;"><a href="http://www.gecif.net/articles/mathematiques/jeu_allumettes.html" target="_blank">Voir les règles du jeu des allumettes</a></p>

										</div>

									</div>

								</div>

							</div>

						</div>

						<div id="row_4_column_2" class="column-layout columns3 col-width-25" style="width:23%;">

							<div class="column-content">

								<div class="bt-text panel panel-secondary clearfix" id="blockinstance_429330">

									<h3 class="title panel-heading">

										Shing Shang en C
 et en Java
									</h3>

									<div class="block collapse in"  id="blockinstance_429330_target" data-blocktype-noajax="429330" style="padding:5px;">

										<div class="textblock panel-body flush">

											<p style="text-align:justify;">Lors de la première année du DUT Informatique, nous devions réaliser le jeu du "Shing-Shang" dans le langage C, puis en Java. Ce jeu de plateau consiste à amener l'un de ses dragons sur l'un des deux portails adverses. Le but était de rendre ce jeu de plateau jouable sur ordinateur, avec un affichage "console" (donc très simple), avec la possibilité de sauvegarder et de reprendre une partie plus tard. Il est à noter que j'ai réalisé la version en C seul mais que la version Java a été établie en binôme avec Élise Le Mazier.</p>

											<p style="text-align:justify;"><a href="http://jeuxstrategieter.free.fr/Shing_shang_complet.php" target="_blank">Voir le détail des règles du Shing Shang</a></p>

										</div>

									</div>

								</div>

							</div>

						</div>

						<div id="row_4_column_3" class="column-layout columns3 last col-width-25" style="width:23%;">

							<div class="column-content">

								<div class="bt-text panel panel-secondary clearfix" id="blockinstance_429332">

									<h3 class="title panel-heading">

										Network Automation Using Python

									</h3>

									<div class="block collapse in"  id="blockinstance_429332_target" data-blocktype-noajax="429332" style="padding:5px;">

										<div class="textblock panel-body flush">

											<p style="text-align:justify;">Dans le cadre du DUT Informatique, nous devons réaliser en groupe un projet qui s'étale sur les deux ans de la formation. Avec 3 camarades, nous avons choisi le projet "Network Automation Using Python", dont le commanditaire est un professeur en Réseaux et Télécommunications à l'IUT de Caen. Nous devons réaliser une interface permettant d'automatiser au maximum la configuration de machines en réseaux, comme des routeurs ou des swithcsc. Pour nous aider, nous disposons de GNS3, un logiciel de simulation de réseaux, ce qui nous permet de tester notre travail sans avoir le matériel physique. Il est à noter cependant que nos scripts d'automatisation doivent fonctionner aussi bien sur des machines virtueles que rélles.</p>

										</div>

									</div>

								</div>

							</div>

						</div>


						<div id="row_4_column_4" class="column-layout columns3 last col-width-25" style="width:23%;">
							<div class="column-content">
								<div class="bt-text panel panel-secondary clearfix" id="blockinstance_429333">
									<h3 class="title panel-heading">
										Carbon Cube
									</h3>
									<div class="block collapse in"  id="blockinstance_429333_target" data-blocktype-noajax="429333" style="padding:5px;">
										<div class="textblock panel-body flush">
											<p style="text-align:justify;">Dans le cadre de la première année du DUT Informatique, nous devions réaliser en groupe un projet en fin d'année, visant à tester nos capacités de coopération et de travail en équipe, ainsi que notre qualité d'écoute quant aux souhaits d'un client. Ce projet consistait à développer une application web pour Monsieur Aubry, en se basant uniquement sur les objectifs du client, ses souhaits, nos capacités, ... le tout sur une durée de trois jours. Durant cette courte période, nous avons pu créer cette application web consistant à calculer le volume de CO2 que l'on produit lors d'un trajet, selon certains critères (carburant, type de véhicule, longueur du trajet, ...) ainsi qu'une application mobile. Cette expérience nous a permis de mettre concrètement en application nos différents apprentissages au cours de cette 1ère année. Le site, Carbon Cube, n'est pas encore accessible, mais le sera bientôt.</p>
										</div>
									</div>
								</div>
							</div>
						</div>



					</div>

				</div>

				<div id="row_5" class="clearfix">

					<div class="row-content">

						<div id="row_5_column_1" class="column-layout columns1 first last col-width-100" style="width: 100%; margin-bottom:20px;">

							<div class="column-content">

								<div class="bt-gallery panel panel-secondary clearfix " id="blockinstance_429281" style="margin-top:20px;">

									<h3 class="title panel-heading">

										Captures de mes différents projets

									</h3>




									<div class="slider" class="fullscreen">
										<ul class="slides" style="height:10px;">
											<li>
												<img src="img/Interface - Pachomme.png">
												<div class="caption left-align">
													<h3>Jeux en Python</h3>
													<h5 class="light grey-text text-lighten-3">Interface d'accueil du projet</h5>
												</div>
											</li>
											<li>
												<img src="img/Pachomme.png">
												<div class="caption left-align">
													<h3>Jeux en Python</h3>
													<h5 class="light grey-text text-lighten-3">Remake du Pacman</h5>
												</div>
											</li>
											<li>
												<img src="img/Allumettes.png">
												<div class="caption right-align">
													<h3>Jeux en Python</h3>
													<h5 class="light grey-text text-lighten-3">Jeu des Allumettes</h5>
												</div>
											</li>
											<li>
												<img src="img/Shifumi.png">
												<div class="caption center-align">
													<h3>Jeux en Python</h3>
													<h5 class="light grey-text text-lighten-3">Jeu du pierre-feuille-ciseaux</h5>
												</div>
											</li>
											<li>
												<img src="img/quicommence.png">
												<div class="caption center-align">
													<h3>Shing-Shang en C</h3>
													<h5 class="light grey-text text-lighten-3">Menu et initialisation d'une partie</h5>
												</div>
											</li>
											<li>
												<img src="img/debut_game.png">
												<div class="caption center-align">
													<h3>Shing-Shang en C</h3>
													<h5 class="light grey-text text-lighten-3">Début d'une partie</h5>
												</div>
											</li>
											<li>
												<img src="img/suite_save.png">
												<div class="caption center-align">
													<h3>Shing-Shang en C</h3>
													<h5 class="light grey-text text-lighten-3">Demande de tour suivant ou sauvegarde</h5>
												</div>
											</li>
											<li>
												<img src="img/CarbonCube_Accueil.png">
												<div class="caption center-align">
													<h3>Carbon Cube</h3>
													<h5 class="light grey-text text-lighten-3">Accueil de l'appli web Carbon Cube</h5>
												</div>
											</li>
											<li>
												<img src="img/CarbonCube_Calcul.png">
												<div class="caption center-align">
													<h3>Carbon Cube</h3>
													<h5 class="light grey-text text-lighten-3">Formulaire de calcul du volume de CO2 émis</h5>
												</div>
											</li>
										</ul>
									</div>
								</div>


							</div>

						</div>

					</div>

				</div>

			</div>


			<div class="row">
      <div class="card blue-grey darken-1">
        <div class="card-content white-text">
          <span class="card-title">Réseaux Sociaux</span>
          <p>Mes dernières activités sur différents réseaux sociaux !</p>
        </div>
        <div class="card-action">
          <a href="#">Instagram</a>
          <a href="#">This is a link</a>
        </div>
      </div>
  </div>




		</div>

		<!-- ################################################################### -->

		<!-- ################################################################### -->

		<?php

	}

	/*else {
	echo 'Mot de Passe Incorrect'
}*/

}


?>

<?php include('includes/footer.php'); ?>
<!-- Scripts -->

<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

<script src="js/materialize.js"></script>

<script src="js/init.js"></script>


<script>


document.addEventListener('DOMContentLoaded', function() {
	var elems = document.querySelectorAll('.slider');
	var instances = M.Slider.init(elems, options);
});

// Or with jQuery

$(document).ready(function(){
	$('.slider').slider();
});


// ################


</script>


</body>

</html>
