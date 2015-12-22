<?php
namespace HTML\Forms;

/**
 * TextArea
 *
 * @author Jakub Konečný
 */
class TextArea extends \HTML\Element {
  /**
   * @param string $name
   * @param int $rows
   * @param int $cols
   * @param string $value
   */
  function __construct($name = "", $rows = "", $cols = "", $value = "") {
    parent::__construct("textarea");
    $this->attributes["name"] = (string) $name;
    $this->content = (string) $value;
    $this->attributes["rows"] = (int) $rows;
    $this->attributes["cols"] = (int) $cols;
  }
  
  /**
   * @param string $name
   */
  function setFieldName($name) {
    $this->attributes["name"] = (string) $name;
  }
  
  /**
   * @param int $number
   */
  function setRows($number) {
    $this->attributes["rows"] = (int) $number;
  }
  
  /**
   * @param int $number
   */
  function setCols($number) {
    $this->attributes["cols"] = (int) $number;
  }
  
  /**
   * @param string $value
   */
  function setValue($value) {
    $this->content = (string) $value;
  }
}
?>