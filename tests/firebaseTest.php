<?php
namespace DataService;

use Exception;

class FirebaseTest extends \PHPUnit_Framework_TestCase
{
  protected $_firebase;
  protected $_todoMilk = array(
    'name' => 'Pick the milk',
    'priority' => 1
  );

  protected $_todoBeer = array(
    'name' => 'Pick the beer',
    'priority' => 2
  );

  protected $_todoLEGO = array(
    'name' => 'Pick the LEGO',
    'priority' => 3
  );

  // --- set up your own database here
  const DEFAULT_URL = 'https://luminous-fire-608.firebaseio.com/';
  const DEFAULT_TOKEN = 'whdFSArccEM4huzd7eSxlPku7y3F5zIi8Zf2Hx81';
  const DEFAULT_TODO_PATH = '/example';
  const DELETE_PATH = '/example';
  const DEFAULT_SET_RESPONSE = '{"name":"Pick the milk","priority":1}';
  const DEFAULT_UPDATE_RESPONSE = '{"name":"Pick the beer","priority":2}';
  const DEFAULT_PUSH_RESPONSE = '{"name":"Pick the LEGO","priority":3}';
  const DEFAULT_DELETE_RESPONSE = 'null';
  const DEFAULT_URI_ERROR = 'You must provide a baseURI variable.';

  public function setUp()
  {
    $this->_firebase = new FirebaseLib(self::DEFAULT_URL, self::DEFAULT_TOKEN);
  }

  public function testNoBaseURI()
  {
    $errorMessage = null;
    try {
      new FirebaseLib();
    } catch (Exception $e) {
      $errorMessage = $e->getMessage();
    }

    $this->assertEquals(self::DEFAULT_URI_ERROR, $errorMessage);
  }

  public function testSet()
  {
    $response = $this->_firebase->set(self::DEFAULT_TODO_PATH, $this->_todoMilk);
    $this->assertEquals(self::DEFAULT_SET_RESPONSE, $response);
  }

  public function testGetAfterSet()
  {
    $response = $this->_firebase->get(self::DEFAULT_TODO_PATH);
    $this->assertEquals(self::DEFAULT_SET_RESPONSE, $response);
  }

  public function testUpdate()
  {
    $response = $this->_firebase->update(self::DEFAULT_TODO_PATH, $this->_todoBeer);
    $this->assertEquals(self::DEFAULT_UPDATE_RESPONSE, $response);
  }

  public function testGetAfterUpdate()
  {
    $response = $this->_firebase->get(self::DEFAULT_TODO_PATH);
    $this->assertEquals(self::DEFAULT_UPDATE_RESPONSE, $response);
  }

  public function testPush()
  {
    $response = $this->_firebase->push(self::DEFAULT_TODO_PATH, $this->_todoLEGO);
    $this->assertRegExp('/{"name"\s?:\s?".*?}/', $response);
    return $this->parsePushResponse($response);
  }

  /**
   * @depends testPush
  */
  public function testGetAfterPush($responseName)
  {
    $response = $this->_firebase->get(self::DEFAULT_TODO_PATH . '/' . $responseName);
    $this->assertEquals(self::DEFAULT_PUSH_RESPONSE, $response);
  }

  public function testDelete()
  {
    $response = $this->_firebase->delete(self::DELETE_PATH);
    $this->assertEquals(self::DEFAULT_DELETE_RESPONSE, $response);
  }

  public function testGetAfterDELETE()
  {
    $response = $this->_firebase->get(self::DEFAULT_TODO_PATH);
    $this->assertEquals(self::DEFAULT_DELETE_RESPONSE, $response);
  }

  private function parsePushResponse($response) {
    $responseObj = json_decode($response);
    return $responseObj->name;
  }
}
