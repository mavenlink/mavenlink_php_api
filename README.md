Mavenlink PHP API Library (v 0)
===============================

The Mavenlink PHP API provides a set of functions that allow you to easily accomplish common tasks in Mavenlink supported by the Mavenlink REST API.


Usage
-----

require 'mavenlink_api.php'

$brain = new Brain(<user_id>, <api_token>);

//Get workspaces
$workspaces_json = $brain->Get_workspaces());

$workspaces = json_decode($workspaces_json);