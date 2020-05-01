<?php
namespace HTML\Elements;

/**
 * RowBreak
 *
 * @author Jakub Konečný
 */
class RowBreak extends \HTML\Element{
  function __construct() {
    parent::__construct("br");
  }

  function render(): string {
    return "<br>";
  }
}
?>