<?php
namespace HTML\Elements;

/**
 * Element div
 *
 * @author Jakub Konečný
 */
class Div extends \HTML\Container {
  function __construct($id = "") {
    parent::__construct("div", $id);
  }
}
?>