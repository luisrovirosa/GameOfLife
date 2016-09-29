<?php

namespace GameOfLife;

class World {
  /**
   * @var Cell[][]
   */
  private $cells;

  /**
   * World constructor.
   * @param array $cells
   */
  public function __construct($cells) {
    $this->cells = $cells;
    $this->initialize();
  }

  public function nextDay() {
    /** @var Cell $cell */
    foreach ($this->cells[0] as $cell) {
      $cell->nextDay();
    }
  }

  private function initialize() {
    for ($i = 0; $i < count($this->cells[0]); $i++) {
      $this->connectsNextCell(0, $i);
      $this->connectsPreviousCell(0, $i);
      $this->connectsBottomCell(0, $i);
    }
  }

  /**
   * @param $x
   * @param $y
   */
  private function connectsNextCell($x, $y) {
    $this->addNeighbor($x, $y, $x, ($y + 1) % count($this->cells[$x]));
  }

  /**
   * @param $x
   * @param $y
   */
  private function connectsPreviousCell($x, $y) {
    if (count($this->cells[$x]) != 2) {
      $this->addNeighbor($x, $y, $x, ($y + count($this->cells[$x]) - 1) % count($this->cells[$x]));
    }
  }

  private function connectsBottomCell($x, $y) {
    $this->addNeighbor($x, $y, ($x + 1) % count($this->cells), $y);
  }

  /**
   * @param $cellX
   * @param $cellY
   * @param $neighborX
   * @param $neighborY
   */
  private function addNeighbor($cellX, $cellY, $neighborX, $neighborY) {
    $isSameNeighbor = $cellX == $neighborX && $cellY == $neighborY;
    if ($isSameNeighbor) {
      return;
    }
    $this->cells[$cellX][$cellY]->addNeighbor($this->cells[$neighborX][$neighborY]);
  }
}