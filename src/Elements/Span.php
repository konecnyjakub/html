<?php
namespace HTML\Elements;

/**
 * Element span
 *
 * @author Jakub Konečný
 */
class Span extends \HTML\Container {
  /**
   * @param string $id
   */
  function __construct($id = "") {
    parent::__construct("span", $id);
  }
}
?>