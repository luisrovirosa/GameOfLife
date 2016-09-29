<?php

namespace GameOfLife;

class PopulatedCell {
  /** @var  int */
  private $numberOfNeigbors;

  /**
   * PopulatedCell constructor.
   */
  public function __construct() {
    $this->numberOfNeigbors = 0;
  }

  public function addNeighbor(PopulatedCell $cell) {
    $this->numberOfNeigbors++;
  }

  public function nextDay() {
    if ($this->numberOfNeigbors == 0) {
      return new EmptyCell();
    }
    return new PopulatedCell();
  }
}