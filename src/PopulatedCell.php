<?php

namespace GameOfLife;

class PopulatedCell extends Cell {
  public function nextDay() {
    if ($this->numberOfNeigbors <= 1 || $this->numberOfNeigbors >= 4) {
      return new EmptyCell();
    }
    return new PopulatedCell();
  }
}