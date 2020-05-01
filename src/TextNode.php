<?php
namespace HTML;

/**
 * TextNode
 *
 * @author Jakub Konečný
 */
class TextNode implements IRenderable {
  /** @var string */
  protected $content;

  function __construct(string $content = "") {
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
  
  /**
   * Replace text
   */
  function setContent(string $content = ""): void {
    $this->content = $content;
  }

  function render(): string {
    return $this->content . "\n";
  }
}
?>