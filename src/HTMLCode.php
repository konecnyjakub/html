<?php
namespace HTML;

/**
 * HTMLCode
 *
 * @author Jakub Konečný
 */
class HTMLCode implements IRenderable {
  protected string $content;

  public function __construct(string $content = "") {
    $this->content = $content;
  }
  
  /**
   * Change the content
   */
  public function setContent(string $content = ""): void {
    $this->content = $content;
  }

  public function render(): string {
    return $this->content . "\n";
  }
}
?>