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
  public function __construct(string $type = "ul") {
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
   */
  public function addItem(string $text): void {
    $count = count($this->elements);
    $this->elements[$count] = new ListItem($text);
  }
  
  /**
   * Append an item
   */
  public function append(ListItem $item): void {
    $count = count($this->elements);
    $this->elements[$count] = $item;
  }
  
  /**
   * Remove an item
   * 
   * @param int $node Item's index
   */
  public function remove(int $node): void {
    unset($this->elements[$node]);
  }
}
?>