<?php
namespace HTML\Elements;

/**
 * ListElement
 *
 * @author Jakub Konečný
 */
class ListElement extends \HTML\Container {
  function __construct($type = "ul") {
switch($type) {
case "ul":
case "ol":
  parent::__construct($type);
  break;
default:
  parent::__construct("ul");
  break;
}
  }
  
  function addItem($text) {
    $count = count($this->parts);
    $this->parts[$count] = new ListItem($text);
  }
  
  function append(ListItem $item) {
    $count = count($this->parts);
    $this->parts[$count] = $item;
  }
  
  function remove($node) {
    unset($this->parts[$node]);
  }
}
?>