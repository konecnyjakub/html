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
  function render(): string;
}
?>