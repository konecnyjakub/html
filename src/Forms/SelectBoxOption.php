<?php
namespace HTML\Forms;

/**
 * SelectBoxOption
 *
 * @author Jakub Konečný
 */
class SelectBoxOption extends \HTML\Element {
  public function __construct(string $value = "", string $text = "") {
    parent::__construct("option");
    $this->attributes["value"] = $value;
    $this->content = $text;
  }

  public function setValue(string $value): void {
    $this->attributes["value"] = $value;
  }

  public function setText(string $text): void {
    $this->content = $text;
  }
}
?>