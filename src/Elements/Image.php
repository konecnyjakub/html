<?php
namespace HTML\Elements;

/**
 * Image
 *
 * @author Jakub Konečný
 */
class Image extends \HTML\Element {
  /**
   * @param string $source
   */
  function __construct($source = "") {
    parent::__construct("img");
    $this->attributes["source"] = (string) $source;
  }
  
  /**
   * @param string $source
   */
  function setSource($source) {
    $this->attributes["source"] = (string) $source;
  }
  
  /**
   * @param string $title
   */
  function setTitle($title) {
    $this->attributes["title"] = (string) $title;
  }
  
  /**
   * @param string $alt
   */
  function setAlt($alt) {
    $this->attributes["alt"] = (string) $alt;
  }
  
  /**
   * @param string $align
   */
  function setAlign($align) {
    $aligns = array("left", "right", "top", "middle", "baseline", "bottom", "absbottom", "absmiddle", "texttop");
    if(in_array($align, $aligns)) $this->attributes["align"] = $align;
  }
  
  /**
   * Render closing tag
   * 
   * @return string
   */
  function renderClosing() {
    return "\n";
  }
}
?>