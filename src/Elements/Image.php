<?php
namespace HTML\Elements;

/**
 * Image
 *
 * @author Jakub Konečný
 */
class Image extends \HTML\Element {
  public function __construct(string $source = "") {
    parent::__construct("img");
    $this->attributes["source"] = $source;
  }

  public function setSource(string $source): void {
    $this->attributes["source"] = $source;
  }

  public function setTitle(string $title): void {
    $this->attributes["title"] = $title;
  }

  public function setAlt(string $alt): void {
    $this->attributes["alt"] = $alt;
  }

  public function setAlign(string $align): void {
    $aligns = ["left", "right", "top", "middle", "baseline", "bottom", "absbottom", "absmiddle", "texttop"];
    if(in_array($align, $aligns)) {
      $this->attributes["align"] = $align;
    }
  }

  protected function renderClosing(): string {
    return "\n";
  }
}
?>