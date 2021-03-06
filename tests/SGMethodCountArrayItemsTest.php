<?php 
use PHPUnit\Framework\TestCase;

/**
 * Search class structure tests
 *
 *  @author Purencool
 */
class SearchcountArrayItemsTest extends TestCase
{


  /**
   * Check this class
   */
  public function testSearchcountArrayItemsTest ()
  {
    $this->assertTrue(is_string('testSearchcountArrayItemsTest'));
  }


  /**
   * Check method
   */
  public function testcountArrayItems()
  {

    $testObj = Purencool\TestData\TestData::defaultArray();
    $obj = new Purencool\Search\SearchGetters($testObj);
    $this->assertTrue(is_int($obj->getCountArrayItems([])));
    $obj = null;
  }

  /**
   * Iterates over multidimensional arrays using recursion and calls methods
   * to build out a response with metadata for the requested response. Returns
   * an INT with the amount of iterations completed.
   */
  public function testIteratingOverMultipleArrays()
  {
    // @todo remove iterate over array var not needed

    $testObj = new Purencool\TestData\TestData();

    // 0 elements in the array
    $obj = new Purencool\Search\SearchGetters([]);
    $this->assertTrue(($obj->getCountArrayItems() == 0 ));
    $obj = null;

    // 6 elements in the array
    $obj = new Purencool\Search\SearchGetters($testObj::defaultArray());
    $this->assertTrue(($obj->getCountArrayItems() == 6 ));
    $obj = null;


    // 18 elements in the array
    $obj = new Purencool\Search\SearchGetters($testObj::defaultMultidimensionalArray());
    $this->assertTrue(($obj->getCountArrayItems() == 18));
    $obj = null;
  }

}
