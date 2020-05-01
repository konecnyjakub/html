<?php
namespace HTML;

/**
 * Element that can be rendered
 * 
 * @author Jakub Konečný
 */
interface IRenderable {
  /**
   * Render the element
   */
  public function render(): string;
}
?>