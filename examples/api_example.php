<?php
require '../lib/mavenlink_api.php';
$mavenlinkApi = new MavenlinkApi('<oauthTokenHere>');

$workspacesJson = $mavenlinkApi->getWorkspaces();
$workspacesDecodedJson = json_decode($workspacesJson, true);
echo '<h1> Your workspaces: </h1>';
echo '<ul>';
$totalBudget = 0;

foreach ($workspacesDecodedJson[results] as $dataItem) {
  $workspace = $workspacesDecodedJson[$dataItem[key]][$dataItem[id]];
  echo '<li>' . $workspace[title] . '<br /> Budget: ' . $workspace[price] . '<br /><br /></li>';
  $totalBudget = $totalBudget + $workspace[price_in_cents];
}
echo '</ul>';
setlocale(LC_MONETARY, 'en_US');
echo '<br /><br /><h3> Total Project Budgets: ' . money_format('%i', $totalBudget/100) . '</h3>';
?>
