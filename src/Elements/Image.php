<?php
namespace HTML\Elements;

/**
 * Image
 *
 * @author Jakub Konečný
 */
class Image extends \HTML\Element {
  protected $source;
  protected $alt;
  protected $title;
  protected $align;
  function __construct($source = "") {
    parent::__construct("img");
    $this->source = (string) $source;
  }
  
  function setSource($source) {
    $this->source = (string) $source;
  }
  
  function setTitle($title) {
    $this->title = (string) $title;
  }
  
  function setAlt($alt) {
    $this->alt = (string) $alt;
  }
  
  function setAlign($align) {
    $aligns = array("left", "right", "top", "middle", "baseline", "bottom", "absbottom", "absmiddle", "texttop");
    if(in_array($align, $aligns)) $this->align = $align;
  }
  
  function render() {
    $return = "<img src='$this->source'";
    if($this->alt) $return .= " alt=\"$this->alt\"";
    if($this->title) $return .= " title=\"$this->title\"";
    if($this->align) $return .= " align=\"$this->align\"";
    $return .= ">\n";
    return $return;
  }
}
?>