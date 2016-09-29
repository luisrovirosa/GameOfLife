<?php

namespace GameOfLife\Tests;

use GameOfLife\EmptyCell;
use GameOfLife\PopulatedCell;

class CellTest extends \PHPUnit_Framework_TestCase {
  // A populated cell with three neighbors survives

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

  /** @test */
  public function a_populated_cell_with_two_neighbors_survives() {
    $cell = new PopulatedCell();
    $cell->addNeighbor(new PopulatedCell());
    $cell->addNeighbor(new PopulatedCell());

    $nextDayCell = $cell->nextDay();

    $this->assertEquals(new PopulatedCell(), $nextDayCell);
  }

  /** @test */
  public function a_cell_with_no_neighbors_dies_by_solitude() {
    $cell = new PopulatedCell();

    $nextDayCell = $cell->nextDay();

    $this->assertEquals(new EmptyCell(), $nextDayCell);
  }

  /** @test */
  public function a_cell_with_two_empty_neighbors_dies_by_solitude() {
    $cell = new PopulatedCell();
    $cell->addNeighbor(new EmptyCell());
    $cell->addNeighbor(new EmptyCell());

    $nextDayCell = $cell->nextDay();

    $this->assertEquals(new EmptyCell(), $nextDayCell);
  }

  /** @test */
  public function a_cell_with_one_neighbor_dies_by_solitude() {
    $cell = new PopulatedCell();
    $cell->addNeighbor(new PopulatedCell());

    $nextDayCell = $cell->nextDay();

    $this->assertEquals(new EmptyCell(), $nextDayCell);
  }

}