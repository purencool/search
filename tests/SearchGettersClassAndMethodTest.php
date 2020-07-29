<?php 
use PHPUnit\Framework\TestCase;

/**
 * Search getter class structure tests
 *
 *  @author Purencool
 */
class SearchGettersClassAndMethodTest extends TestCase
{

  /**
   * Check this class
   */
  public function testSearchGettersClassAndMethodTest()
  {
    $this->assertTrue(is_string('testSearchGettersClassAndMethodTest'));
  }

  /**
   * Check if method exists
   */
  public function testObjectMethods()
  {
    $methodNamesArr = [
      'getIteratingOverArray',
      'getCheckElementIsArray',
      'getSearchStringElement',
      'getTrackKeyPath',
      'getAttachToSearchReply'
    ];

    $obj = new Purencool\Search\SearchGetters();
    foreach ($methodNamesArr as $methodNames ){
      $this->assertTrue(method_exists($obj, $methodNames));
    }
    unset($obj);
  }



  public function testGetIteratingOverArray()
  {
    $obj = new Purencool\Search\SearchGetters();
    $this->assertTrue(is_array($obj->getIteratingOverArray([])));
    unset($obj);
  }


  public function testCheckElementIsArray()
  {
    $obj = new Purencool\Search\SearchGetters();
    $this->assertTrue(is_bool($obj->getCheckElementIsArray([])));
    unset($obj);
  }


  public function testGetSearchStringElement()
  {
    $obj = new Purencool\Search\SearchGetters();
    $this->assertTrue(
      is_string($obj->getSearchStringElement('request','search', 'type'))
    );
    unset($obj);
  }


  public function testGetTrackKeyPath()
  {
    $obj = new Purencool\Search\SearchGetters();
    $this->assertTrue(is_array($obj->getTrackKeyPath([])));
    unset($obj);
  }


  public function testGetAttachToSearchReply()
  {
    $obj = new Purencool\Search\SearchGetters();
    $this->assertTrue(is_array($obj->getAttachToSearchReply([])));
    unset($obj);
  }

  public function testSetAndGetProtectedVariableParamMethods()
  {
    $obj = new Purencool\Search\SearchGetters();
    $obj->setParams(['over write the params array']);
    $result = $obj->getParams();
    $this->assertTrue($result[0] === 'over write the params array');
    unset($obj);
  }

}
