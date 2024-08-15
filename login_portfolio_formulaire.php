<!DOCTYPE html>
<html>
<head>

	<?php include('includes/head.php'); ?>
	<!-- Titre  -->
	<title>Connection au Portfolio</title>

</head>
<body>
	<?php include('includes/nav.php'); ?>

	<!-- ##################################################################### -->
	<!-- ################ Formulaire html pour rentrer logins ################ -->
	<div class="row center">
		<form action="Portfolio.php" method="post" class="col s4 offset-s4">
			<fieldset>
				<legend>Se connecter</legend>
				<label for="NomUtilisateur" class="blue-text text-darken-4">Nom d'utilisateur</label> : <input type="text" name="NomUtilisateur" id="NomUtilisateur" autofocus/><br />
				<label for="MotDePasse" class="blue-text text-darken-4">Mot de passe</label> :  <input type="password" name="MotDePasse" id="MotDePasse" /><br />
				<br />
				<input type="submit" value="Connection" />
			</fieldset>
		</form>
	</div>

</br></br></br></br>

<?php include('includes/footer.php'); ?>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="js/materialize.js"></script>
<script src="js/init.js"></script>

</body>
</html>
