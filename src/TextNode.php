<?php
namespace HTML;

/**
 * TextNode
 *
 * @author Jakub Konečný
 */
final class TextNode implements IRenderable {
  protected string $content;

  public function __construct(string $content = "") {
    $this->content = $content;
  }

  /**
   * Add text at the end
   */
  public function addText(string $content): void {
    $this->content .= $content;
  }

  /**
   * Remove all text
   */
  public function removeText(): void {
    $this->content = "";
  }

  /**
   * Replace text
   */
  public function setContent(string $content = ""): void {
    $this->content = $content;
  }

  function render(): string {
    return $this->content . "\n";
  }
}
?>