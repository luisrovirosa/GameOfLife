<?php

namespace GameOfLife;

class World {

  /**
   * World constructor.
   * @param array $cells
   */
  public function __construct($cells) {
    $cells[0]->addNeighbor($cells[1]);
  }
}