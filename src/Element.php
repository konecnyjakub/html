<?php
namespace HTML;

/**
 * Element
 *
 * @author Jakub Konečný
 */
abstract class Element {
  /** @var string */
  protected $name;
  /** @var string */
  protected $content;
  /** @var string */
  protected $class;
  /** @var string */
  protected $id;
  
  /**
   * @param string $name
   * @param string $content
   */
  function __construct($name, $content = "") {
    $this->name = (string) $name;
    $this->content = (string) $content;
  }
  
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
   * Add text at the end
   * 
   * @param string $content
   * @return void
   */
  function addText($content) {
    $this->content .= (string) $content;
  }
  
  /**
   * Remove all text
   * 
   * @return void
   */
  function removeText() {
    $this->content = "";
  }
  
  /**
   * @param string $content
   */
  function setText($content) {
    $this->content = (string) $content;
  }
  
  /**
   * Render the element
   * 
   * @return string
   */
  function render() {
    $return = "<$this->name";
    if($this->class) $return .= " class=\"{$this->class}\"";
    if($this->id) $return .= " id=\"$this->id\"";
    $return .= ">$this->content</$this->name>\n";
    return $return;
  }
}
?>