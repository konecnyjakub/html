<?php
declare(strict_types=1);

namespace HTML\Elements;

use HTML\BaseElement;

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
    $this->elements[$count] = $item = new ListItem($text);
    return $item;
  }
  
  /**
   * Append an item
   *
   * @param ListItem $item
   */
  public function append(BaseElement $item): void {
    if(!$item instanceof ListItem) {
      throw new \TypeError("Argument 1 passed to " . __METHOD__ . "() must be an instance of " . ListItem::class . ", " . get_class($item) . " given");
    }
    parent::append($item);
  }
}
?>