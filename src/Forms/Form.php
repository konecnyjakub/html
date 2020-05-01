<?php
namespace HTML\Forms;

/**
 * Form
 *
 * @author Jakub Konečný
 */
class Form extends \HTML\Container {
  function __construct(string $name = "", string $action = "", string $method = "", string $target = "", string $id = "") {
    parent::__construct("form", $id);
    $this->attributes["name"] = $name;
    $this->attributes["action"] = $action;
    if($method == "get" OR $method == "post") {
      $this->attributes["method"] = $method;
    }
    $this->attributes["target"] = $target;
  }

  function setFormName(string $name): void {
    $this->attributes["name"] = $name;
  }

  function setAction(string $url): void {
    $this->attributes["action"] = $url;
  }

  function setTarget(string $frame): void {
    $this->attributes["target"] = $frame;
  }

  function setMethod(string $method): void {
    $method = strtolower($method);
    if($method == "get" OR $method == "post") {
      $this->attributes["method"] = $method;
    }
  }

  function addInput(string $name = "", string $type = "", string $size = "", string $value = "", string $src = ""): Input {
    $element = new Input($name, $type, $size, $value, $src);
    $count = count($this->elements);
    $this->elements[$count] = $element;
    $return = & $this->elements[$count];
    return $return;
  }

  function addTextArea(string $name = "", ?int $rows = null, int $cols = null, string $value = ""): TextArea {
    $element = new TextArea($name, $rows, $cols, $value);
    $count = count($this->elements);
    $this->elements[$count] = $element;
    $return = & $this->elements[$count];
    return $return;
  }

  function addSelectBox(string $name = "", ?int $size = null): SelectBox {
    $element = new SelectBox($name, $size);
    $count = count($this->elements);
    $this->elements[$count] = $element;
    $return = & $this->elements[$count];
    return $return;
  }
}
?>