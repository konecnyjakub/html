<?php
namespace HTML\Elements;

/**
 * Link
 *
 * @author Jakub Konečný
 */
class Link extends \HTML\Element {
  /**
   * @param string $text
   * @param string $href
   */
  function __construct($text = "", $href = "") {
    parent::__construct("a", $text);
    $this->attributes["href"] = (string) $href;
  }
  
  /**
   * @param string $url
   */
  function setHref($url) {
    $this->attributes["href"] = (string) $url;
  }
}
?>