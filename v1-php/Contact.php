<?php include('includes/env.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <?php include('includes/head.php'); ?>
  <!-- Titre  -->
  <title>Contact</title>
</head>

<body>
  <?php include('includes/nav.php');?>

  <form method="post" action="php/mail.php">

    <div class="row">
      <div class="input-field col s6">
        <i class="material-icons prefix"><img src="img/account_circle.png"></i>
        <input id="icon_prefix" type="text" class="validate" name="nom" required="required">
        <label for="icon_prefix" class="blue-text text-darken-4">Prénom</label>
      </div>
      <div class="input-field col s6">
        <i class="material-icons prefix"><img src="img/phone.png"></i>
        <input id="icon_telephone" type="tel" class="validate" name="telephone">
        <label for="icon_telephone" class="blue-text text-darken-4">Téléphone</label>
      </div>
    </div>

    <div class="row">
      <div class="input-field col s12">
        <i class="material-icons prefix"><img src="img/email.png"></i>
        <label for="email" class="blue-text text-darken-4">Email</label>
        <input id="email" type="email" class="validate" name="mail" required="required">
        <span class="helper-text" data-error="L'email doit être de la forme : domaine@domaine.domaine" data-success="L'adresse e-mail est correcte."></span>
      </div>
    </div>

    <div class="row">
      <div class="input-field col s12">
        <i class="material-icons prefix"><img src="img/speaker_notes.png"></i>
        <select id="sujet" class="" name="sujet" required="required">
          <option value="" disabled selected>Sujet</option>
          <option value="Question">Question à l'administrateur</option>
          <option value="Aide">Proposition d'aide</option>
          <option value="Commentaire">Commentaire</option>
          <option value="Amélioration">Suggestion d'amélioration</option>
          <option value="Autre">Autre</option>
        </select>
        <p id="alertMessage" style="visibility : hidden; color : red;">Veuillez sélectionner un sujet</p>
      </div>
    </div>

    <div class="row">
      <div class="input-field col s12">
        <i class="material-icons prefix"><img src="img/mode_comment.png"></i>
        <textarea id="icon_prefix2" class="materialize-textarea" name="message" required="required"></textarea>
        <label for="icon_prefix2" class="blue-text text-darken-4">Message</label>
      </div>
    </div>

    <div class="row center">
      <button id="action" class="btn waves-effect waves-light center" type="submit" name="action" style="margin : auto; width : 10%;">
        <i class="material-icons prefix"><img src="img/send.png"></i>
      </button>
    </div>
  </form>

</br></br></br>
<?php include('includes/footer.php');?>

</body>
</html>
