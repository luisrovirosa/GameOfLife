<?php

namespace GameOfLife;

class World {
  /**
   * @var array
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

  private function initialize() {
    for ($i = 0; $i < count($this->cells); $i++) {
      $this->addNeighbor($i, ($i + 1) % count($this->cells));
      $this->addNeighbor($i, ($i + 2) % count($this->cells));
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
    $this->cells[$cellIndex]->addNeighbor($this->cells[$neighborIndex]);
  }
}