<?php
namespace HTML\Forms;

/**
 * TextArea
 *
 * @author Jakub Konečný
 */
class TextArea extends \HTML\Element {
  function __construct(string $name = "", ?int $rows = null, ?int $cols = null, string $value = "") {
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

  function setFieldName(string $name): void {
    $this->attributes["name"] = $name;
  }

  function setRows(int $number): void {
    $this->attributes["rows"] = $number;
  }

  function setCols(int $number): void {
    $this->attributes["cols"] = $number;
  }

  function setValue(string $value): void {
    $this->content = $value;
  }
}
?>