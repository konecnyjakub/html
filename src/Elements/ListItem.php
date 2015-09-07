<?php
namespace HTML\Elements;

/**
 * ListItem
 *
 * @author Jakub Konečný
 */
class ListItem extends \HTML\Element {
  function __construct($text) {
    parent::__construct("li", $text);
  }
}
?>