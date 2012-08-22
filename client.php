<?php

require 'mavenlink_api.php';

$workspaces = json_decode(MavenlinkApi\Get_workspaces());

$stuff = json_decode(MavenlinkApi\Get_workspaces());

print_r($stuff);

print_r('--------');

//print_r(MavenlinkApi\Create_post_for_workspace(8, array('post[message]' => 'this is a test!!')));

print_r(MavenlinkApi\Create_expense_for_workspace(8, array('expense[date]' => '09/09/1999', 'expense[category]' => 'Stuffed Animals', 'expense[amount_in_cents]' => '1000000')));
//$workspaces = json_decode(MavenlinkApi\Get_json_for(Workspace::path));





//print_r(MavenlinkApi\Create_workspace_post($first_workspace->id, array('post[message]' => 'test post')));

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
