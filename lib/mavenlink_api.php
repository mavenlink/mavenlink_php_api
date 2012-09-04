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

  function getWorkspace($id)
  {
    return $this->getShowJsonFor(Workspace, $id);
  }

  function createWorkspace($workspaceParamsArray)
  {
    $newPath  = Workspace::getResourcesPath();
    $curl     = $this->createPostRequest($newPath, $this->loginInfo, $workspaceParamsArray);
    $response = curl_exec($curl);

    return $response;
  }

  function updateWorkspace($workspaceId, $workspaceParamsArray)
  {
    $updatePath = Workspace::getResourcePath($workspaceId);
    $curl       = $this->createPutRequest($updatePath, $this->loginInfo, $workspaceParamsArray);
    $response   = curl_exec($curl);

    return $response;
  }

  function getAllParticipantsFromWorkspace($workspaceId)
  {
    return $this->getJson(Participant::getWorkspaceResourcesPath($workspaceId));
  }

  function getAllInvoicesFromWorkspace($workspaceId)
  {
    return $this->getJson(Invoice::getWorkspaceResourcesPath($workspaceId));
  }

  function getWorkspaceInvoice($workspaceId, $invoiceId)
  {
    return $this->getJson(Invoice::getWorkspaceResourcePath($workspaceId, $invoiceId));
  }

  function getAllPostsFromWorkspace($workspaceId)
  {
    return $this->getJson(Post::getWorkspaceResourcesPath($workspaceId));
  }

  function createPostForWorkspace($workspaceId, $postParamsArray)
  {
    return $this->createNew(Post, $workspaceId, $postParamsArray);
  }

  function getWorkspacePost($workspaceId, $postId)
  {
    return $this->getJson(Post::getWorkspaceResourcePath($workspaceId, $postId));
  }

  function updateWorkspacePost($workspaceId, $postId, $updateParams)
  {
    return $this->updateModel(Post, $workspaceId, $postId, $updateParams);
  }

  function deleteWorkspacePost($workspaceId, $postId)
  {
    return $this->deleteModel(Post, $workspaceId, $postId);
  }

  function getAllStoriesFromWorkspace($workspaceId)
  {
    return $this->getJson(Story::getWorkspaceResourcesPath($workspaceId));
  }

  function createStoryForWorkspace($workspaceId, $storyParamsArray)
  {
    return $this->createNew(Story, $workspaceId, $storyParamsArray);
  }

  function getWorkspaceStory($workspaceId, $storyId)
  {
    return $this->getJson(Story::getWorkspaceResourcePath($workspaceId, $storyId));
  }

  function updateWorkspaceStory($workspaceId, $storyId, $updateParams)
  {
    return $this->updateModel(Story, $workspaceId, $storyId, $updateParams);
  }

  function deleteWorkspaceStory($workspaceId, $storyId)
  {
    return $this->deleteModel(Story, $workspaceId, $storyId);
  }

  function getAllTimeEntriesFromWorkspace($workspaceId)
  {
    return $this->getJson(TimeEntry::getWorkspaceResourcesPath($workspaceId));
  }

  function createTimeEntryForWorkspace($workspaceId, $timeEntryParamsArray)
  {
    return $this->createNew(TimeEntry, $workspaceId, $timeEntryParamsArray);
  }

  function getWorkspaceTimeEntry($workspaceId, $timeEntryId)
  {
    return $this->getJson(TimeEntry::getWorkspaceResourcePath($workspaceId, $timeEntryId));
  }

  function updateWorkspaceTimeEntry($workspaceId, $timeEntryId, $updateParams)
  {
    return $this->updateModel(TimeEntry, $workspaceId, $timeEntryId, $updateParams);
  }

  function deleteWorkspaceTimeEntry($workspaceId, $timeEntryId)
  {
    return $this->deleteModel(TimeEntry, $workspaceId, $timeEntryId);
  }

  function getAllExpensesFromWorkspace($workspaceId)
  {
    return $this->getJson(Expense::getWorkspaceResourcesPath($workspaceId));
  }

  function createExpenseForWorkspace($workspaceId, $expenseParamsArray)
  {
    return $this->createNew(Expense, $workspaceId, $expenseParamsArray);
  }

  function getWorkspaceExpense($workspaceId, $expenseId)
  {
    return $this->getJson(Expense::getWorkspaceResourcePath($workspaceId, $expenseId));
  }

  function updateWorkspaceExpense($workspaceId, $expenseId, $updateParams)
  {
    return $this->updateModel(Expense, $workspaceId, $expenseId, $updateParams);
  }

  function deleteWorkspaceExpense($workspaceId, $expenseId)
  {
    return $this->deleteModel(Expense, $workspaceId, $expenseId);
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

  function createNew($model, $workspaceId, $params)
  {
    $newPath = $model::getWorkspaceResourcesPath($workspaceId);
    $curl     = $this->createPostRequest($newPath, $this->loginInfo, $params);
    $response = curl_exec($curl);

    return $response;
  }

  function updateModel($model, $workspaceId, $resourceId, $params)
  {
    $updatePath = $model::getWorkspaceResourcePath($workspaceId, $resourceId);
    $curl = $this->createPutRequest($updatePath, $this->loginInfo, $params);

    $response = curl_exec($curl);

    return $response;
  }

  function deleteModel($model, $workspaceId, $resourceId)
  {
    $resourcePath = $model::getWorkspaceResourcePath($workspaceId, $resourceId);
    $curl = $this->createDeleteRequest($resourcePath, $this->loginInfo);

    return $response = curl_exec($curl);
  }

  function createPostRequest($url, $accessCredentials, $params)
  {
    $curlHandle = $this->getCurlHandle($url, $accessCredentials);
    curl_setopt($curlHandle, CURLOPT_POSTFIELDS, $params);

    return $curlHandle;
  }

  function createPutRequest($url, $accessCredentials, $params)
  {
    $curlHandle = $this->getCurlHandle($url, $accessCredentials);
    curl_setopt($curlHandle, CURLOPT_CUSTOMREQUEST, 'PUT');
    curl_setopt($curlHandle, CURLOPT_POSTFIELDS, $params);

    return $curlHandle;
  }

  function createDeleteRequest($url, $accessCredentials)
  {
    $curlHandle = $this->getCurlHandle($url, $accessCredentials);
    curl_setopt($curlHandle, CURLOPT_CUSTOMREQUEST, 'DELETE');

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