<?php
namespace HTML\Forms;

/**
 * Form
 *
 * @author Jakub Konečný
 */
class Form extends \HTML\Container {
  function __construct($name = "", $action = "", $method = "", $target = "", $id = "") {
    parent::__construct("form", $id);
    $this->attributes["name"] = (string) $name;
    $this->attributes["action"] = (string) $action;
    if($method == "get" OR $method == "post") $this->attributes["method"] = $method;
    $this->attributes["target"] = (string) $target;
  }
  
  /**
   * @param string $name
   */
  function setFormName($name) {
    $this->attributes["name"] = (string) $name;
  }
  
  /**
   * @param string $url
   */
  function setAction($url) {
    $this->attributes["action"] = (string) $url;
  }
  
  /**
   * @param string $frame
   */
  function setTarget($frame) {
    $this->attributes["target"] = (string) $frame;
  }
  
  /**
   * @param string $method
   */
  function setMethod($method) {
    $method = strtolower($method);
    if($method == "get" OR $method == "post") $this->attributes["method"] = $method;
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
    $count = count($this->elements);
    $this->elements[$count] = $element;
    $return = & $this->elements[$count];
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
    $count = count($this->elements);
    $this->elements[$count] = $element;
    $return = & $this->elements[$count];
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
    $count = count($this->elements);
    $this->elements[$count] = $element;
    $return = & $this->elements[$count];
    return $return;
  }
}
?>