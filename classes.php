<?php

class WorkspaceObject
{
  public static function Path()
  {
    return static::$path;
  }
  
  public static function Get_path_for_new($workspace_id)
  {
    return MavenlinkApi\Get_base_uri() . "workspaces/$workspace_id/" . self::Path();
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

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
