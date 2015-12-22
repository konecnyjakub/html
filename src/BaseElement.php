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
  
  /**
   * @param string $id
   */
  function setId($id) {
    $this->attributes["id"] = $this->id = (string) $id;
  }
  
  /**
   * @param string $class
   */
  function setClass($class) {
    $this->attributes["class"] = $this->class = (string) $class;
  }
  
  /**
   * Render opening tag
   * 
   * @return string
   */
  function renderOpening() {
    $return = "<$this->name";
    foreach($this->attributes as $key => $value) {
      if(strlen($value) > 0) $return .= " $key=\"$value\"";
    }
    $return .= ">";
    return $return;
  }
  
  /**
   * Render closing tag
   * 
   * @return string
   */
  function renderClosing() {
    return "</$this->name>\n";
  }
  
  /**
   * Render element's content
   * 
   * @return string
   */
  abstract function renderContent();
  
  /**
   * Render the element
   * 
   * @return string
   */
  function render() {
    return $this->renderOpening() . $this->renderContent() . $this->renderClosing();
  }
}
?>