<?php
namespace HTML;

/**
 * BaseElement
 *
 * @author Jakub Konečný
 */
abstract class BaseElement {
  /** @var string */
  protected $name;
  /** @var string */
  protected $class;
  /** @var string */
  protected $id;
  
  /**
   * @param string $id
   */
  function setId($id) {
    $this->id = (string) $id;
  }
  
  /**
   * @param string $class
   */
  function setClass($class) {
    $this->class = (string) $class;
  }
}
?>