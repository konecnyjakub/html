<?php
namespace HTML\Forms;

/**
 * TextArea
 *
 * @author Jakub Konečný
 */
class TextArea extends \HTML\Element {
  public function __construct(string $name = "", ?int $rows = null, ?int $cols = null, string $value = "") {
    parent::__construct("textarea");
    $this->attributes["name"] = $name;
    $this->content = $value;
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

  public function setValue(string $value): void {
    $this->content = $value;
  }
}
?>