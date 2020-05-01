<?php
declare(strict_types=1);

namespace HTML\Elements;

/**
 * RowBreak
 *
 * @author Jakub Konečný
 */
final class RowBreak extends \HTML\Element {
  public function __construct() {
    parent::__construct("br");
  }

  public function render(): string {
    return "<br>";
  }
}
?>