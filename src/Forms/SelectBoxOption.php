<?php
namespace HTML\Forms;

/**
 * SelectBoxOption
 *
 * @author Jakub Konečný
 */
class SelectBoxOption extends \HTML\Element {
  /**
   * @param string $value
   * @param string $text
   */
  function __construct($value = "", $text = "") {
    parent::__construct("option");
    $this->attributes["value"] = (string) $value;
    $this->content = (string) $text;
  }
  
  /**
   * @param string $value
   */
  function setValue($value) {
    $this->attributes["value"] = (string) $value;
  }
  
  /**
   * @param string $text
   */
  function setText($text) {
    $this->content = (string) $text;
  }
}
?>