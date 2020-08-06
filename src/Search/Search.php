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
   * The constructor can load SearchArray
   *
   * SearchGetters constructor.
   * @param $searchArray
   * @param array $param;
   *
   */
  public function __construct($searchArray = [], $param = []) {
    parent::__construct($searchArray, $param);
    $this->searchArrayInit($searchArray);
  }


  /**
   * @param string $tag
   */
  private function setTag($tag)
  {
    $this->param['tagging__key'] = $tag;
  }


  /**
   * @param $arr
   * @param $keyCheck
   * @return bool
   */
  private function arrValidator($arr, $keyCheck = []) : bool
  {

    if(!is_array($arr) || empty($arr)){
      return false;
    }

    if(!empty($keyCheck)) {
      foreach ($keyCheck as $keyCheckV) {
        if (isset($arr[$keyCheckV])) {
          return false;
        }
      }
    }

    return true;
  }


  /**
   * @inheritDoc
   */
  protected function searchArrayInit($arr)
  {
    if($this->arrValidator($arr)){
      $this->searchArrayParsed = WorkerSetUpParser::parseArr($arr);
    } else {
      $this->searchArrayParsed = ['error' => 'Array given wasn\'t empty'];
    }
  }


  /**
   * @inheritDoc
   */
  protected function countArrayItems() : int
  {
    // @todo this method is not working here either??
    //if($this->arrValidator($this->searchArrayParsed)){
    //  return 0;
   // }

    $this->setTag('iteration_count');

    $this->keyFinderResults = WorkerKeyFinder::find(
        $this->searchArrayParsed ,
        $this->param['tagging__key']
    );

    $this->arrayFlattenResult = WorkerFlattenArray::find($this->keyFinderResults);

    return array_sum($this->arrayFlattenResult);

  }


  /**
   * @inheritDoc
   */
  protected function searchStringElement($param) : string
  {
    // @todo error catching is working for this method
    //if($this->arrValidator($param)){
     // return '';
    //}

    if($this->param['debug'] == true) {
      return WorkerStringFinder::find($param, $this->debugSearchString);
    }

    return WorkerStringFinder::find($param);
  }


  /**
   * @inheritDoc
   */
  protected function searchArrayForElement($param): array
  {

  //  if($this->arrValidator($param,['search_request','meta_information'])){
  //    return [];
   // }
    $this->setTag('items_found');
    $param['search_arr'] = $this->searchArrayParsed;
    $param['tag'] = $this->param['tagging__key'];
    if(isset($param['method_test'])){
      print_r($param);
      exit;
      $rawResults = WorkerArrayStringFinder::find($param); // raw results;
      return WorkerSortArray::find($rawResults);

    }

    $rawResults = WorkerArrayStringFinder::find($param); // raw results;
    return WorkerSortArray::find($rawResults);

  }

  /**
   * @inheritDoc
   */
  public function getParams(): array
  {
    return $this->param;
  }

  /**
   * @inheritDoc
   */
  public function getSearchResults($param) : array
  {
    if($this->arrValidator($param)){
      return [
        'count_array_items' =>  $this->countArrayItems(),
        'found_array_items' =>  $this->searchArrayForElement($param)
      ];
    }
    return [];
  }

}