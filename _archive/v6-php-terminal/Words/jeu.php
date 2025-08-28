<input type="hidden" name="save_player_id" id="save_player_id" value="<?php echo $player['id']; ?>">
<div class="row">
  <div class="col s2">
    <h5>Game numéro <?php echo $game_id; ?></h5>
    <br>
    <table id="players_scores">

    </table>
    <br>
    <button type="button" name="button" onclick="ajax_players(<?php echo $game_id; ?>)">MAJ</button>
  </div>
  <div class="col s8 center">
    <h5>USE YOUR WORDS (du pauvre)</h5>
    <div id="media"> </div>
    <button type="button" name="button" onclick="ajax_media(<?php echo $game_id; ?>)">MAJ</button>
    <br><br>
    <div id="answers_list">

    </div>
    <br>
    <button type="button" name="button" onclick="show_answers(<?php echo $game_id; ?>)">MAJ</button>
  </div>
  <div class="col s2 center">
    <h5>Réponse</h5>
    <input type="text" name="answer" id="answer" value="">
    <button type="button" name="button" onclick="ajax_sumbit_answer(<?php echo $game_id.', '.$player['id']; ?>)">Répondre !</button>
    <br>
    <br>
    <br>
    <hr>
    <br>
    <br>
    <h5>Répondu</h5>
    <div id="other_answers">

    </div>
    <button type="button" name="button" onclick="ajax_others_answers(<?php echo $game_id; ?>)">MAJ</button>
  </div>
</div>
