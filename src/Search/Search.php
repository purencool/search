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
   * @param string $request
   * @param array $search
   * @param false $meta
   * @return array
   */
  protected function searchArrayForElement($request, $search, $meta = false): array
  {
    if(!is_array($search) || empty($search)){return []; };

    return [
      'iterations_over_array' =>  $this->countArrayItems($search),
      'items_found' =>   WorkerArrayStringFinder::find(
         $search,
         'number',
         $this->setTag('items_found')),
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