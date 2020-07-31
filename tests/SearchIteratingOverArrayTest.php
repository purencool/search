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

    $testObj = Purencool\TestData\TestData::defaultArray();
    $obj = new Purencool\Search\SearchGetters($testObj);
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
    // @todo remove iterate over array var not needed

    $testObj = new Purencool\TestData\TestData();

    // 0 elements in the array
    $obj = new Purencool\Search\SearchGetters($testObj::defaultArray());
    $this->assertTrue(($obj->getIteratingOverArray([]) == 0 ));
    unset($obj);

    // 6 elements in the array
    $obj = new Purencool\Search\SearchGetters($testObj::defaultArray());
    $this->assertTrue(($obj->getIteratingOverArray($testObj::defaultArray()) == 6 ));
    unset($obj);


    // 18 elements in the array
    $obj = new Purencool\Search\SearchGetters($testObj::defaultMultidimensionalArray());
    $this->assertTrue(($obj->getIteratingOverArray($testObj::defaultMultidimensionalArray()) == 18));
    unset($obj);
  }

}
