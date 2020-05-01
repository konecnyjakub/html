<?php
namespace HTML\Elements;

/**
 * Heading
 *
 * @author Jakub Konečný
 */
class Heading extends \HTML\Element {
  public function __construct(int $level, string $content = "") {
    parent::__construct("h$level", $content);
  }
}
?>