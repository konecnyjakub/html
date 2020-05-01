<?php
namespace HTML\Forms;

/**
 * TextArea
 *
 * @author Jakub Konečný
 */
final class TextArea extends \HTML\Element {
  public function __construct(string $name = "", ?int $rows = null, ?int $cols = null, string $value = "") {
    parent::__construct("textarea", $value);
    $this->attributes["name"] = $name;
    if($rows !== null) {
      $this->attributes["rows"] = $rows;
    }
    if($cols !== null) {
      $this->attributes["cols"] = $cols;
    }
  }

  public function setFieldName(string $name): void {
    $this->attributes["name"] = $name;
  }

  public function setRows(int $number): void {
    $this->attributes["rows"] = $number;
  }

  public function setCols(int $number): void {
    $this->attributes["cols"] = $number;
  }
}
?>