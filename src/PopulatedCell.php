<?php

namespace GameOfLife;

class PopulatedCell extends Cell {
  /**
   * @return \GameOfLife\Cell 
   */
  public function nextDay() {
    return $this->numberOfNeigbors == 2 || $this->numberOfNeigbors == 3
      ? new PopulatedCell()
      : new EmptyCell();
  }
}