<?php

require '../mavenlink_api.php';

$mavenlinkApi = new MavenlinkApi(1923189, 'beab98f1-e154-8b75-61fd-6e59347d46b7');

print_r($workspaces = json_decode($mavenlinkApi->getWorkspaces(), true));
print_r($workspaces[0][title]);

//print_r($workspaces[0][title]);

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
