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
    return $this->getJsonFor(Workspace);
  }

  function getEvents()
  {
    return $this->getJsonFor(Event);
  }

  function getTimeEntries()
  {
    return $this->getJsonFor(TimeEntry);
  }

  function getExpenses()
  {
    return $this->getJsonFor(Expense);
  }

  function getInvoices()
  {
    return $this->getJsonFor(Invoice);
  }

  function getStories()
  {
    return $this->getJsonFor(Story);
  }

  function getUsers()
  {
    return $this->getJsonFor(User);
  }

  function createPostForWorkspace($workspaceId, $postArray)
  {
    return $this->createNew(Post, $workspaceId, $postArray);
  }

  function createStoryForWorkspace($workspaceId, $storyArray)
  {
    return $this->createNew(Story, $workspaceId, $storyArray);
  }

  function createTimeEntryForWorkspace($workspaceId, $timeEntryArray)
  {
    return $this->createNew(TimeEntry, $workspaceId, $timeEntryArray);
  }

  function createExpenseForWorkspace($workspaceId, $expenseArray)
  {
    return $this->createNew(Expense, $workspaceId, $expenseArray);
  }

  function getJsonFor($item)
  {
    $pathProperty = new \ReflectionProperty($item, 'path');

    $itemPath = $this->getBaseUri() . $pathProperty->getValue();

    $curl = $this->getCurlHandle($itemPath, $this->loginInfo);

    $json = curl_exec($curl);

    return $json;
  }

  function createNew($item, $workspaceId, $params)
  {
    $newPath = $item::getPathForNew($workspaceId);
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