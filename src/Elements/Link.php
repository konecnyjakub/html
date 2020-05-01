<?php
namespace HTML\Elements;

/**
 * Link
 *
 * @author Jakub Konečný
 */
class Link extends \HTML\Element {
  public function __construct(string $text = "", string $href = "") {
    parent::__construct("a", $text);
    $this->attributes["href"] = $href;
  }

  public function setHref(string $url) {
    $this->attributes["href"] = $url;
  }
}
?>