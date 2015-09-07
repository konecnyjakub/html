<?php
namespace HTML\Forms;

/**
 * Description of TextArea
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
  
  function __construct($name = "", $rows = "", $cols = "", $value = "") {
    parent::__construct("textarea");
    $this->fieldName = (string) $name;
    $this->content = (string) $value;
    $this->rows = (int) $rows;
    $this->cols = (int) $cols;
  }
  
  function setFieldName($name) {
    $this->fieldName = (string) $name;
  }
  
  function setRows($number) {
    $this->rows = (int) $number;
  }
  
  function setCols($number) {
    $this->cols = (int) $number;
  }
  
  function setValue($value) {
    $this->content = (string) $value;
  }
  
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