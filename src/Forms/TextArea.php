<?php
namespace HTML\Forms;

/**
 * TextArea
 *
 * @author Jakub Konečný
 */
class TextArea extends \HTML\Element {
  /** @var string */
  protected $fieldName;
  /** @var int */
  protected $rows;
  /** @var int */
  protected $cols;
  
  /**
   * @param string $name
   * @param int $rows
   * @param int $cols
   * @param string $value
   */
  function __construct($name = "", $rows = "", $cols = "", $value = "") {
    parent::__construct("textarea");
    $this->fieldName = (string) $name;
    $this->content = (string) $value;
    $this->rows = (int) $rows;
    $this->cols = (int) $cols;
  }
  
  /**
   * @param string $name
   */
  function setFieldName($name) {
    $this->fieldName = (string) $name;
  }
  
  /**
   * @param int $number
   */
  function setRows($number) {
    $this->rows = (int) $number;
  }
  
  /**
   * @param int $number
   */
  function setCols($number) {
    $this->cols = (int) $number;
  }
  
  /**
   * @param string $value
   */
  function setValue($value) {
    $this->content = (string) $value;
  }
  
  /**
   * Render the element
   * 
   * @return string
   */
  function render() {
    $return = "<textarea";
    if($this->class) $return .= " class=\"{$this->class}\"";
    if($this->id) $return .= " id=\"$this->id\"";
    if($this->fieldName) $return .= " name=\"$this->fieldName\"";
    if($this->rows) $return .= " rows=\"$this->rows\"";
    if($this->cols) $return .= " cols=\"$this->cols\"";
    $return .= ">$this->content</textarea>\n";
    return $return;
  }
}
?>