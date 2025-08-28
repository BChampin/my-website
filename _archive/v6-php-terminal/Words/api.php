<?php
$ENV = parse_ini_file('.env');

$db = new PDO($ENV['WORDS_BDD_CONNECTION'], $ENV['WORDS_BDD_USER'], $ENV['WORDS_BDD_PASSWORD']);

function join_game($game_id) {
  global $db;
  $game = $db->query('SELECT * FROM uyw_game where id = '.$game_id)->fetchAll(PDO::FETCH_ASSOC);
  if (count($game) == 1) {
    $stmt = $db->prepare ("INSERT INTO uyw_player (game_id, pseudo) VALUES (:game_id, :pseudo)");
    $stmt -> bindParam(':game_id', $game_id);
    $stmt -> bindParam(':pseudo', $_GET['pseudo']);
    $stmt -> execute();

    $player = $db->query('SELECT * FROM uyw_player where game_id = '.$game_id.' AND pseudo = "'.$_GET['pseudo'].'"')->fetchAll(PDO::FETCH_ASSOC);
    $player = $player[0];
    include('jeu.php');
  }
  else {
    echo 0;
  }
}

function get_players($game_id) {
  global $db;
  $players =  $db->query('SELECT * FROM uyw_player WHERE game_id = '.$game_id)->fetchAll(PDO::FETCH_ASSOC);
  $answers = $db->query('SELECT * FROM uyw_answer WHERE game_id = '.$game_id)->fetchAll(PDO::FETCH_ASSOC);
  foreach ($players as &$play) {   $play['score'] = 0; }
  foreach ($answers as $ans) {
    foreach ($players as &$play) {
      if ($ans['player_id'] == $play['id']) {
        $play['score'] += $ans['voted'];
      }
    }
  }
  foreach ($players as $play) {
    $db->prepare("UPDATE uyw_player SET score = ? WHERE id=?")->execute([$play['score'], $play['id']]);
  }
  echo json_encode($db->query('SELECT * FROM uyw_player where game_id = '.$game_id.' ORDER by score desc')->fetchAll(PDO::FETCH_ASSOC));
}

function get_media($game_id) {
  global $db;
  echo json_encode($db->query('SELECT * FROM uyw_media WHERE game_id = '.$game_id.' AND displayed = 0 LIMIT 1')->fetchAll(PDO::FETCH_ASSOC));
}

function other_answers($game_id) {
  global $db;
  $return = [];
  $actual_media_id = $db->query('SELECT * FROM uyw_media WHERE game_id = '.$game_id.' AND displayed = 0 LIMIT 1')->fetchAll(PDO::FETCH_ASSOC)[0]['id'];
  $answers = $db->query('SELECT * FROM uyw_answer WHERE game_id = '.$game_id.' AND media_id = '.$actual_media_id)->fetchAll(PDO::FETCH_ASSOC);
  $players =  $db->query('SELECT * FROM uyw_player WHERE game_id = '.$game_id)->fetchAll(PDO::FETCH_ASSOC);
  if (count($players) != count($answers)) {
    foreach ($answers as $ans) {
      foreach ($players as $play) {
        if ($ans['player_id'] == $play['id']) {
          array_push($return, $play['pseudo']);
        }
      }
    }
    echo json_encode($return);
  }
  else {
    echo 0;
  }
}

function sumbit_answer($game_id) {
  global $db;
  $actual_media_id = $db->query('SELECT * FROM uyw_media WHERE game_id = '.$game_id.' AND displayed = 0 LIMIT 1')->fetchAll(PDO::FETCH_ASSOC)[0]['id'];
  $stmt = $db->prepare ("INSERT INTO uyw_answer (game_id, media_id, player_id, texte) VALUES (:game_id, :media_id, :player_id, :texte)");
  $stmt -> bindParam(':game_id', $game_id);
  $stmt -> bindParam(':media_id', $actual_media_id);
  $stmt -> bindParam(':player_id', $_GET['player_id']);
  $stmt -> bindParam(':texte', $_GET['answer']);
  $stmt -> execute();
  echo 1;
}

