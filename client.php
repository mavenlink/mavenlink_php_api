<?php

require 'mavenlink_api.php';

$brain = new Brain(1923189, 'beab98f1-e154-8b75-61fd-6e59347d46b7');

$workspaces = json_decode($brain->Get_workspaces());

//$stuff = json_decode(MavenlinkApi\Get_workspaces());

print_r($workspaces);

print_r('--------');

//print_r(MavenlinkApi\Create_post_for_workspace(8, array('post[message]' => 'this is a test!!')));

print_r($brain->Create_expense_for_workspace(1167889, array('expense[date]' => '09/09/1999', 'expense[category]' => 'Stuffed Animals again!', 'expense[amount_in_cents]' => '1000000')));
//$workspaces = json_decode(MavenlinkApi\Get_json_for(Workspace::path));





//print_r(MavenlinkApi\Create_workspace_post($first_workspace->id, array('post[message]' => 'test post')));

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
