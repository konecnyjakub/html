<?php
namespace HTML\Forms;

/**
 * SelectBox
 *
 * @author Jakub Konečný
 */
class SelectBox extends \HTML\Container {
  function __construct(string $name = "", ?int $size = null) {
    parent::__construct("select");
    $this->attributes["name"] = $name;
    if($size !== null) {
      $this->attributes["size"] = $size;
    }
  }

  function setFieldName(string $name): void {
    $this->attributes["name"] = $name;
  }

  function setSize(int $size): void {
    $this->attributes["size"] = $size;
  }

  function addOption(string $value = "", string $text = ""): SelectBoxOption {
    $element = new SelectBoxOption($value, $text);
    $count = count($this->elements);
    $this->elements[$count] = $element;
    $return = & $this->elements[$count];
    return $return;
  }
}
?>