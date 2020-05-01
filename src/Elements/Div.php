<?php
namespace HTML\Elements;

/**
 * Element div
 *
 * @author Jakub Konečný
 */
class Div extends \HTML\Container {
  public function __construct(string $id = "") {
    parent::__construct("div", $id);
  }
}
?>