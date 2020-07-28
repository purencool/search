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
    $this->assertTrue(is_bool($obj->getCheckElementIsArray([])));
    unset($obj);
  }


}
