<?php
namespace HTML\Elements;

/**
 * Link
 *
 * @author Jakub Konečný
 */
class Link extends \HTML\Element {
  /** @var string */
  protected $href;
  
  /**
   * @param string $text
   * @param string $href
   */
  function __construct($text = "", $href = "") {
    parent::__construct("a", $text);
    $this->href = (string) $href;
  }
  
  /**
   * @param string $url
   */
  function setHref($url) {
    $this->href = (string) $url;
  }
  
  /**
   * Render the element
   * 
   * @return string
   */
  function render() {
     $return = "<$this->name";
     if($this->class) $return .= " class=\"{$this->class}\"";
     if($this->id) $return .= " id=\"$this->id\"";
     if($this->href) $return .= " href=\"$this->href\"";
     $return .= ">$this->content</$this->name>\n";
     return $return;
  }
}
?>