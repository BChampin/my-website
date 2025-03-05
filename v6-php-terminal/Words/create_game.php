<div class="row">
  <div class="col s10 offset-s1">

    Partie crée ! Les joueurs peuvent maintenant renseigner leurs médias en mettant le numéro :
    <br>
    <h6><?php echo $new_game_id; ?></h6>

    <button class="col s12" type="button" name="button" onclick="ajax_lock_game(<?php echo $new_game_id; ?>)">Verrouiller la partie</button>
  </div>
</div>
