<?php
declare(strict_types=1);

namespace HTML;

/**
 * Container
 *
 * @author Jakub Konečný
 */
class Container extends BaseElement {
  use TContainer;

  public function __construct(string $name, string $id = "") {
    $this->name = $name;
    $this->attributes["id"] = $id;
  }

  protected function renderOpening(): string {
    return parent::renderOpening() . "\n";
  }

  protected function renderContent(): string {
    $return = "";
    foreach($this->elements as $part) {
      $return .= $part->render();
    }
    return $return;
  }
}
?>