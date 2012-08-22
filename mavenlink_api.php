<?php

namespace MavenlinkApi;
{
  require 'classes.php';

  define('DEV', 1);
  define('CREDS', '9:fe48b519-1008-0a4a-c302-72083273ad57');

  function Get_workspaces()
  {
    return Get_json_for(Workspace);
  }

  function Get_events()
  {
    return Get_json_for(Event);
  }

  function Get_time_entries()
  {
    return Get_json_for(TimeEntry);
  }

  function Get_expenses()
  {
    return Get_json_for(Expense);
  }

  function Get_invoices()
  {
    return Get_json_for(Invoice);
  }

  function Get_stories()
  {
    return Get_json_for(Story);
  }

  function Get_users()
  {
    return Get_json_for(User);
  }

  function Create_post_for_workspace($workspace_id, $post_array)
  {
    return Create_new(Post, $workspace_id, $post_array);
  }
  
  function Create_story_for_workspace($workspace_id, $story_array)
  {
    return Create_new(Story, $workspace_id, $story_array);
  }
  
  function Create_time_entry_for_workspace($workspace_id, $time_entry_array)
  {
    return Create_new(TimeEntry, $workspace_id, $time_entry_array);
  }
  
  function Create_expense_for_workspace($workspace_id, $expense_array)
  {
    return Create_new(Expense, $workspace_id, $expense_array);
  }
  
  function Get_json_for($item)
  {
    $path_property = new \ReflectionProperty($item, 'path');

    $item_path = Get_base_uri() . $path_property->getValue();

    $curl = Get_curl_handle($item_path, CREDS);

    $json = curl_exec($curl);

    return $json;
  }

  function Create_new($item, $workspace_id, $params)
  {
    $new_path = $item::Get_path_for_new($workspace_id);
    $curl = Create_post_request($new_path, CREDS, $params);
    $response = curl_exec($curl);

    return $response;
  }

  function Create_post_request($url, $access_credentials, $params)
  {
    $curl_handle = Get_curl_handle($url, $access_credentials);
    curl_setopt($curl_handle, CURLOPT_POSTFIELDS, $params);

    return $curl_handle;
  }

  function Get_base_uri()
  {
    return DEV == 1 ? 'https://mavenlink.local/api/v0/' : 'https://www.mavenlink.com/api/v0/';
  }

  function Get_curl_handle($url, $access_credentials)
  {
    $curl_options = array
      (
      CURLOPT_URL => $url,
      CURLOPT_USERPWD => $access_credentials,
      CURLOPT_RETURNTRANSFER => TRUE
    );

    $curl_handle = curl_init();
    curl_setopt_array($curl_handle, $curl_options);

    if (DEV == 1)
    {
      curl_setopt($curl_handle, CURLOPT_SSL_VERIFYHOST, 0);
    }

    return $curl_handle;
  }
}

//end of file client.php
// Location /client.php
?>