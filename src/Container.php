<?php
namespace HTML;

/**
 * Container
 *
 * @author Jakub Konečný
 */
class Container extends BaseElement {
  
  /**
   * @param string $name
   * @param string $id
   */
  function __construct($name, $id = "") {
    $this->name = (string) $name;
    $this->attributes["id"] = $this->id = (string) $id;
  }
  
  use TContainer;
  
  /**
   * Render opening tag
   * 
   * @return string
   */
  function renderOpening() {
    return parent::renderOpening() . "\n";
  }
  
  /**
   * Render the container
   * 
   * @return string
   */
  function renderContent() {
    $return = "";
    foreach($this->elements as $part) {
      $return .= $part->render();
    }
    return $return;
  }
}
?>