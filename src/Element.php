<?php
namespace HTML;

/**
 * Element
 *
 * @author Jakub Konečný
 */
abstract class Element extends BaseElement {
  /** @var string */
  protected $content;

  function __construct(string $name, string $content = "") {
    $this->name = $name;
    $this->content = $content;
  }
  
  /**
   * Add text at the end
   */
  function addText(string $content): void {
    $this->content .= $content;
  }
  
  /**
   * Remove all text
   */
  function removeText(): void {
    $this->content = "";
  }

  function setContent(string $content = ""): void {
    $this->content = $content;
  }
  
  /**
   * Render element's content
   */
  function renderContent(): string {
    return $this->content;
  }
}
?>