<?php
declare(strict_types=1);

namespace HTML;

/**
 * BaseElement
 *
 * @author Jakub Konečný
 */
abstract class BaseElement implements IRenderable {
  protected string $name;
  protected array $attributes;

  public function setId(string $id): void {
    $this->attributes["id"] = $id;
  }

  public function setClass(string $class): void {
    $this->attributes["class"] = $class;
  }
  
  /**
   * Render opening tag
   */
  protected function renderOpening(): string {
    $return = "<$this->name";
    foreach($this->attributes as $key => $value) {
      if(strlen($value) > 0) {
        $return .= " $key=\"$value\"";
      }
    }
    $return .= ">";
    return $return;
  }

  /**
   * Render closing tag
   */
  protected function renderClosing(): string {
    return "</$this->name>\n";
  }
  
  /**
   * Render element's content
   */
  abstract protected function renderContent(): string;

  public function render(): string {
    return $this->renderOpening() . $this->renderContent() . $this->renderClosing();
  }
}
?>