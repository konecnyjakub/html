<?php
namespace HTML;

/**
 * Container
 *
 * @author Jakub Konečný
 */
class Container extends BaseElement {

  function __construct(string $name, string $id = "") {
    $this->name = $name;
    $this->attributes["id"] = $this->id = $id;
  }
  
  use TContainer;

  function renderOpening(): string {
    return parent::renderOpening() . "\n";
  }

  function renderContent(): string {
    $return = "";
    foreach($this->elements as $part) {
      $return .= $part->render();
    }
    return $return;
  }
}
?>