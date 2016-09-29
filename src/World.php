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
    for ($file = 0; $file < count($this->cells); $file++) {
      for ($column = 0; $column < count($this->cells[$file]); $column++) {
        $this->connectsNextCell($file, $column);
        $this->connectsPreviousCell($file, $column);
        $this->connectsBottomCell($file, $column);
        $this->connectsUpperCell($file, $column);
      }
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

  private function connectsUpperCell($x, $y) {
    $this->addNeighbor($x, $y, ($x + count($this->cells) - 1) % count($this->cells), $y);
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