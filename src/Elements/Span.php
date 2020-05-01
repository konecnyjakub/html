<?php
namespace HTML\Elements;

/**
 * Element span
 *
 * @author Jakub Konečný
 */
class Span extends \HTML\Container {
  function __construct(string $id = "") {
    parent::__construct("span", $id);
  }
}
?>