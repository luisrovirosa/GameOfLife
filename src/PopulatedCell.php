<?php

namespace GameOfLife;

class PopulatedCell extends Cell {
  /** @var  int */
  private $numberOfNeigbors;

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

  public function nextDay() {
    if ($this->numberOfNeigbors <= 1 || $this->numberOfNeigbors == 4) {
      return new EmptyCell();
    }
    return new PopulatedCell();
  }
}