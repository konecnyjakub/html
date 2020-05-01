<?php
declare(strict_types=1);

namespace HTML;

/**
 * Element
 *
 * @author Jakub Konečný
 */
class Element extends BaseElement {
  public string $content;

  public function __construct(string $name, string $content = "") {
    $this->name = $name;
    $this->content = $content;
  }

  protected function renderContent(): string {
    return $this->content;
  }
}
?>