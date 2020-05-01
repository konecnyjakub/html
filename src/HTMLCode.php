<?php
declare(strict_types=1);

namespace HTML;

/**
 * HTMLCode
 *
 * @author Jakub Konečný
 */
final class HTMLCode implements IRenderable {
  public string $content;

  public function __construct(string $content = "") {
    $this->content = $content;
  }

  public function render(): string {
    return $this->content . "\n";
  }
}
?>