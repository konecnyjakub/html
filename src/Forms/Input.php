<?php
namespace HTML\Forms;

/**
 * Description of Input
 *
 * @author Jakub Konečný
 */
class Input extends \HTML\Element {
  protected $type;
  protected $fieldName;
  protected $value;
  protected $size;
  protected $src;
  protected $allowed_types = array("text", "password", "checkbox", "radio", "hidden", "submit", "reset", "image", "file",
    "search", "tel", "url", "email", "number", "range", "color",
    "date", "month", "week", "time", "datetime", "datetime-local");
  
  function __construct($name = "", $type = "", $size = "", $value = "", $src = "") {
    parent::__construct("input");
    $type = strtolower($type);
    if(!in_array($type, $this->allowed_types)) throw new InvalidValueException("Invalid value for parametr type passed to method FormInput::__construct.");
    $this->type = $type;
    $this->fieldName = (string) $name;
    $this->size = (int) $size;
    if($type == "image") $this->value = (string) $value;
    $this->src = (string) $src;
  }
  
  function setType($type) {
    if(!in_array($type, $this->allowed_types)) exit("Invalid value for parametr type passed to method FormInput::setType.");
    else $this->type = strtolower($type);
  }
  
  function setFieldName($name) {
    $this->fieldName = (string) $name;
  }
  
  function setValue($value) {
    $this->value = (string) $value;
  }
  
  function setSize($size) {
    $this->size = (string) $size;
  }
  
  function setSrc($src) {
    if($this->type == "image") $this->src = (string) $src;
  }
  
  function render() {
    $return = "<input";
    if($this->class) $return .= " class=\"{$this->class}\"";
    if($this->id) $return .= " id=\"$this->id\"";
    if($this->type) $return .= " type=\"$this->type\"";
    if($this->fieldName) $return .= " name=\"$this->fieldName\"";
    if($this->value) $return .= " value=\"$this->value\"";
    if($this->size) $return .= " size=\"$this->size\"";
    if($this->src) $return .= " src=\"$this->src\"";
    $return .= ">\n";
    return $return;
  }
}
?>