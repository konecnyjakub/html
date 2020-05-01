<?php
namespace HTML\Elements;

/**
 * Image
 *
 * @author Jakub Konečný
 */
class Image extends \HTML\Element {
  function __construct(string $source = "") {
    parent::__construct("img");
    $this->attributes["source"] = $source;
  }

  function setSource(string $source): void {
    $this->attributes["source"] = $source;
  }

  function setTitle(string $title): void {
    $this->attributes["title"] = $title;
  }

  function setAlt(string $alt): void {
    $this->attributes["alt"] = $alt;
  }

  function setAlign(string $align): void {
    $aligns = array("left", "right", "top", "middle", "baseline", "bottom", "absbottom", "absmiddle", "texttop");
    if(in_array($align, $aligns)) $this->attributes["align"] = $align;
  }

  function renderClosing(): string {
    return "\n";
  }
}
?>