<?php

namespace GameOfLife;

abstract class Cell {
  /** @var  int */
  protected $numberOfNeigbors;

  /**
   * PopulatedCell constructor.
   */
  public function __construct() {
    $this->numberOfNeigbors = 0;
  }

  public function addNeighbor(Cell $cell) {
    if ($cell instanceof PopulatedCell) {
      $this->numberOfNeigbors++;
    }
  }

  abstract function nextDay();
}