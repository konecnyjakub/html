<?php
namespace HTML\Forms;

use HTML\InvalidValueException;

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
  
  function __construct(string $name = "", string $type = "", ?int $size = null, string $value = "", string $src = "") {
    parent::__construct("input");
    $type = strtolower($type);
    if(!in_array($type, $this->allowed_types)) {
      throw new InvalidValueException("Invalid value for parametr type passed to method FormInput::__construct.");
    }
    $this->attributes["type"] = $type;
    $this->attributes["name"] = $name;
    if($size !== null) {
      $this->attributes["size"] = $size;
    }
    $this->attributes["value"] = $value;
    if($type == "image") $this->attributes["src"] = $src;
  }

  function setType(string $type): void {
    if(!in_array($type, $this->allowed_types)) {
      exit("Invalid value for parametr type passed to method FormInput::setType.");
    }
    $this->attributes["type"] = strtolower($type);
  }

  function setFieldName(string $name): void {
    $this->attributes["name"] = $name;
  }

  function setValue(string $value): void {
    $this->attributes["value"] = $value;
  }

  function setSize(int $size): void {
    $this->attributes["size"] = $size;
  }

  function setSrc(string $src): void {
    if($this->attributes["type"] == "image") {
      $this->attributes["src"] = $src;
    }
  }

  function renderClosing(): string {
    return "\n";
  }
}
?>