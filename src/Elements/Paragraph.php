<?php
namespace HTML\Elements;

/**
 * Paragraph
 *
 * @author Jakub Konečný
 */
class Paragraph extends \HTML\Container {
  /**
   * @param string $id
   */
  function __construct($id = "") {
    parent::__construct("p", $id);
  }
}
?>