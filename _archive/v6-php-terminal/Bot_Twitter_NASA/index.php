<?php
//Fahrenheit to celsius
function fahrenheit_to_celsius($given_value){
	return round(5/9*($given_value-32),3);
}

function milesToKilometers($miles){
	return round($miles * 1.60934, 3);
}

function formatDate($param){
	return substr($param, 8, 2)."/".substr($param, 5, 2)."/".substr($param, 0, 4);
}

function fullWind($param){
	$return = '';
	switch ($param) {
		case 'N': $return = 'du Nord'; break;
		case 'NNE': $return = 'du Nord-Nord-Est'; break;
		case 'NE': $return = 'du Nord-Est'; break;
		case 'ENE': $return = 'de l\'Est-Nord-Est'; break;
		case 'E': $return = 'de l\'Est'; break;
		case 'ESE': $return = 'de l\'Est-Sud-Est'; break;
		case 'SE': $return = 'du Sud-Est'; break;
		case 'SSE': $return = 'du Sud-Sud-Est'; break;
		case 'S': $return = 'du Sud'; break;
		case 'SSW': $return = 'du Sud-Sud-Ouest'; break;
		case 'SW': $return = 'du Sud-Ouest'; break;
		case 'WSW': $return = 'de l\'Ouest-Sud-Ouest'; break;
		case 'W': $return = 'de l\'Ouest'; break;
		case 'WNW': $return = 'de l\'Ouest-Nord-Ouest'; break;
		case 'NW': $return = 'du Nord-Ouest'; break;
		case 'NNW': $return = 'du Nord-Nord-Ouest'; break;
		default: $return = false; break;
	}
	return $return;
}

$API_APOD = file_get_contents('https://api.nasa.gov/planetary/apod?api_key='.$ENV['NASA_API_KEY']);
$picture_array = json_decode($API_APOD, true);
$picture_url = $picture_array['url'];
$img = RELATIVE_PATH.'image.jpg';
file_put_contents($img, file_get_contents($picture_url));
$API_INSIGHT = file_get_contents('https://api.nasa.gov/insight_weather/?api_key='.$ENV['NASA_API_KEY'].'&feedtype=json&ver=1.0');

// Convert JSON string to Array
$dataArray = json_decode($API_INSIGHT, true);
$sol = max($dataArray['sol_keys']);
$date = formatDate($dataArray[$sol]['First_UTC']);


// Prepare array for tweet + history_log
$arr = [
	'sol' => $sol,
	'year' => explode('/', $date)[2],
	'month' => explode('/', $date)[1],
	'day' => explode('/', $date)[0],
	'full_date' => $date,
	'temp_mini' => fahrenheit_to_celsius($dataArray[$sol]['AT']['mn']),
	'temp_maxi' => fahrenheit_to_celsius($dataArray[$sol]['AT']['mx']),
	'vent_avge' => milesToKilometers($dataArray[$sol]['HWS']['av']),
	'vent_maxi' => milesToKilometers($dataArray[$sol]['HWS']['mx']),
];


// Write history
$tempArray = json_decode(file_get_contents(RELATIVE_PATH.'history.json'));
array_push($tempArray, $arr);
file_put_contents(RELATIVE_PATH.'history.json', json_encode($tempArray));


if ($arr['day'] == '01' && $arr['month'] == '01') { // 1er Janvier
	$tweet = "[".$arr['full_date']." - SOL ".$arr['sol']."]\r\n
	\u{1F389} Journée spéciale ! \u{1F389}
	En cette nouvelle année ".$arr['year'].", Insight et moi-même vous souhaitons tout le bonheur que vous pouvez espérer ! \u{1F973}
	(Pas de météo, je sais que vous décuvez ...\u{1F60F})
	À demain ! \u{1F4E1}";
}
elseif ($arr['day'] == '01') { // 1er de chaque mois = statistiques
	$history = json_decode(file_get_contents(RELATIVE_PATH."history.json"), true);
	$temp_mini = 0; $temp_maxi = -99999; $temp_avge = 0; $vent_avge = 0; $vent_maxi = 0; $nb = 0;
	foreach ($history as $log) {
		if (intval($log['month']) == intval($arr['month'])-1 && $log['year'] == $arr['year']) {
			$nb++;
			$temp_avge += ($log['temp_mini'] + $log['temp_maxi'])/2;
			$vent_avge += $log['vent_avge'];
			if ($temp_mini > $log['temp_mini']) { $temp_mini = $log['temp_mini']; }
			if ($temp_maxi < $log['temp_maxi']) { $temp_maxi = $log['temp_maxi']; }
			if ($vent_maxi < $log['vent_maxi']) { $vent_maxi = $log['vent_maxi']; }
		}
	}
	$temp_avge = round($temp_avge/$nb, 3);
	$vent_avge = round($vent_avge/$nb, 3);
	$months = [ '01' => 'Janvier', '02' => 'Février', '03' => 'Mars', '04' => 'Avril', '05' => 'Mai', '06' => 'Juin', '07' => 'Juillet', '08' => 'Août', '09' => 'Septembre', '10' => 'Octobre', '11' => 'Novembre', '12' => 'Décembre' ];

	$tweet = "[".$arr['full_date']." - SOL ".$arr['sol']."]\r\n
	\u{1F389} Nous débutons le mois de ".$months[$arr['month']]." ! \u{1F389}
	Profitons-en pour regarder les statistiques du mois dernier :
	Le vent moyen était de ".$vent_avge." km/h et il a soufflé au maximum à ".$vent_maxi." km/h.
	Parlons températures : \u{2744} $temp_mini / \u{267E} $temp_avge / \u{1F525} $temp_maxi
	Bonne journée !";
}
elseif ($arr['day'] == '26' && $arr['month'] == '11') { // 26 Novembre = landing birthdate
	$nb_year = intval($arr['year']) - 2018;
	$tweet = "[".$arr['full_date']." - SOL ".$arr['sol']."]\r\n
	\u{1F389} Journée spéciale ! \u{1F389}
	Cela fait ".$nb_year." ans que je me suis posé sur Mars ! \u{1F30F}
	Joyeux anniversaire à moi même ! \u{1F973}
	(Pour la peine pas de météo aujourd'hui, je suis en congé)
	À demain ! \u{1F4E1}";
}
else {
	$tweet = "[".$arr['full_date']." - SOL ".$arr['sol']."]\r\n
	\u{2604} Les températures varieront de ".$arr['temp_mini']." °C à ".$arr['temp_maxi']." °C .
	\u{1F32A} Le vent moyen sera de ".$arr['vent_avge']." km/h et viendra ".fullWind($dataArray[$arr['sol']]['WD']['most_common']['compass_point'])." avec des rafales à ".$arr['vent_maxi']." km/h.
	InSight vous souhaite une bonne journée !";
}

// #########################################################################
require "twitteroauth/autoload.php";
use Abraham\TwitterOAuth\TwitterOAuth;

$connection = new TwitterOAuth($ENV['TWITTER_CONSUMER_KEY'], $ENV['TWITTER_CONSUMER_SECRET'], $ENV['TWITTER_ACCESS_TOKEN'], $ENV['TWITTER_ACCESS_TOKEN_SECRET']);
$photo = $connection->upload("media/upload", ["media" => $img, "media_category" => "tweet_image"]);
$statues = $connection->post("statuses/update", ["status" => $tweet, "media_ids" => $photo->media_id_string]);
