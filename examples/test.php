<?php
require '../lib/mavenlink_api.php';

$client = new MavenlinkApi(<user id>, <api token>);

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

// $response = $client->createPostForWorkspace(8, array('post[message]' => 'posting a message!!!'));
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


?>