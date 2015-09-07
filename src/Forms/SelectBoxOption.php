<?php
namespace HTML\Forms;

/**
 * Description of SelectBoxOption
 *
 * @author Jakub Konečný
 */
class SelectBoxOption extends \HTML\Element {
  protected $value;
  function __construct($value = "", $text = "") {
    parent::__construct("textarea");
    $this->value = (string) $value;
    $this->content = (string) $text;
  }
  
  function setValue($value) {
    $this->content = (string) $value;
  }
  
  function setText($text) {
    $this->content = (string) $text;
  }
  
  function render() {
    $return = "<option";
    if($this->value) $return .= " value=\"{$this->value}\"";
    $return .= ">$this->content</option>\n";
    return $return;
  }
}
?>