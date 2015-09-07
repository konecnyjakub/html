<?php
namespace HTML;

/**
 * Element
 *
 * @author Jakub Konečný
 */
abstract class Element extends BaseElement {
  /** @var string */
  protected $content;
  
  /**
   * @param string $name
   * @param string $content
   */
  function __construct($name, $content = "") {
    $this->name = (string) $name;
    $this->content = (string) $content;
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
  function setContent($content = "") {
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