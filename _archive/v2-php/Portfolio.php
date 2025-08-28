<?php include('includes/env.php'); ?>
<?php include('includes/head.php'); ?>
<?php include('includes/securite_bdd.php'); ?>

<?php

try
{

	$bdd = new PDO($ENV['BDD_CONNECTION'], $ENV['BDD_USER'], $ENV['BDD_PASSWORD']);
}

catch(Exception $e)

{

	echo ("Problème d'authentification.");
}


$reponse = $bdd->query('SELECT * FROM LOGIN_PORTFOLIO order by ID asc');


while ($donnees = $reponse->fetch())

{

	$NomUti = $_POST['NomUtilisateur'];
	$Passe = $_POST['MotDePasse'];

	if(isset($NomUti) AND isset($Passe) AND $donnees['NomUtilisateur'] == $NomUti AND $donnees['MotDePasse'] == $Passe)

	{

		?>


		<div class="black-text" id="div_portfolio">
			<div class="row">
				<div class="col s12">
					<h4 class="left">E-Portfolio de Bastien Champin</h4>
					<h6 class="right">
						<?php echo "Bienvenue ".$NomUti; ?>
					</h6>
				</div>
			</div>

			<div class="row">
				<div class="col s12 m4">
					<div class="card">
						<div class="card-image">
							<img src="img/Portfolio/profil.jpg">
							<span class="card-title">PHOTOGRAPHIE DE PROFIL</span>
						</div>
					</div>
					<div class="card">
						<div class="card-action">
							INFORMATIONS GÉNÉRALES
						</div>
						<hr>
						<div class="card-content">
							<ul>
								<li><strong>Prénom:</strong> Bastien</li>
								<li><strong>Nom:</strong> Champin</li>
								<li><strong>Adresse web officielle:</strong> <a href="<?php echo($ENV['HOSTED_URL']); ?>"><?php echo($ENV['HOSTED_URL']); ?></a></li>
								<li><strong>Adresse de courriel:</strong> <a href="mailto:<?php echo($ENV['CONTACT_EMAIL']); ?>"><?php echo($ENV['CONTACT_EMAIL']); ?></a></li>
							</ul>
						</div>
					</div>
				</div>

				<div class="col s12 m8">
					<div class="card hoverable">
						<div class="card-image waves-effect waves-block waves-light">
							<img class="activator" src="img/Portfolio/presentation.png">
						</div>
						<div class="card-content">
							<span class="card-title activator grey-text text-darken-4">PRÉSENTATION<i class="material-icons right">more_vert</i></span>
						</div>
						<div class="card-reveal">
							<span class="card-title grey-text text-darken-4">Présentation<i class="material-icons right">close</i></span>
							<p>Bienvenue, je m'appelle Bastien CHAMPIN, je suis né le 13 Novembre 1999. Je suis actuellement étudiant en deuxième année de DUT Informatique à l'<a href="http://www.unicaen.fr/iutcaen/" target="_blank">IUT de Caen</a> (antenne d'Ifs).</p>
							<p>J'ai rejoint cette formation après avoir obtenu mon baccalauréat scientifique avec mention très bien, au lycée <a href="https://guehenno.etab.ac-caen.fr/" target="_blank">Jean Guéhenno de Flers</a>.</p>
							<p>J'ai toujours été curieux et avide de connaissances, dans n'importe quel domaine que ce soit. Cependant, seul le domaine de l'informatique me permettait de devoir maintenir ces connaissances à jour régulièrement. Le stage de découverte en 3ème m'a permis de découvrir une entreprise de l'intérieur (<a href="http://www.informathis.com/" target="_blank">Inform'Athis</a>) et d'approfondir mes connaissances en informatique. Il a aussi confirmé mon choix de m'engager dans des études informatiques par la suite.</p>
							<p>Je souhaite découvrir les mécanismes internes des ordinateurs, des sites web, ... et c'est pourquoi je pense m'orienter vers une école d'ingénieurs dans le but de devenir webmaster après l'obtention de mon DUT.</p>
						</div>
					</div>

					<div class="card">
						<div class="card-tabs">
							<ul class="tabs tabs-fixed-width">
								<li class="tab"><a class="active" href="#skills_info">COMPÉTENCES INFORMATIQUES</a></li>
								<li class="tab"><a href="#skills_langue">COMPÉTENCES LINGUISTIQUES</a></li>
							</ul>
						</div>
						<div class="card-content">
							<div id="skills_info">
								<table class="tg">
									<tr>
										<th>Web</th>
										<th>Programmation<br></th>
										<th>Bases de données <br></th>
									</tr>
									<tr>
										<td>★★★★☆ - HTML<br>★★★★☆ - CSS<br>★★★★☆ - Javascript<br></td>
										<td>★★★★☆ - C<br>★★★☆☆ - Java<br>★★★☆☆ - Python<br></td>
										<td>★★★☆☆ - SQL<br>★☆☆☆☆ - PL/SQL<br>★★★☆☆ - PHP<br></td>
									</tr>
								</table>
							</div>
							<div id="skills_langue">
								<ul>
									<li>Français : parfaitement maîtrisé (langue maternelle)</li>
									<li>Anglais : parlé et écrit à un niveau tout à fait convenable (Certification de Cambridge de niveau B1)</li>
									<li>Espagnol : parlé et écrit à un niveau correct</li>
								</ul>
							</div>
						</div>
					</div>

				</div>
			</div>


			<div class="row">
				<div class="col s12">
					<div class="card">
						<div class="card-action">
							CURRICULUM VITAE
						</div>
						<hr>
						<div class="card-content">
							<iframe src="files/CV_Bastien_CHAMPIN.doc.pdf" width="100%" height="500" frameborder="0" view="FitB"></iframe>
						</div>
					</div>
				</div>
			</div>


			<div class="row">
				<div class="col s12">
					<div class="card">
						<div class="card-action">
							MES PROJETS TERMINÉS, EN COURS OU FUTURS
						</div>
						<hr>
						<div class="card-tabs">
							<ul class="tabs tabs-fixed-width">
								<li class="tab"><a class="active" href="#jeux_python">JEUX EN PYTHON</a></li>
								<li class="tab"><a href="#shing_shang">SHING SHANG EN C ET EN JAVA</a></li>
								<li class="tab"><a href="#naup">NETWORK AUTOMATION USING PYTHON</a></li>
								<li class="tab"><a href="#carbon_cube">CARBON CUBE</a></li>
							</ul>
						</div>
						<div class="card-content">
							<div id="jeux_python">
								<p>Dans le cadre de ma spécialité ISN (Informatique et Sciences du Numérique) au lycée, nous devions réaliser par groupes un jeu en Python. La durée allouée pour la création de ce jeu était de trois mois. Avec l'aide de deux camarades, nous avons réalisé un "remake" du célèbre jeu Pacman. Comme nous avancions rapidement, nous avons aussi développé deux autres jeux (le pierre-feuille-ciseaux et le jeu des allumettes) ainsi qu'une interface pour lancer ces différents jeux.</p>
								<p><a href="http://comparaisonordinateur.blogspot.fr/2012/11/les-regles-du-jeu-et-de-la-strategie.html" target="_blank">Voir les règles du Pacman</a></p>
								<p><a href="http://www.gecif.net/articles/mathematiques/jeu_allumettes.html" target="_blank">Voir les règles du jeu des allumettes</a></p>
							</div>
							<div id="shing_shang">
								<p>Lors de la première année du DUT Informatique, nous devions réaliser le jeu du "Shing-Shang" dans le langage C, puis en Java. Ce jeu de plateau consiste à amener l'un de ses dragons sur l'un des deux portails adverses. Le but était de rendre ce jeu de plateau jouable sur ordinateur, avec un affichage "console" (donc très simple), avec la possibilité de sauvegarder et de reprendre une partie plus tard. Il est à noter que j'ai réalisé la version en C seul mais que la version Java a été établie en binôme avec Élise Le Mazier.</p>
								<p><a href="http://jeuxstrategieter.free.fr/Shing_shang_complet.php" target="_blank">Voir le détail des règles du Shing Shang</a></p>
							</div>
							<div id="naup">
								<p>Dans le cadre du DUT Informatique, nous devons réaliser en groupe un projet qui s'étale sur les deux ans de la formation. Avec 3 camarades, nous avons choisi le projet "Network Automation Using Python", dont le commanditaire est un professeur en Réseaux et Télécommunications à l'IUT de Caen. Nous devons réaliser une interface permettant d'automatiser au maximum la configuration de machines en réseaux, comme des routeurs ou des swithcsc. Pour nous aider, nous disposons de GNS3, un logiciel de simulation de réseaux, ce qui nous permet de tester notre travail sans avoir le matériel physique. Il est à noter cependant que nos scripts d'automatisation doivent fonctionner aussi bien sur des machines virtueles que rélles.</p>
							</div>
							<div id="carbon_cube">
								<p>Dans le cadre de la première année du DUT Informatique, nous devions réaliser en groupe un projet en fin d'année, visant à tester nos capacités de coopération et de travail en équipe, ainsi que notre qualité d'écoute quant aux souhaits d'un client. Ce projet consistait à développer une application web pour Monsieur Aubry, en se basant uniquement sur les objectifs du client, ses souhaits, nos capacités, ... le tout sur une durée de trois jours. Durant cette courte période, nous avons pu créer l'application web consistant à calculer le volume de CO2 que l'on produit lors d'un trajet, selon certains critères (carburant, type de véhicule, longueur du trajet, ...) ainsi que l'application mobile. Cette expérience nous a permis de mettre concrètement en application nos différents apprentissages au cours de cette 1ère année de DUT. Le site, Carbon Cube, n'est pas encore accessible, mais le sera bientôt.</p>
							</div>

							<br><hr><br>

							<div class="slider" class="fullscreen">
								<ul class="slides" style="height:10px;">
									<li>
										<img src="img/Portfolio/Interface - Pachomme.png">
										<div class="caption left-align">
											<h3>Jeux en Python</h3>
											<h5 class="light grey-text text-lighten-3">Interface d'accueil du projet</h5>
										</div>
									</li>
									<li>
										<img src="img/Portfolio/Pachomme.png">
										<div class="caption left-align">
											<h3>Jeux en Python</h3>
											<h5 class="light grey-text text-lighten-3">Remake du Pacman</h5>
										</div>
									</li>
									<li>
										<img src="img/Portfolio/Allumettes.png">
										<div class="caption right-align">
											<h3>Jeux en Python</h3>
											<h5 class="light grey-text text-lighten-3">Jeu des Allumettes</h5>
										</div>
									</li>
									<li>
										<img src="img/Portfolio/Shifumi.png">
										<div class="caption center-align">
											<h3>Jeux en Python</h3>
											<h5 class="light grey-text text-lighten-3">Jeu du pierre-feuille-ciseaux</h5>
										</div>
									</li>
									<li>
										<img src="img/Portfolio/quicommence.png">
										<div class="caption center-align">
											<h3>Shing-Shang en C</h3>
											<h5 class="light grey-text text-lighten-3">Menu et initialisation d'une partie</h5>
										</div>
									</li>
									<li>
										<img src="img/Portfolio/debut_game.png">
										<div class="caption center-align">
											<h3>Shing-Shang en C</h3>
											<h5 class="light grey-text text-lighten-3">Début d'une partie</h5>
										</div>
									</li>
									<li>
										<img src="img/Portfolio/suite_save.png">
										<div class="caption center-align">
											<h3>Shing-Shang en C</h3>
											<h5 class="light grey-text text-lighten-3">Demande de tour suivant ou sauvegarde</h5>
										</div>
									</li>
									<li>
										<img src="img/Portfolio/CarbonCube_Accueil.png">
										<div class="caption center-align">
											<h3>Carbon Cube</h3>
											<h5 class="light grey-text text-lighten-3">Accueil de l'appli web Carbon Cube</h5>
										</div>
									</li>
									<li>
										<img src="img/Portfolio/CarbonCube_Calcul.png">
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

		<!-- ################################################################### -->

		<!-- ################################################################### -->

		<?php

	}

	else {
		echo ("Problème d'authentification.");
	}

}


?>

<?php include('includes/footer.php'); ?>
