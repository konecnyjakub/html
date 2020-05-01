<?php
namespace HTML;

/**
 * TextNode
 *
 * @author Jakub Konečný
 */
final class TextNode implements IRenderable {
  public string $content;

  public function __construct(string $content = "") {
    $this->content = $content;
  }

  function render(): string {
    return $this->content . "\n";
  }
}
?>