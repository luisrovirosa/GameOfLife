<?php

namespace GameOfLife;

abstract class Cell {
  /** @var  int */
  protected $numberOfNeigbors;

  protected $neighbors;

  /**
   * PopulatedCell constructor.
   */
  public function __construct() {
    $this->numberOfNeigbors = 0;
    $this->neighbors = [];
  }

  public function addNeighbor(Cell $cell) {
    if (in_array($cell, $this->neighbors, TRUE)) {
      return;
    }
    if ($cell instanceof PopulatedCell) {
      $this->neighbors[] = $cell;
      $this->numberOfNeigbors++;
    }
  }

  abstract function nextDay();
}