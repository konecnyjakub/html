<?php
namespace HTML\Elements;

/**
 * Link
 *
 * @author Jakub Konečný
 */
class Link extends \HTML\Element {
  function __construct(string $text = "", string $href = "") {
    parent::__construct("a", $text);
    $this->attributes["href"] = $href;
  }

  function setHref(string $url) {
    $this->attributes["href"] = $url;
  }
}
?>