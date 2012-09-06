<?php
require_once('simpletest/autorun.php');
require_once('../mavenlink_api.php');
require_once('../classes.php');

class TestOfMavenlinkApi extends UnitTestCase
{
  function testWrapParamForCorrectlyWrapsParamsArrayKeys()
  {
    $paramKey = "message";
    $apiObj = new MavenlinkApi(null, null);
    $this->assertEqual($apiObj->wrapParamFor(Post, $paramKey), "post[message]");
  }

  function testLabelParamKeysReturnsTheArrayLabelledCorrectlyWithTheObject()
  {
    $testArray = array("message" => "Hi this is a test message", "subject_id" => 45, "subject_type" => "Post");
    $apiObj = new MavenlinkApi(null, null);
    $labelledArray = $apiObj->labelParamKeys(Post, $testArray);
    print_r("\n");
    print_r($labelledArray);
    print_r("\n");


    $this->assertEqual($apiObj->labelParamKeys(Post, $testArray), array("post[message]" => "Hi this is a test message", "post[subject_id]" => 45, "post[subject_type]" => "Post"));
  }
}

?>