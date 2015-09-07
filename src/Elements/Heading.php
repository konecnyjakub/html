<?php
namespace HTML\Elements;

/**
 * Heading
 *
 * @author Jakub Konečný
 */
class Heading extends \HTML\Element {
  function __construct($level, $content = "") {
    parent::__construct("h$level", $content);
  }
}
?>