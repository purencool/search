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
    if(!is_array($param) || empty($param)){return []; }

    $this->setTag('items_found');

    $param['search_arr'] = $this->searchArrayParsed;
    $param['tag'] = $this->param['tagging__key'];
    return WorkerArrayStringFinder::find($param);
  }

  /**
   * @inheritDoc
   */
  public function getParams(): array
  {
    return $this->param;
  }

  /**
   * @param array $param[
   *   'search_array'
   *   'search_string'
   * ]
   * @return array
   */
  public function getSearchResults($param) : array
  {
    return [];
  }

}