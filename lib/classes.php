<?php

class MavenlinkApiObject
{
  public static function path()
  {
    return static::$path;
  }

  public static function getResourcesPath()
  {
    return MavenlinkApi::getBaseUri() . self::path() . ".json";
  }

  public static function getResourcePath($resourceId)
  {
    return MavenlinkApi::getBaseUri() . self::path() . "/$resourceId" . ".json";
  }

  public static function getWorkspaceResourcePath($workspaceId, $resourceId)
  {
    return MavenlinkApi::getBaseUri() . "workspaces/$workspaceId/" . self::path() . "/$resourceId.json";
  }

  public static function getWorkspaceResourcesPath($workspaceId)
  {
    return MavenlinkApi::getBaseUri() . "workspaces/$workspaceId/" . self::path() . ".json";
  }
}

class Workspace extends MavenlinkApiObject
{
  public static $path = 'workspaces';
}

class Invitation extends MavenlinkApiObject
{
  public static $path = 'invite';
}

class Participant extends MavenlinkApiObject
{
  public static $path = 'participants';
}

class Event extends MavenlinkApiObject
{
  public static $path = 'events';
}

class User extends MavenlinkApiObject
{
  public static $path = 'users';
}

class Invoice extends MavenlinkApiObject
{
  public static $path = 'invoices';
}

class TimeEntry extends MavenlinkApiObject
{
  public static $path = 'time_entries';
}

class Expense extends MavenlinkApiObject
{
  public static $path = 'expenses';
}

class Story extends MavenlinkApiObject
{
  public static $path = 'stories';
}

class Post extends MavenlinkApiObject
{
  public static $path = 'posts';
}
?>