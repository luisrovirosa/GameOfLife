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
    for ($i = 0; $i < count($this->cells); $i++) {
      $nextIndex = ($i + 1) % count($this->cells);
      if ($i != $nextIndex) {
        $this->cells[$i]->addNeighbor($this->cells[$nextIndex]);
      }
      $previousIndex = ($i + 2) % count($this->cells);
      if ($i != $previousIndex) {
        $this->cells[$i]->addNeighbor($this->cells[$previousIndex]);
      }
    }
  }
}