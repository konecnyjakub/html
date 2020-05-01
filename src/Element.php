<?php
namespace HTML;

/**
 * Element
 *
 * @author Jakub Konečný
 */
abstract class Element extends BaseElement {
  protected string $content;

  public function __construct(string $name, string $content = "") {
    $this->name = $name;
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

  public function setContent(string $content = ""): void {
    $this->content = $content;
  }

  protected function renderContent(): string {
    return $this->content;
  }
}
?>