function show_answers($game_id) {
  global $db;
  $actual_media_id = $db->query('SELECT * FROM uyw_media WHERE game_id = '.$game_id.' AND displayed = 0 LIMIT 1')->fetchAll(PDO::FETCH_ASSOC)[0]['id'];
  $players =  $db->query('SELECT * FROM uyw_player WHERE game_id = '.$game_id)->fetchAll(PDO::FETCH_ASSOC);
  $answers = $db->query('SELECT * FROM uyw_answer WHERE game_id = '.$game_id.' AND media_id = '.$actual_media_id)->fetchAll(PDO::FETCH_ASSOC);

  if (count($players) == count($answers)) {
    $return = [];
    foreach ($answers as $ans) {
      array_push($return, ["id" => $ans['id'], "texte" => $ans['texte']]);
    }
    echo json_encode($return);
  }
  else {
    echo 0;
  }
}

function vote_answer($game_id)
{
  global $db;
  $db->prepare("UPDATE uyw_answer SET voted = voted + 1 WHERE id=?")->execute([$_GET['answer_id']]);
  echo 1;
}

function add_media_page($game_id) {
  include('add_media_page.php');
}

function add_medias($game_id) {
  global $db;
  $game = $db->query('SELECT * FROM game where id = '.$game_id)->fetchAll(PDO::FETCH_ASSOC);

  if (count($game) == 1 && $game['locked'] == '0') {
    for ($i=1; $i <=5 ; $i++) {
      if (isset($_GET['url_'.$i])) {
        $stmt = $db->prepare ("INSERT INTO uyw_media (game_id, url, is_photo, is_video) VALUES (:game_id, :url, :is_photo, :is_video)");
        $photo = $_GET['url_'.$i.'_type'] == 'false' ? '1' : '0';
        $video = $_GET['url_'.$i.'_type'] == 'true' ? '1' : '0';
        $stmt -> bindParam(':game_id', $game_id);
        $stmt -> bindParam(':url', $_GET['url_'.$i]);
        $stmt -> bindParam(':is_photo', $photo);
        $stmt -> bindParam(':is_video', $video);
        $stmt -> execute();
      }
    }
    echo 1;
  }
  else {
    echo 0;
  }
}

function ajax_create_game($game_id) {
  global $db;
  $date = date("Y-m-d H:i:s");
  $stmt = $db->prepare ("INSERT INTO uyw_game (started_at) VALUES (:started_at)");
  $stmt -> bindParam(':started_at', $date);
  $stmt -> execute();
  $game = $db->query('SELECT * FROM uyw_game ORDER BY id DESC LIMIT 1')->fetchAll(PDO::FETCH_ASSOC)[0];
  $new_game_id = $game['id'];
  include('create_game.php');
}

function lock($game_id) {
  global $db;

  $game = $db->query('SELECT * FROM uyw_game where id = '.$game_id)->fetchAll(PDO::FETCH_ASSOC);
  if (count($game) == 1 && $game[0]['locked'] == '0') {
    $db->prepare("UPDATE uyw_game SET locked = 1 WHERE id=?")->execute([$game_id]);
    echo 1;
  }
  else {
    echo 0;
  }
}


$game_id = $_GET['game'] ?? 0;
$request = $_GET['request'];

switch ($request) {
  case 'join':
    join_game($game_id);
    break;
  case 'players':
    get_players($game_id);
    break;
  case 'media':
    get_media($game_id);
    break;
  case 'other_answers':
    other_answers($game_id);
    break;
  case 'sumbit_answer':
    sumbit_answer($game_id);
    break;
  case 'show_answers':
    show_answers($game_id);
    break;
  case 'vote_answer':
    vote_answer($game_id);
    break;
  case 'add_media_page':
    add_media_page($game_id);
    break;
  case 'add_medias':
    add_medias($game_id);
    break;
  case 'ajax_create_game':
    ajax_create_game($game_id);
    break;
  case 'lock':
    lock($game_id);
    break;
  default:
    // code...
    break;
}
