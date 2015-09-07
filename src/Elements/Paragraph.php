<?php
namespace HTML\Elements;

/**
 * Paragraph
 *
 * @author Jakub Konečný
 */
class Paragraph extends \HTML\Element{
  /**
   * @param string $content
   */
  function __construct($content = "") {
    parent::__construct("p", $content);
  }
}
?>