<?php

namespace Purencool\Search;


/**
*  Search
*
*  @author purencool
*/
class Search extends SearchAbstract implements SearchInterface {


  /**
   *
   *
   *
   * @param array $arr
   * @param  array $results
   * @return array
   */
  private function arrayParsing($arr, array $results) : array
  {
    foreach($arr as $key => $value) {
      if(!$this->checkElementIsArray($value)){
        $results['element_data'][]= ['key' => $key, 'data' => $value];
        $results['iteration_count']++;
      } else {
        $results['sub'] = $this->arrayParsing($value, $results);
      }
    }

    return $results;
  }

  /**
   * @param $arr
   * @param $find
   * @return array
   */
  private function arrayKeyFinding($arr, $find) : array
  {
    $resultsFinder = [];
    foreach($arr as $key => $value) {
      if(!$this->checkElementIsArray($value)){
        if($key == $find){
          $resultsFinder[$find]= $value;
        }
      } else {
        $resultsFinder['sub'] = $this->arrayKeyFinding($value, $find);
      }
    }

    return $resultsFinder;
  }

  /**
   * @param $array
   * @return array
   */
  private function arrayFlatten($array){
    if (!is_array($array)) {
      // nothing to do if it's not an array
      return array($array);
    }

    $result = array();
    foreach ($array as $value) {
      // explode the sub-array, and add the parts
      $result = array_merge($result, $this->arrayFlatten($value));
    }

    return $result;
  }


  /**
   * @inheritDoc
   */
  protected function iteratingOverArray($arr) : int
  {

    $this->iteratingOverArrayResult = $this->arrayParsing($arr,[ $this->param['iterating_count_key'] => 0 ]);

    $itemsInArray = $this->arrayFlatten(
      $this->arrayKeyFinding( $this->iteratingOverArrayResult ,$this->param['iterating_count_key'])
    );

    $return = 0;
    foreach ($itemsInArray as $value){
      $return = $return + $value;
    }

   return $return;

  }

  /**
   * @inheritDoc
   */
  protected function checkElementIsArray($arr) : bool
  {

    return is_array($arr);
  }

  /**
   * @inheritDoc
   */
  protected function searchStringElement($request, $search, $type = 'partial') : string
  {

    if($this->checkElementIsArray($search)){
      return '';
    }

    if(stripos($search,$request) !== '' && $type == 'partial'){
      return $request;
    }

    if(strpos($search,$request) !== '' && $type == 'absolute'){
      return $request;
    }

    return '';

  }

  /**
   * @inheritDoc
   */
  protected function trackKeyPath($arr) : array
  {
    return ['trackKeyPath'];
  }

  /**
   * @inheritDoc
   */
  protected function attachToSearchReply($arr) : array
  {
    return ['attachToSearchReply'];
  }

  public function getParams(): array
  {
    return $this->param;
  }

  /**
   * @param array $searchArray
   * @param string $searchString
   * @return array
   */
  public function getSearchResults($searchArray = [],$searchString = "") : array
  {
    if($this->iteratingOverArrayResult == null) {
      return [];
    }
    return $this->iteratingOverArrayResult;
  }
}