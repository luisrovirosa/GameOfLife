<?php
namespace GameOfLife;

class EmptyCell extends Cell {

  /**
   * @return \GameOfLife\EmptyCell
   */
  public function nextDay() {
    if ($this->numberOfNeigbors == 2 || $this->numberOfNeigbors == 3) {
      return new PopulatedCell();
    }
    return new EmptyCell();
  }
}