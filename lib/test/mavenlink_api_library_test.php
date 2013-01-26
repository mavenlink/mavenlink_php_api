<?php
require_once('simpletest/autorun.php');
require_once('../mavenlink_api.php');
require_once('../classes.php');

class TestOfMavenlinkApi extends UnitTestCase
{
  function testLabelParamKeysReturnsTheArrayLabelledCorrectlyWithTheObject()
  {
    $testArray = array("message" => "Hi this is a test message", "subject_id" => 45, "subject_type" => "Post");
    $apiObj = new MavenlinkApi(null, null);
    $labelledArray = $apiObj->labelParamKeys(Post, $testArray);

    $this->assertEqual($apiObj->labelParamKeys(Post, $testArray), array("post[message]" => "Hi this is a test message", "post[subject_id]" => 45, "post[subject_type]" => "Post"));
  }

  function testKeyAlreadyWrappedReturnsTrueIfKeyIsAlreadyWrapped()
  {
    $apiObj = new MavenlinkApi(null, null);
    $this->assertTrue($apiObj->keyAlreadyWrapped(Post, "post[message]"));
    $this->assertFalse($apiObj->keyAlreadyWrapped(Post, "message"));
	$this->assertTrue($apiObj->keyAlreadyWrapped(TimeEntry, "time_entry[date_performed]"));
	$this->assertFalse($apiObj->keyAlreadyWrapped(TimeEntry, "date_performed"));
  }

  function testLabelParamKeysLabelsKeysNotAlreadyWrapped()
  {
    $testArray = array("message" => "Hi this is a test message", "post[subject_id]" => 45, "post[subject_type]" => "Post");
    $apiObj = new MavenlinkApi(null, null);

    $this->assertEqual($apiObj->labelParamKeys(Post, $testArray), array("post[message]" => "Hi this is a test message", "post[subject_id]" => 45, "post[subject_type]" => "Post"));

	$testArray = array("date_performed" => '01/01/2012', "time_entry[time_in_minutes]" => '200');

	$this->assertEqual($apiObj->labelParamKeys(TimeEntry, $testArray), array("time_entry[date_performed]" => '01/01/2012', "time_entry[time_in_minutes]" => '200'));
  }
}

?>