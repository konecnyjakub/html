<?php
declare(strict_types=1);

namespace HTML\Elements;

/**
 * Link
 *
 * @author Jakub Konečný
 */
final class Link extends \HTML\Element {
  public function __construct(string $text = "", string $href = "") {
    parent::__construct("a", $text);
    $this->attributes["href"] = $href;
  }

  public function setHref(string $url): void {
    $this->attributes["href"] = $url;
  }
}
?>