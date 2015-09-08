<?php
namespace HTML\Forms;

/**
 * SelectBox
 *
 * @author Jakub Konečný
 */
class SelectBox extends \HTML\Container {
  /** @var string */
  protected $fieldName;
  /** @var int */
  protected $size;
  
  /**
   * @param string $name
   * @param int $size
   */
  function __construct($name = "", $size = "") {
    parent::__construct("select");
    $this->fieldName = (string) $name;
    $this->size = (int) $size;
  }
  
  /**
   * @param string $name
   */
  function setFieldName($name) {
    $this->fieldName = (string) $name;
  }
  
  /**
   * @param int $size
   */
  function setSize($size) {
    $this->size = (int) $size;
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
  
  function renderOpening() {
    $return = "<select";
    if($this->class) $return .= " class=\"{$this->class}\"";
    if($this->id) $return .= " id=\"$this->id\"";
    if($this->fieldName) $return .= " name=\"$this->fieldName\"";
    if($this->size) $return .= " size=\"$this->size\"";
    $return .= ">";
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