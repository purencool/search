<?php 
use PHPUnit\Framework\TestCase;

/**
 * Search class structure tests
 *
 *  @author Purencool
 */
class SearchCheckElementIsArrayTest extends TestCase
{

  /**
   * Check this class
   */
  public function testSearchCheckElementIsArrayTest()
  {
    $this->assertTrue(is_string('testSearchCheckElementIsArrayTest'));
  }


  public function testCheckElementIsArray()
  {
    $obj = new Purencool\Search\SearchGetters();
    $this->assertTrue(is_array($obj->getCheckElementIsArray([])));
    unset($obj);
  }


  public function testCheckElementIsArrayWithString()
  {
    $obj = new Purencool\Search\SearchGetters();
    $this->assertTrue(!is_array($obj->getCheckElementIsArray('test string')));
    unset($obj);
  }

}
