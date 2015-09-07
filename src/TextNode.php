<?php
namespace HTML;

/**
 * TextNode
 *
 * @author Jakub Konečný
 */
class TextNode {
  /** @var string */
  protected $content;
  
  /**
   * @param string $content
   */
  function __construct($content = "") {
    $this->content = (string) $content;
  }
  
  /**
   * Add text at the end
   * 
   * @param string $content
   * @return void
   */
  function addText($content) {
    $this->content .= (string) $content;
  }
  
  /**
   * Remove all text
   * 
   * @return void
   */
  function removeText() {
    $this->content = "";
  }
  
  /**
   * Replace text
   * 
   * @param string $content
   * @return void
   */
  function setText($content) {
    $this->content = (string) $content;
  }
  
  /**
   * Render the element
   * 
   * @return string
   */
  function render() {
    return $this->content . "\n";
  }
}
?>