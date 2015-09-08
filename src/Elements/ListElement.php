<?php
namespace HTML\Elements;

/**
 * ListElement
 *
 * @author Jakub Konečný
 */
class ListElement extends \HTML\Container {
  /**
   * @param string $type Type of the list
   */
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
  
  /**
   * Add an item
   * 
   * @param string $text
   * @return void
   */
  function addItem($text) {
    $count = count($this->parts);
    $this->parts[$count] = new ListItem($text);
  }
  
  /**
   * Append an item
   * 
   * @param ListItem $item
   * @return void
   */
  function append(ListItem $item) {
    $count = count($this->parts);
    $this->parts[$count] = $item;
  }
  
  /**
   * Remove an item
   * 
   * @param int $node Item's index
   * @return void
   */
  function remove($node) {
    unset($this->parts[$node]);
  }
}
?>