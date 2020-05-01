<?php
namespace HTML\Elements;

/**
 * Paragraph
 *
 * @author Jakub Konečný
 */
class Paragraph extends \HTML\Container {
  function __construct(string $id = "") {
    parent::__construct("p", $id);
  }
}
?>