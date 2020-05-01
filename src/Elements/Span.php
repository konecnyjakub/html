<?php
namespace HTML\Elements;

/**
 * Element span
 *
 * @author Jakub Konečný
 */
final class Span extends \HTML\Container {
  public function __construct(string $id = "") {
    parent::__construct("span", $id);
  }
}
?>