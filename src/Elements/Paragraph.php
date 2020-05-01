<?php
declare(strict_types=1);

namespace HTML\Elements;

/**
 * Paragraph
 *
 * @author Jakub Konečný
 */
final class Paragraph extends \HTML\Container {
  public function __construct(string $id = "") {
    parent::__construct("p", $id);
  }
}
?>