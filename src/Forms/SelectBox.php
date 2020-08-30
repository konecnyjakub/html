<?php
declare(strict_types=1);

namespace HTML\Forms;

/**
 * SelectBox
 *
 * @author Jakub Konečný
 */
final class SelectBox extends \HTML\Container {
  public function __construct(string $name = "", ?int $size = null) {
    parent::__construct("select");
    $this->attributes["name"] = $name;
    if($size !== null) {
      $this->attributes["size"] = $size;
    }
  }

  public function setFieldName(string $name): void {
    $this->attributes["name"] = $name;
  }

  public function setSize(int $size): void {
    $this->attributes["size"] = $size;
  }

  public function addOption(string $value = "", string $text = ""): SelectBoxOption {
    $element = new SelectBoxOption($value, $text);
    $count = count($this->elements);
    $this->elements[$count] = $item = $element;
    return $item;
  }
}
?>