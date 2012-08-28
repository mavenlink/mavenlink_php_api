<?php

if (!function_exists('curl_init'))
{
  throw new Exception('Mavenlink PHP API Client requires the CURL PHP extension');
}

require_once 'classes.php';

class MavenlinkApi
{
  private static $devMode = true;
  private $loginInfo = null;

  function __construct($userId, $apiToken, $production = true)
  {
    $this->loginInfo = $userId . ':' . $apiToken;

    if ($production)
    {
      self::$devMode = false;
    }
  }

  function getWorkspaces()
  {
    return $this->getJsonForAll(Workspace);
  }

  function getEvents()
  {
    return $this->getJsonForAll(Event);
  }

  function getTimeEntries()
  {
    return $this->getJsonForAll(TimeEntry);
  }

  function getExpenses()
  {
    return $this->getJsonForAll(Expense);
  }

  function getInvoices()
  {
    return $this->getJsonForAll(Invoice);
  }

  function getStories()
  {
    return $this->getJsonForAll(Story);
  }

  function getUsers()
  {
    return $this->getJsonForAll(User);
  }

  function getWorkspace($id)
  {
    return $this->getShowJsonFor(Workspace, $id);
  }

  function getTimeEntry($id)
  {
    return $this->getShowJsonFor(TimeEntry, $id);
  }

  function getExpense($id)
  {
    return $this->getShowJsonFor(Expense, $id);
  }

  function getInvoice($id)
  {
    return $this->getShowJsonFor(Invoice, $id);
  }

  function getStory($id)
  {
    return $this->getShowJsonFor(Story, $id);
  }

  function createPostForWorkspace($workspaceId, $postParamsArray)
  {
    return $this->createNew(Post, $workspaceId, $postParamsArray);
  }

  function getAllPostsFromWorkspace($workspaceId)
  {
    return $this->getJson(Post::getWorkspaceResourcePath($workspaceId));
  }

  function createStoryForWorkspace($workspaceId, $storyParamsArray)
  {
    return $this->createNew(Story, $workspaceId, $storyParamsArray);
  }

  function getAllStoriesFromWorkspace($workspaceId)
  {
    return $this->getJson(Story::getWorkspaceResourcePath($workspaceId));
  }

  function createTimeEntryForWorkspace($workspaceId, $timeEntryParamsArray)
  {
    return $this->createNew(TimeEntry, $workspaceId, $timeEntryParamsArray);
  }

  function getAllTimeEntriesFromWorkspace($workspaceId)
  {
    return $this->getJson(TimeEntry::getWorkspaceResourcePath($workspaceId));
  }

  function createExpenseForWorkspace($workspaceId, $expenseParamsArray)
  {
    return $this->createNew(Expense, $workspaceId, $expenseParamsArray);
  }

  function getAllExpensesFromWorkspace($workspaceId)
  {
    return $this->getJson(Expense::getWorkspaceResourcePath($workspaceId));
  }

  function getJsonForAll($model)
  {
    $resourcesPath = $model::getResourcesPath();
    return $this->getJson($resourcesPath);
  }

  function getShowJsonFor($model, $id)
  {
    $resourcePath = $model::getResourcePath($id);
    return $this->getJson($resourcePath);
  }

  function getJson($path)
  {
    $curl = $this->getCurlHandle($path, $this->loginInfo);

    $json = curl_exec($curl);

    return $json;
  }

  function createNew($item, $workspaceId, $params)
  {
    $newPath = $item::getWorkspaceResourcePath($workspaceId);
    $curl     = $this->createPostRequest($newPath, $this->loginInfo, $params);
    $response = curl_exec($curl);

    return $response;
  }

  function createPostRequest($url, $accessCredentials, $params)
  {
    $curlHandle = $this->getCurlHandle($url, $accessCredentials);
    curl_setopt($curlHandle, CURLOPT_POSTFIELDS, $params);

    return $curlHandle;
  }

  public static function getBaseUri()
  {
    return self::$devMode ? 'https://mavenlink.local/api/v0/' : 'https://www.mavenlink.com/api/v0/';
  }

  function getCurlHandle($url, $accessCredentials)
  {
    $curlOptions = array
    (
      CURLOPT_URL            => $url,
      CURLOPT_USERPWD        => $accessCredentials,
      CURLOPT_RETURNTRANSFER => TRUE
    );

    $curlHandle = curl_init();
    curl_setopt_array($curlHandle, $curlOptions);

    if (self::$devMode)
    {
      curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 0);
    }

    return $curlHandle;
  }
}
?>