<div class="row">
  <div class="col s10 offset-s1">
    <h5>Ajout de médias</h5>
    <br>
    <br>
    Numéro de la partie : <input type="text" name="insert_game_id" id="insert_game_id" placeholder="Numéro">
    <br><br><br>
    URLs : (cochez si c'est une vidéo)
    <input type="text" name="url_1" id="url_1" class="col s10">
    <label class="col s2">
      <input type="checkbox" name="url_1_type" id="url_1_type">
      <span>Vidéo ?</span>
    </label>
    <br>
    <input type="text" name="url_2" id="url_2" class="col s10">
    <label class="col s2">
      <input type="checkbox" name="url_2_type" id="url_2_type">
      <span>Vidéo ?</span>
    </label>
    <br>
    <input type="text" name="url_3" id="url_3" class="col s10">
    <label class="col s2">
      <input type="checkbox" name="url_3_type" id="url_3_type">
      <span>Vidéo ?</span>
    </label>
    <br>
    <input type="text" name="url_4" id="url_4" class="col s10">
    <label class="col s2">
      <input type="checkbox" name="url_4_type" id="url_4_type">
      <span>Vidéo ?</span>
    </label>
    <br>
    <input type="text" name="url_5" id="url_5" class="col s10">
    <label class="col s2">
      <input type="checkbox" name="url_5_type" id="url_5_type">
      <span>Vidéo ?</span>
    </label>
    <br>
    <button class="col s12" type="button" name="button" onclick="ajax_add_medias()">Ajouter mes médias !</button>
  </div>
</div>
