<?php
declare(strict_types=1);

namespace HTML\Elements;

/**
 * ListItem
 *
 * @author Jakub Konečný
 */
final class ListItem extends \HTML\Element {
  public function __construct(string $text) {
    parent::__construct("li", $text);
  }
}
?>