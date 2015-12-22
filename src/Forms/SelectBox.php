<?php
namespace HTML\Forms;

/**
 * SelectBox
 *
 * @author Jakub Konečný
 */
class SelectBox extends \HTML\Container {
  /**
   * @param string $name
   * @param int $size
   */
  function __construct($name = "", $size = "") {
    parent::__construct("select");
    $this->attributes["name"] = (string) $name;
    $this->attributes["size"] = (int) $size;
  }
  
  /**
   * @param string $name
   */
  function setFieldName($name) {
    $this->attributes["name"] = (string) $name;
  }
  
  /**
   * @param int $size
   */
  function setSize($size) {
    $this->attributes["size"] = (int) $size;
  }
  
  /**
   * 
   * @param string $value
   * @param string $text
   * @return SelectBoxOption
   */
  function addOption($value = "", $text = "") {
    $element = new SelectBoxOption($value, $text);
    $count = count($this->elements);
    $this->elements[$count] = $element;
    $return = & $this->elements[$count];
    return $return;
  }
  
  /**
   * Render the element
   * 
   * @return string
   */
  function render() {
    $return = $this->renderOpening();
    foreach($this->elements as $part) {
      $return .= $part->render();
    }
    $return .= $this->renderClosing();
    return $return;
  }
}
?>