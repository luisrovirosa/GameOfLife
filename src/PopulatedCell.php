<?php

namespace GameOfLife;

class PopulatedCell {

  /**
   * PopulatedCell constructor.
   */
  public function __construct() {
  }

  public function addNeighbor(PopulatedCell $cell) {
  }

  public function nextDay() {
    return new PopulatedCell();
  }
}