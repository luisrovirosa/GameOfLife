<?php

namespace GameOfLife;

class World {

  /**
   * World constructor.
   * @param array $cells
   */
  public function __construct($cells) {
    for ($i = 0; $i < count($cells); $i++) {
      $nextIndex = ($i + 1) % count($cells);
      if ($i != $nextIndex) {
        $cells[$i]->addNeighbor($cells[$nextIndex]);
      }
      $previousIndex = ($i + 2) % count($cells);
      if ($i != $previousIndex) {
        $cells[$i]->addNeighbor($cells[$previousIndex]);
      }
    }
  }
}