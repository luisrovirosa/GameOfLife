<?php
namespace GameOfLife;

class EmptyCell extends Cell {

  /**
   * @return \GameOfLife\Cell
   */
  public function nextDay() {
    return $this->numberOfNeigbors == 3
      ? new PopulatedCell()
      : new EmptyCell();
  }
}