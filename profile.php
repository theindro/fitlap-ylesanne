<?php
/**
 * Created by PhpStorm.
 * User: indro
 * Date: 26.01.2018
 * Time: 13:35
 */
require 'template.html';
require 'conn.php';

$battletag = $_GET['battletag'];

$sql = "SELECT * FROM battletag where battle_tag = '$battletag'";
$result = mysqli_query($conn, $sql);
if ($row = mysqli_fetch_array($result)) {
    $battle_tag_id = $row['battle_tag_id'];
    $battle_tag = $row['battle_tag'];
    $lvl = $row['lvl'];
    $avatar = $row['avatar'];
    $rank = $row['rank'];
    $tier = $row['tier'];
    $wins = $row['wins'];
    $lost = $row['lost'];
    $ties = $row['ties'];
    $played = $row['played'];
}

?>

<div id="main">
    <div class="container">
        <h1>Profile</h1>
        <div class="row head">

            <div class="col-md-2">
                <img class="avatar" src="<?= $avatar ?>" alt="">
            </div>

            <div class="col-md-10">
                <h2 class="btag"><?= $battle_tag ?></h2>
                <br>
                <h2 class="rank">Rank: <?= $rank ?></h2>
            </div>


        </div>
    </div>
</div>

<div class="container" style="margin-top:20px;">
    <h2><?= $battle_tag ?></h2>
    <p>This is your profile page and u can find some information about your Overwatch game account.</p>
    <h4>Your stats:</h4>
    <ul class="list-group">
        <li class="list-group-item">Level: <?= $lvl ?></li>
        <li class="list-group-item">Tier: <?= $tier ?></li>
        <li class="list-group-item">Wins: <?= $wins?></li>
        <li class="list-group-item">Losses: <?= $lost?></li>
        <li class="list-group-item">Ties: <?= $ties?></li>
        <li class="list-group-item">Total games played: <?= $played?></li>
    </ul>
</div>

