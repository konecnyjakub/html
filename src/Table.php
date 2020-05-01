<?php
namespace HTML;

/**
 * Table
 *
 * @author Jakub Konečný
 */
class Table extends Container {
  protected int $colls;
  protected array $collsNames = [];
  protected array $rows = [];

  public function __construct(int $colls) {
    parent::__construct("table");
    $this->colls = $colls;
  }

  public function setCollName(int $coll, string $name): Table {
    if($coll > $this->colls OR $coll <= 0) {
      exit("Invalid column.");
    }
    $this->collsNames[$coll] = $name;
    return $this;
  }

  public function addRow(array $row): int {
    if(count($row) > $this->colls) {
      exit;
    }
    $count = count($this->rows);
    $this->rows[$count] = $row;
    $rowNum = &$this->rows[$count];
    return $rowNum;
  }

  public function removeRow(int $row): void {
    if(isset($this->rows[$row])) {
      unset($this->rows[$row]);
    }
  }

  protected function renderContent(): string {
    $return = "<tr>";
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
    return $return;
  }
}
?>