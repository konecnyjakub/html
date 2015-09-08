<?php
namespace HTML\Elements;

/**
 * Element span
 *
 * @author Jakub Konečný
 */
class Span extends \HTML\Container {
  function __construct($id = "") {
    parent::__construct("span", $id);
  }
}
?>