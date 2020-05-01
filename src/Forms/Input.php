<?php
declare(strict_types=1);

namespace HTML\Forms;

/**
 * Input
 *
 * @author Jakub Konečný
 */
final class Input extends \HTML\Element {
  protected string $content;

  /** @var string[] */
  protected array $allowed_types = ["text", "password", "checkbox", "radio", "hidden", "submit", "reset", "image", "file",
    "search", "tel", "url", "email", "number", "range", "color",
    "date", "month", "week", "time", "datetime", "datetime-local"];

  public function __construct(string $name = "", string $type = "", ?int $size = null, string $value = "", string $src = "") {
    parent::__construct("input");
    $type = strtolower($type);
    if(!in_array($type, $this->allowed_types)) {
      throw new \UnexpectedValueException("Invalid value for parametr type passed to method FormInput::__construct.");
    }
    $this->attributes["type"] = $type;
    $this->attributes["name"] = $name;
    if($size !== null) {
      $this->attributes["size"] = $size;
    }
    $this->attributes["value"] = $value;
    if($type == "image") {
      $this->attributes["src"] = $src;
    }
  }

  public function setType(string $type): void {
    if(!in_array($type, $this->allowed_types)) {
      throw new \UnexpectedValueException("Invalid value for parametr type passed to method FormInput::setType.");
    }
    $this->attributes["type"] = strtolower($type);
  }

  public function setFieldName(string $name): void {
    $this->attributes["name"] = $name;
  }

  public function setValue(string $value): void {
    $this->attributes["value"] = $value;
  }

  public function setSize(int $size): void {
    $this->attributes["size"] = $size;
  }

  public function setSrc(string $src): void {
    if($this->attributes["type"] == "image") {
      $this->attributes["src"] = $src;
    }
  }

  protected function renderClosing(): string {
    return "\n";
  }
}
?>