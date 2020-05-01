<?php
namespace HTML\Forms;

/**
 * SelectBoxOption
 *
 * @author Jakub Konečný
 */
final class SelectBoxOption extends \HTML\Element {
  public function __construct(string $value = "", string $text = "") {
    parent::__construct("option", $text);
    $this->attributes["value"] = $value;
  }

  public function setValue(string $value): void {
    $this->attributes["value"] = $value;
  }

  public function setText(string $text): void {
    $this->content = $text;
  }
}
?>