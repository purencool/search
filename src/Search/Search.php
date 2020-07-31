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
  public function __construct($searchArray, $param =[]) {
    parent::__construct($searchArray, $param = []);
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
   * @inheritDoc
   *
   */
  protected function searchArrayInit($arr)
  {
    $this->searchArrayParsed = WorkerSetUpParser::parseArr($arr);
  }


  /**
   * @inheritDoc
   */
  protected function countArrayItems() : int
  {
    $arr =$this->searchArrayParsed;
    if(!is_array($arr) || empty($arr)){ return 0; }
    $this->setTag('iteration_count');

    $this->keyFinderResults = WorkerKeyFinder::find(
        $this->searchArrayParsed ,$this->param['tagging__key']
    );

    $this->arrayFlattenResult = WorkerFlattenArray::find($this->keyFinderResults);

    return array_sum($this->arrayFlattenResult);

  }


  /**
   * @inheritDoc
   */
  protected function searchStringElement($param) : string
  {
    if(!is_array($param) || empty($param)){ return ''; }
    return WorkerStringFinder::find($param);
  }


  /**
   * @param array $param = [
   *  'request', 'meta_information'
   * ];
   * @return array
   */
  protected function searchArrayForElement($param): array
  {
    if(!is_array($param) || empty($param)){return []; };
    array_push($param,$this->searchArrayParsed);
    array_push($param,$this->setTag('items_found'));
    return [
      'count_array_items' =>  $this->countArrayItems(),
      'items_found' =>   WorkerArrayStringFinder::find($param),
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
    if($this->searchArrayParsed == null) {
      return [];
    }
    return $this->searchArrayParsed;
  }



}