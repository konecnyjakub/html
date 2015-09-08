<?php
namespace HTML;

/**
 * Element that be rendered
 * 
 * @author Jakub Konečný
 */
interface IRenderable {
  /**
   * Render the element
   * 
   * @return string
   */
  function render();
}
?>