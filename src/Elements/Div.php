<?php
declare(strict_types=1);

namespace HTML\Elements;

/**
 * Element div
 *
 * @author Jakub Konečný
 */
final class Div extends \HTML\Container {
  public function __construct(string $id = "") {
    parent::__construct("div", $id);
  }
}
?>