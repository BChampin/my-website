<div class="row">
  <h3><b>Contact</b></h3></br>
</div>

<div class="row">
  <form method="post" action="?p=envoi_mail">
    <div class="contact">
      <p>Nom et prénom / Name and first name :<input type="text" class="white-text" name="name" size="30" /></p>
      <p>Votre adresse mail / Your email adress <span style="color:#ff0000;">*</span>: <input type="text" class="white-text" name="email" size="30" /></p>

      <select name="subject" class="browser-default">
        <option value="" disabled selected>Sujet / Subject *</option>
        <option value="Contact_Pro">Contact professionnel / Professional Contact</option>
        <option value="Site">Commentaires sur le site / Comments about website</option>
        <option value="Autres">Autres / Others</option>
      </select>

      <p>Message <span style="color:#ff0000;">*</span>:</p>
      <textarea name="message" class="white-text" cols="60" rows="10"></textarea>
      <p><input type="submit" name="submit" value="Envoyer / Send" /></p>
    </div>
  </form>

</div>
