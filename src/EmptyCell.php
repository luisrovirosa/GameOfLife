<?php
namespace GameOfLife;

class EmptyCell extends Cell {

  /**
   * EmptyCell constructor.
   */
  public function __construct() {
  }

  /**
   * @return \GameOfLife\EmptyCell
   */
  public function nextDay() {
    return new EmptyCell();
  }
}