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
      $this->connectsNextCell($i);
      $this->connectsPreviousCell($i);
    }
  }

  /**
   * @param $i
   */
  private function connectsNextCell($i) {
    $this->addNeighbor($i, ($i + 1) % count($this->cells[0]));
  }

  /**
   * @param $i
   */
  private function connectsPreviousCell($i) {
    if (count($this->cells[0]) != 2) {
      $this->addNeighbor($i, ($i + count($this->cells[0]) - 1) % count($this->cells[0]));
    }
  }

  /**
   * @param $cellIndex
   * @param $neighborIndex
   */
  private function addNeighbor($cellIndex, $neighborIndex) {
    if ($cellIndex == $neighborIndex) {
      return;
    }
    $this->cells[0][$cellIndex]->addNeighbor($this->cells[0][$neighborIndex]);
  }
}