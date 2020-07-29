<?php 
use PHPUnit\Framework\TestCase;

/**
 * Search class structure tests
 *
 *  @author Purencool
 */
class SearchIteratingOverArrayTest extends TestCase
{


  /**
   * Check this class
   */
  public function testSearchIteratingOverArrayTest ()
  {
    $this->assertTrue(is_string('testSearchIteratingOverArrayTest'));
  }


  /**
   * Check method
   */
  public function testIteratingOverArray()
  {
    $obj = new Purencool\Search\SearchGetters();
    $this->assertTrue(is_int($obj->getIteratingOverArray([])));
    unset($obj);
  }

  /**
   * Iterates over multidimensional arrays using recursion and calls methods
   * to build out a response with metadata for the requested response. Returns
   * an INT with the amount of iterations completed.
   */
  public function testIteratingOverMultipleArrays()
  {
    $obj = new Purencool\Search\SearchGetters();
    $testObj = new Purencool\TestData\TestData();

    // 0 elements in the array
    $this->assertTrue(($obj->getIteratingOverArray([]) == 0 ));

    // 6 elements in the array
    $this->assertTrue(($obj->getIteratingOverArray($testObj::defaultArray()) == 6 ));

    // 12 elements in the array
    $this->assertTrue(($obj->getIteratingOverArray($testObj::defaultMultidimensionalArray()) == 12 ));

    unset($obj);
  }

}
