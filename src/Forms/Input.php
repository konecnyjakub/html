<?php
namespace HTML\Forms;

/**
 * Input
 *
 * @author Jakub Konečný
 */
class Input extends \HTML\Element {
  /** @var array */
  protected $allowed_types = array("text", "password", "checkbox", "radio", "hidden", "submit", "reset", "image", "file",
    "search", "tel", "url", "email", "number", "range", "color",
    "date", "month", "week", "time", "datetime", "datetime-local");
  
  function __construct($name = "", $type = "", $size = "", $value = "", $src = "") {
    parent::__construct("input");
    $type = strtolower($type);
    if(!in_array($type, $this->allowed_types)) throw new InvalidValueException("Invalid value for parametr type passed to method FormInput::__construct.");
    $this->attributes["type"] = $type;
    $this->attributes["name"] = (string) $name;
    $this->attributes["size"] = (int) $size;
    $this->attributes["value"] = (string) $value;
    if($type == "image") $this->attributes["src"] = (string) $src;
  }
  
  /**
   * @param string $type
   */
  function setType($type) {
    if(!in_array($type, $this->allowed_types)) exit("Invalid value for parametr type passed to method FormInput::setType.");
    else $this->attributes["type"] = strtolower($type);
  }
  
  /**
   * @param string $name
   */
  function setFieldName($name) {
    $this->attributes["name"] = (string) $name;
  }
  
  /**
   * @param string $value
   */
  function setValue($value) {
    $this->attributes["value"] = (string) $value;
  }
  
  /**
   * @param int $size
   */
  function setSize($size) {
    $this->attributes["size"] = (string) $size;
  }
  
  /**
   * @param string $src
   */
  function setSrc($src) {
    if($this->type == "image") $this->attributes["src"] = (string) $src;
  }
  
  /**
   * Render closing tag
   * 
   * @return string
   */
  function renderClosing() {
    return "\n";
  }
}
?>