<?php

require 'classes.php';

class Brain
{
  private $login_info = null;
  private static $dev_mode = true;

  function __construct($user_id, $api_token, $production = false)
  {
    $this->login_info = $user_id . ':' . $api_token;

    if ($production)
    {
      self::$dev_mode = false;
    }
  }

  function Get_workspaces()
  {
    return $this->Get_json_for(Workspace);
  }

  function Get_events()
  {
    return $this->Get_json_for(Event);
  }

  function Get_time_entries()
  {
    return $this->Get_json_for(TimeEntry);
  }

  function Get_expenses()
  {
    return $this->Get_json_for(Expense);
  }

  function Get_invoices()
  {
    return $this->Get_json_for(Invoice);
  }

  function Get_stories()
  {
    return $this->Get_json_for(Story);
  }

  function Get_users()
  {
    return $this->Get_json_for(User);
  }

  function Create_post_for_workspace($workspace_id, $post_array)
  {
    return $this->Create_new(Post, $workspace_id, $post_array);
  }

  function Create_story_for_workspace($workspace_id, $story_array)
  {
    return $this->Create_new(Story, $workspace_id, $story_array);
  }

  function Create_time_entry_for_workspace($workspace_id, $time_entry_array)
  {
    return $this->Create_new(TimeEntry, $workspace_id, $time_entry_array);
  }

  function Create_expense_for_workspace($workspace_id, $expense_array)
  {
    return $this->Create_new(Expense, $workspace_id, $expense_array);
  }

  function Get_json_for($item)
  {
    $path_property = new \ReflectionProperty($item, 'path');

    $item_path = $this->Get_base_uri() . $path_property->getValue();

    $curl = $this->Get_curl_handle($item_path, $this->login_info);

    $json = curl_exec($curl);

    return $json;
  }

  function Create_new($item, $workspace_id, $params)
  {
    $new_path = $item::Get_path_for_new($workspace_id);
    $curl = $this->Create_post_request($new_path, $this->login_info, $params);
    $response = curl_exec($curl);

    return $response;
  }

  function Create_post_request($url, $access_credentials, $params)
  {
    $curl_handle = $this->Get_curl_handle($url, $access_credentials);
    curl_setopt($curl_handle, CURLOPT_POSTFIELDS, $params);

    return $curl_handle;
  }

  public static function Get_base_uri()
  {
    return self::$dev_mode ? 'https://mavenlink.local/api/v0/' : 'https://www.mavenlink.com/api/v0/';
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

    if (self::$dev_mode)
    {
      curl_setopt($curl_handle, CURLOPT_SSL_VERIFYHOST, 0);
    }

    return $curl_handle;
  }
}

?>