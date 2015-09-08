<?php
namespace HTML;

/**
 * Table
 *
 * @author Jakub Konečný
 */
class Table extends Container {
  /** @var int */
  protected $colls;
  /** @var array */
  protected $collsNames = array();
  /** @var array */
  protected $rows = array();
  
  /**
   * @param int $colls
   */
  function __construct($colls) {
    parent::__construct("table");
    if(is_int($colls)) $this->colls = $colls;
    else throw new InvalidValueException("Invalid value for parametr colls passed to method Table::__construct. Expected integer.");
  }
  
  /**
   * @param int $coll
   * @param string $name
   * @return Table
   * @throws InvalidValueException
   */
  function setCollName($coll, $name) {
    if($coll > $this->colls OR $coll <= 0) exit("Invalid column.");
    if(!is_string($name)) throw new InvalidValueException("Invalid value for parametr name passed to method Table::setCollName. Expected string.");
    $this->collsNames[$coll] = $name;
    return $this;
  }
  
  /**
   * Add new row
   * 
   * @param array $row
   * @return int Row's index
   */
  function addRow(array $row) {
    if(count($row) > $this->colls) exit;
    $count = count($this->rows);
    $this->rows[$count] = $row;
    $rowNum = &$this->rows[$count];
    return $rowNum;
  }
  
  /**
   * Remove a row
   * 
   * @param int $row Row's index
   * @return void
   */
  function removeRow($row) {
    if(isset($this->rows[$row])) unset($this->rows[$row]);
  }
  
  /**
   * Render the element
   * 
   * @return string
   */
  function render() {
    $return = "<table>\n<tr>";
    foreach($this->collsNames as $name) {
      $return .= "<th>$name</th>";
    }
    $return .= "</tr>\n";
    foreach($this->rows as $row) {
      $return .= "<tr>";
      foreach($row as $coll) {
        $return .= "<td>$coll</td>";
      }
      $return .= "</tr>\n";
    }
    $return .= "</table>\n";
    return $return;
  }
}
?>