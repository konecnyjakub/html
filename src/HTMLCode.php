<?php
namespace HTML;

/**
 * HTMLCode
 *
 * @author Jakub Konečný
 */
class HTMLCode implements IRenderable {
  /** @var string */
  protected $content;

  function __construct(string $content = "") {
    $this->content = $content;
  }
  
  /**
   * Change the content
   */
  function setContent(string $content = ""): void {
    $this->content = $content;
  }

  function render(): string {
    return $this->content . "\n";
  }
}
?>