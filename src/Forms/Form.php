<?php
declare(strict_types=1);

namespace HTML\Forms;

/**
 * Form
 *
 * @author Jakub Konečný
 */
class Form extends \HTML\Container {
  public function __construct(string $name = "", string $action = "", string $method = "", string $target = "", string $id = "") {
    parent::__construct("form", $id);
    $this->attributes["name"] = $name;
    $this->attributes["action"] = $action;
    if($method == "get" OR $method == "post") {
      $this->attributes["method"] = $method;
    }
    $this->attributes["target"] = $target;
  }

  public function setFormName(string $name): void {
    $this->attributes["name"] = $name;
  }

  public function setAction(string $url): void {
    $this->attributes["action"] = $url;
  }

  public function setTarget(string $frame): void {
    $this->attributes["target"] = $frame;
  }

  public function setMethod(string $method): void {
    $method = strtolower($method);
    if($method == "get" OR $method == "post") {
      $this->attributes["method"] = $method;
    }
  }

  public function addInput(string $name = "", string $type = "", ?int $size = null, string $value = "", string $src = ""): Input {
    $this->elements[] = $element = new Input($name, $type, $size, $value, $src);
    return $element;
  }

  public function addTextArea(string $name = "", ?int $rows = null, int $cols = null, string $value = ""): TextArea {
    $this->elements[] = $element = new TextArea($name, $rows, $cols, $value);
    return $element;
  }

  public function addSelectBox(string $name = "", ?int $size = null): SelectBox {
    $this->elements[] = $element = new SelectBox($name, $size);
    return $element;
  }
}
?>