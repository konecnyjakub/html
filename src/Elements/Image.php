<?php
namespace HTML\Elements;

/**
 * Image
 *
 * @author Jakub Konečný
 */
class Image extends \HTML\Element {
  /** @var string */
  protected $source;
  /** @var string */
  protected $alt;
  /** @var string */
  protected $title;
  /** @var string */
  protected $align;
  
  /**
   * @param string $source
   */
  function __construct($source = "") {
    parent::__construct("img");
    $this->source = (string) $source;
  }
  
  /**
   * @param string $source
   */
  function setSource($source) {
    $this->source = (string) $source;
  }
  
  /**
   * @param string $title
   */
  function setTitle($title) {
    $this->title = (string) $title;
  }
  
  /**
   * @param string $alt
   */
  function setAlt($alt) {
    $this->alt = (string) $alt;
  }
  
  /**
   * @param string $align
   */
  function setAlign($align) {
    $aligns = array("left", "right", "top", "middle", "baseline", "bottom", "absbottom", "absmiddle", "texttop");
    if(in_array($align, $aligns)) $this->align = $align;
  }
  
  /**
   * Render the element
   * 
   * @return string
   */
  function render() {
    $return = "<img src=\"$this->source\"";
    if($this->alt) $return .= " alt=\"$this->alt\"";
    if($this->title) $return .= " title=\"$this->title\"";
    if($this->align) $return .= " align=\"$this->align\"";
    $return .= ">\n";
    return $return;
  }
}
?>