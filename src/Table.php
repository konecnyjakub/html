<?php
declare(strict_types=1);

namespace HTML;

/**
 * Table
 *
 * @author Jakub Konečný
 */
class Table extends Container {
  public int $colls;
  protected array $collsNames = [];
  protected array $rows = [];

  public function __construct(int $colls) {
    parent::__construct("table");
    $this->colls = $colls;
  }

  public function setCollName(int $coll, string $name): Table {
    if($coll > $this->colls OR $coll <= 0) {
      throw new \OutOfBoundsException("Invalid column.");
    }
    $this->collsNames[$coll] = $name;
    return $this;
  }

  public function addRow(array $row): int {
    if(count($row) > $this->colls) {
      throw new \RuntimeException("The row contains too many columns.");
    }
    $this->rows[] = $row;
    /** @var int $index */
    $index = array_key_last($this->rows);
    return $index;
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