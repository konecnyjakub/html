<?php
namespace HTML\Forms;

/**
 * Form
 *
 * @author Jakub Konečný
 */
class Form extends \HTML\Container {
  protected $formName;
  protected $action;
  protected $method;
  protected $target;
  
  function __construct($name = "", $action = "", $method = "", $target = "", $id = "") {
    parent::__construct("form", $id);
    $this->formName = (string) $name;
    $this->action = (string) $action;
    if($method == "get" OR $method == "post") $this->method = $method;
    $this->target = (string) $target;
  }
  
  /**
   * @param string $name
   */
  function setFormName($name) {
    $this->formName = (string) $name;
  }
  
  /**
   * @param string $url
   */
  function setAction($url) {
    $this->action = (string) $url;
  }
  
  /**
   * @param string $frame
   */
  function setTarget($frame) {
    $this->target = (string) $frame;
  }
  
  /**
   * @param string $method
   */
  function setMethod($method) {
    $method = strtolower($method);
    if($method == "get" OR $method == "post") $this->method = $method;
  }
  
  /**
   * 
   * @param string $name
   * @param string $type
   * @param string $size
   * @param string $value
   * @param string $src
   * @return Input
   */
  function addInput($name = "", $type = "", $size = "", $value = "", $src = "") {
    $element = new Input($name, $type, $size, $value, $src);
    $count = count($this->parts);
    $this->parts[$count] = $element;
    $return = & $this->parts[$count];
    return $return;
  }
  
  /**
   * 
   * @param string $name
   * @param string $rows
   * @param string $cols
   * @param string $value
   * @return TextArea
   */
  function addTextArea($name = "", $rows = "", $cols = "", $value = "") {
    $element = new TextArea($name, $rows, $cols, $value);
    $count = count($this->parts);
    $this->parts[$count] = $element;
    $return = & $this->parts[$count];
    return $return;
  }
  
  /**
   * 
   * @param string $name
   * @param int $size
   * @return SelectBox
   */
  function addSelectBox($name = "", $size = "") {
    $element = new SelectBox($name, $size);
    $count = count($this->parts);
    $this->parts[$count] = $element;
    $return = & $this->parts[$count];
    return $return;
  }
  
  /**
   * Render the form
   * 
   * @return string
   */
  function render() {
    $return = "<form";
    if($this->id) { $return .= " id=\"$this->id\""; }
    if($this->formName) { $return .= " name=\"$this->formName\""; }
    if($this->class) { $return .= " class=\"$this->class\""; }
    if($this->method) { $return .= " method=\"$this->method\""; }
    if($this->action) { $return .= " action=\"$this->action\""; }
    if($this->target) { $return .= " target=\"$this->target\""; }
    $return .= ">\n";
    foreach($this->parts as $part) {
      $return .= $part->render();
    }
    $return .= "</form>\n";
    return $return;
  }
}
?>