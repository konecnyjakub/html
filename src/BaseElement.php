<?php
namespace HTML;

/**
 * BaseElement
 *
 * @author Jakub Konečný
 */
abstract class BaseElement implements IRenderable {
  /** @var string */
  protected $name;
  /** @var string[] */
  protected $attributes;

  function setId(string $id): void {
    $this->attributes["id"] = $id;
  }

  function setClass(string $class): void {
    $this->attributes["class"] = $class;
  }
  
  /**
   * Render opening tag
   */
  function renderOpening(): string {
    $return = "<$this->name";
    foreach($this->attributes as $key => $value) {
      if(strlen($value) > 0) $return .= " $key=\"$value\"";
    }
    $return .= ">";
    return $return;
  }
  
  /**
   * Render closing tag
   */
  function renderClosing(): string {
    return "</$this->name>\n";
  }
  
  /**
   * Render element's content
   */
  abstract function renderContent(): string;
  
  /**
   * Render the element
   */
  function render(): string {
    return $this->renderOpening() . $this->renderContent() . $this->renderClosing();
  }
}
?>