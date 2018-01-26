<?php
/**
 * Created by PhpStorm.
 * User: indro
 * Date: 26.01.2018
 * Time: 11:32
 */

$input_battle_tag = trim($_POST['battletag']);

require 'conn.php';

$get_battletag_from_db = "SELECT battle_tag FROM battletag where battle_tag = '$input_battle_tag'";
$result = $conn->query($get_battletag_from_db);
if ($result->num_rows == 0) {

    $encoded_battletag = urlencode($input_battle_tag);

    $options = array('http' => array('user_agent' => 'custom user agent string'));
    $context = stream_context_create($options);
    $response = @file_get_contents("https://owapi.net/api/v3/u/$encoded_battletag/blob", false, $context);
    $parsed_json = json_decode($response);

    // Check if battletag exists in API
    $check = $parsed_json->eu;

    if (empty($check)) {
        exit('Sellist battletagi ei eksisteeri: ' . $input_battle_tag);
    }


    $overall_stats = $parsed_json->eu->stats->competitive->overall_stats;

    $parsed_to_array = json_decode($response, true);

    $level = $overall_stats->prestige * 100 + $overall_stats->level;


    $sql = "INSERT INTO battletag (battle_tag, lvl, avatar, rank, tier, wins, lost, ties, played)
    VALUES ('$input_battle_tag', $level, '$overall_stats->avatar', $overall_stats->comprank, '$overall_stats->tier', $overall_stats->wins, $overall_stats->losses, $overall_stats->ties, $overall_stats->games)";
    $final = $conn->query($sql);

    exit('Ok');

} else {

    exit('Ok');

}
