<?php

class WorkspaceObject
{
  public static function path()
  {
    return static::$path;
  }
  
  public static function getPathForNew($workspace_id)
  {
    return Brain::getBaseUri() . "workspaces/$workspace_id/" . self::Path();
  }
}

class Workspace
{
  public static $path = 'workspaces.json';
}

class Event
{
  public static $path = 'events.json';
}

class User
{
  public static $path = 'users.json';
}

class Invoice
{
  public static $path = 'invoices.json';
}

class TimeEntry extends WorkspaceObject
{
  public static $path = 'time_entries.json';
}

class Expense extends WorkspaceObject
{
  public static $path = 'expenses.json';
}

class Story extends WorkspaceObject
{
  public static $path = 'stories.json';
}

class Post extends WorkspaceObject
{
  public static $path = 'posts.json';
}
?>
