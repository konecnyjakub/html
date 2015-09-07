<?php
namespace HTML;

/**
 * Description of HTMLCode
 *
 * @author Jakub Konečný
 */
class HTMLCode {
  /** @var string */
  protected $content;
  
  /**
   * @param string $content
   */
  function __construct($content = "") {
    $this->content = (string) $content;
  }
  
  /**
   * Change the content
   * 
   * @param string $content
   * @return void
   */
  function setContent($content = "") {
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