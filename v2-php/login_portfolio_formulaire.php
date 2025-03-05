<?php include('includes/head.php'); ?>

<div class="container valign-wrapper">
	<div class="row center valign-wrapper">
		<form action="Portfolio.php" method="post" class="col s12">
			<fieldset>
				<legend>Se connecter</legend>
				<label for="NomUtilisateur" class="white-text">Nom d'utilisateur</label> : <input class="white-text" type="text" name="NomUtilisateur" id="NomUtilisateur" autofocus/><br />
				<label for="MotDePasse" class="white-text">Mot de passe</label> :  <input class="white-text" type="password" name="MotDePasse" id="MotDePasse" /><br />
				<br />
				<button class="btn waves-effect waves-light grey darken-1" type="submit" name="action" value="Connection">Submit
					<i class="material-icons right">send</i>
				</button>
			</fieldset>
		</form>
	</div>
</div>


<?php include('includes/footer.php'); ?>
