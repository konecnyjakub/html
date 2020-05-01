<?php
declare(strict_types=1);

namespace HTML\Elements;

/**
 * ListElement
 *
 * @author Jakub Konečný
 */
final class ListElement extends \HTML\Container {
  /**
   * @param string $type Type of the list
   */
  public function __construct(string $type = "ul") {
    if(!in_array($type, ["ul", "ol",], true)) {
      $type = "ul";
    }
    parent::__construct($type);
  }
  
  /**
   * Add an item
   */
  public function addItem(string $text): ListItem {
    $count = count($this->elements);
    $this->elements[$count] = new ListItem($text);
    return $this->elements[$count];
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