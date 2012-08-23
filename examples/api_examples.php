<!DOCTYPE html>
<html>
  <body>

<?php

require '../mavenlink_api.php';
$totalBudget = 0;
$mavenlinkApi = new MavenlinkApi(1923189, 'beab98f1-e154-8b75-61fd-6e59347d46b7');

$workspacesJson = $mavenlinkApi->getWorkspaces();
# echo 'json test: ' . $workspacesJson;
$workspacesDecodedJson = json_decode($workspacesJson, true);
echo '<h1> Your workspaces: </h1>';
echo '<ul>';
foreach ($workspacesDecodedJson as $workspace) {
	echo '<li>' . $workspace[title] . '<br> Budget: ' . $workspace[price] . '<br><br></li>';
	$totalBudget = $totalBudget + $workspace[price_in_cents];
}
echo '</ul>';
setlocale(LC_MONETARY, 'en_US');
echo '<br><br><h3> Total Project Budgets: ' . money_format('%i', $totalBudget/100);
?>
  </body>    
</html>