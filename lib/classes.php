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

  public static function getResourcePath($resource_id)
  {
    return MavenlinkApi::getBaseUri() . self::path() . "/$resource_id" . ".json";
  }

  public static function getWorkspaceResourcePath($workspace_id)
  {
    return MavenlinkApi::getBaseUri() . "workspaces/$workspace_id/" . self::path() . ".json";
  }
}

class Workspace extends MavenlinkApiObject
{
  public static $path = 'workspaces';
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