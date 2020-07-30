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
   * @param array $arr
   * @param  array $results
   * @return array
   */
  private function arrayParsing($arr, array $results) : array
  {
    foreach($arr as $key => $value) {
      if($this->checkElementIsArray($value)){
        $results[$key] = $this->arrayParsing($arr[$key], [ $this->param['iterating_count_key'] => 0 ]);
      } else {
        $results['element_data'][]= ['key' => $key, 'data' => $value];
        $results['iteration_count']++;

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
        $resultsFinder[$key][0] = $this->arrayKeyFinding($arr[$key], $find);
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
      return [$array];
    }

    $result = [];
    foreach ($array as $value) {
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
    $this->arrayKeyFindingResult = $this->arrayKeyFinding( $this->iteratingOverArrayResult ,$this->param['iterating_count_key']);
    $this->arrayFlattenResult = $this->arrayFlatten($this->arrayKeyFindingResult);

  //  print_r($this->iteratingOverArrayResult); exit;
   // print_r($this->arrayKeyFindingResult); exit;
   // print_r($this->arrayFlattenResult); exit;

    $return = 0;
    foreach ($this->arrayFlattenResult as $value){
      $return = $return + $value;
    }

   // var_dump($return); exit;
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