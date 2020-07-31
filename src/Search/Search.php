<?php

namespace Purencool\Search;

/**
 *  Search
 *
 * @author Purencool
 * @license GPLV3
 * @package Purencool\Search
 *
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
    foreach($arr as $k => $v) {
      if(is_array($v)){
        $results[$k] = $this->arrayParsing($arr[$k], [ $this->param['tagging__key'] => 0 ]);
      } else {
        $results['element_data'][]= ['key' => $k, 'data' => $v];
        $results['iteration_count']++;

      }
    }

    return $results;
  }

  /**
   * @param $arr
   * @param $search_key
   * @return array
   */
  private function arrayKeyFinding($arr, $search_key) : array
  {
    $results = [];
    foreach($arr as $k => $v) {
      if(is_array($v)){
          $results[$k] = $this->arrayKeyFinding($arr[$k], $search_key);
      } else {
        if($k == $search_key) {
          $results[$search_key] = $v;
        }
      }
    }

    return $results;
  }

  /**
   * @param $arr
   * @return array
   */
  private function arrayFlatten($arr) : array
  {
    $return = [];
    array_walk_recursive($arr, function($a) use (&$return) { $return[] = $a; });
    return $return;
  }


  /**
   * @inheritDoc
   */
  protected function iteratingOverArray($arr) : int
  {
    if(!is_array($arr) || empty($arr)){ return 0; }

    $this->iteratingOverArrayResult = $this->arrayParsing(
        $arr,[$this->param['tagging__key'] => 0 ]
    );

    $this->arrayKeyFindingResult = $this->arrayKeyFinding(
        $this->iteratingOverArrayResult ,$this->param['tagging__key']
    );

    $this->arrayFlattenResult = $this->arrayFlatten($this->arrayKeyFindingResult);

    return array_sum($this->arrayFlattenResult);

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

    if(is_array($search)){
      return '';
    } elseif (stripos($search,$request) !== '' && $type == 'partial'){
      return $request;
    } elseif(strpos($search,$request) !== '' && $type == 'absolute'){
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

  protected function searchArrayForElement($request, $search, $meta = false): array
  {
    if(!is_array($search) || empty($search)){return []; };



    return [
      'iterations_over_array' =>  $this->iteratingOverArray($search)

    ];
  }

  /**
   * @inheritDoc
   */
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