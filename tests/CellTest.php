<?php

namespace GameOfLife\Tests;

use GameOfLife\EmptyCell;

class CellTest extends \PHPUnit_Framework_TestCase {
  // A populated cell with two neighbors survives
  // A populated cell with three neighbors survives

  // A cell with no neighbors dies by solitude
  // A cell with four neighbors dies by overpopulation

  // A empty cell with two neighbors becomes populates
  // A empty cell with three neighbors becomes populates

  // Each cells knows their neighbors
  // Each cells knows their next day status
  /** @test */
  public function an_empty_cell_with_no_neighbors_remains_empty() {
    $cell = new EmptyCell();

    $nextDayCell = $cell->nextDay();

    $this->assertEquals(new EmptyCell(), $nextDayCell);
  }
}