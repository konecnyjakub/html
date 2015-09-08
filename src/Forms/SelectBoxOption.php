<?php
namespace HTML\Forms;

/**
 * SelectBoxOption
 *
 * @author Jakub Konečný
 */
class SelectBoxOption extends \HTML\Element {
  /** @var string */
  protected $value;
  
  /**
   * @param string $value
   * @param string $text
   */
  function __construct($value = "", $text = "") {
    parent::__construct("textarea");
    $this->value = (string) $value;
    $this->content = (string) $text;
  }
  
  /**
   * @param string $value
   */
  function setValue($value) {
    $this->content = (string) $value;
  }
  
  /**
   * @param string $text
   */
  function setText($text) {
    $this->content = (string) $text;
  }
  
  /**
   * Render opening tag
   * 
   * @return string
   */
  function renderOpening() {
    $return = "<option";
    if($this->value) $return .= " value=\"{$this->value}\"";
    $return .= ">";
    return $return;
  }
}
?>