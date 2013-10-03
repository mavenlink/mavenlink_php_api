<?php

require '../lib/mavenlink_api.php';

$client = new MavenlinkApi('<oauthTokenHere>');

// $workspacesJson = $client->getWorkspace(8);
// print_r("workspaces....");
// print_r($workspacesJson);
// print_r("\n\n\n\n\n\n\n\n");

// $eventsJson = $client->getEvents();
// print_r("events");
// print_r($eventsJson);
// print_r("\n\n\n\n\n\n\n\n");

// $timeEntriesJson = $client->getTimeEntry(1);
// print_r("Time entries@!");
// print_r($timeEntriesJson);
// print_r("\n\n\n\n\n\n\n\n");

// $expenses = $client->getExpense(2);
// print_r("expenses!");
// print_r($expenses);
// print_r("\n\n\n\n\n\n\n\n");

// $invoicesJson = $client->getInvoice(1);
// print_r("Invoices!");
// print_r($invoicesJson);
// print_r("\n\n\n\n\n\n\n\n");

// $storiesJson = $client->getStory(9);
// print_r("stories!");
// print_r($storiesJson);
// print_r("\n\n\n\n\n\n\n\n");

// $usersJson = $client->getUsers();
// print_r("users!");
// print_r($usersJson);
// print_r("\n\n\n\n\n\n\n\n");

// $workspacePosts = $client->getAllPostsFromWorkspace(8);
// print_r($workspacePosts);
// print_r("\n\n\n\n\n\n\n\n");

// $workspaceTimeEntries = $client->getAllTimeEntriesFromWorkspace(8);
// print_r($workspaceTimeEntries);
// print_r("\n\n\n\n\n\n\n\n");

// $workspaceExpenses = $client->getAllExpensesFromWorkspace(8);
// print_r($workspaceExpenses);
// print_r("\n\n\n\n\n\n\n\n");

// $workspaceStories = $client->getAllStoriesFromWorkspace(8);
// print_r($workspaceStories);
// print_r("\n\n\n\n\n\n\n\n");

// //expense 2 from workspace 8:
// //print_r($client->getWorkspaceExpense(8,2));

// //print_r("getting time entry 0!!!\n\n\n\");

// //print_r($client->getExpense(1));

// //print_r("getting expense 2!!!!!");
// //print_r($client->getExpense(2));

// //get workspace
// //print_r($client->getWorkspacePost(8,19));


// //create workspace post:

//$response = $client->createPostForWorkspace(527968, array('message' => 'Wrapped Param!!!!'));
// print_r($response);

// //update post in workspace:
// $response = $client->updateWorkspacePost(8, 20, array("post[message]" => "Updated message"));
// print_r($response);


// //delete workspace post:
// $response = $client->deleteWorkspacePost(8, 19);
// print_r($response);

// //create workspace story:

// $response = $client->createStoryForWorkspace(8, array('story[title]' => 'create a workspace story via PHP library', 'story[story_type]' => 'deliverable'));
// print_r($response);

// //update story in workspace:
// $response = $client->updateWorkspaceStory(8, 10, array("story[title]" => "Change the story title!", "story[description]" => "Add a description too!"));
// print_r($response);


//delete workspace story:
// $response = $client->deleteWorkspaceStory(8, 10);
// print_r($response);

// get all invoices for workspace
// $response = $client->getAllInvoicesFromWorkspace(8);
// print_r($response);

// get specific invoice
// $response = $client->getWorkspaceInvoice(69, 13);
// print_r($response);

// get workspace participants
// $response = $client->getAllParticipantsFromWorkspace(8);
// print_r($response);

// create workspace
//$response = $client->createWorkspace(array("title" => "Learning Emacs", "creator_role" => "maven"));
//print_r($response);

// update workspace
//$response = $client->updateWorkspace(9, array("workspace[description]" => "hello"));
//print_r($response);

//invite user
//$response = $client->inviteToWorkspace(1167893, array("invitation[full_name]" => "Php Programmer", "invitation[email_address]" => "php_programmer@mavenlink.com", "invitation[invitee_role]" => "maven"));
//print_r($response);

//get all workspaces
//$response = $client->getWorkspaces();
//print_r($response);
?>