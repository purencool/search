<?php


namespace Purencool\Search;

/**
 * Interface SearchInterface
 * @package Purencool\Search
 */
interface SearchInterface
{
  /**
   * This interface forces the Search Class return
   * results in an array format from a method called
   * getSearchResults().
   *
   * @param array $param[
   *   'search_arr'
   *   'search_request'
   * ]
   *
   * @return array
   *
   */
  public function getSearchResults($param) : array;
}