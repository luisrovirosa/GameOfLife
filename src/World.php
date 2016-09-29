<?php

namespace GameOfLife;

class World {

  /**
   * World constructor.
   * @param array $cells
   */
  public function __construct($cells) {
    for ($i = 0; $i < count($cells); $i++) {
      $cells[$i]->addNeighbor($cells[($i + 1) % count($cells)]);
      $cells[$i]->addNeighbor($cells[($i + 2) % count($cells)]);
    }
  }
}