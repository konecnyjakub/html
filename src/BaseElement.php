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
  /** @var string */
  protected $class;
  /** @var string */
  protected $id;
  
  /**
   * @param string $id
   */
  function setId($id) {
    $this->id = (string) $id;
  }
  
  /**
   * @param string $class
   */
  function setClass($class) {
    $this->class = (string) $class;
  }
  
  /**
   * Render opening tag
   * 
   * @return string
   */
  function renderOpening() {
    $return = "<$this->name";
    if($this->class) $return .= " class=\"{$this->class}\"";
    if($this->id) $return .= " id=\"$this->id\"";
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