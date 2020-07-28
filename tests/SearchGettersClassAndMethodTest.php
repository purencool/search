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


}
