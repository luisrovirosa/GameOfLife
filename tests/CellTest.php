<?php

namespace GameOfLife\Tests;

use GameOfLife\EmptyCell;
use GameOfLife\PopulatedCell;

class CellTest extends \PHPUnit_Framework_TestCase {
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
  public function a_populated_cell_with_no_neighbors_dies_by_solitude() {
    $cell = new PopulatedCell();

    $nextDayCell = $cell->nextDay();

    $this->assertEquals(new EmptyCell(), $nextDayCell);
  }

  /** @test */
  public function a_populated_cell_with_two_empty_neighbors_dies_by_solitude() {
    $cell = new PopulatedCell();
    $cell->addNeighbor(new EmptyCell());
    $cell->addNeighbor(new EmptyCell());

    $nextDayCell = $cell->nextDay();

    $this->assertEquals(new EmptyCell(), $nextDayCell);
  }

  /** @test */
  public function a_populated_cell_with_one_neighbor_dies_by_solitude() {
    $cell = new PopulatedCell();
    $cell->addNeighbor(new PopulatedCell());

    $nextDayCell = $cell->nextDay();

    $this->assertEquals(new EmptyCell(), $nextDayCell);
  }

  /** @test */
  public function a_populated_cell_with_four_neighbor_dies_by_overpopulation() {
    $cell = new PopulatedCell();
    $cell->addNeighbor(new PopulatedCell());
    $cell->addNeighbor(new PopulatedCell());
    $cell->addNeighbor(new PopulatedCell());
    $cell->addNeighbor(new PopulatedCell());

    $nextDayCell = $cell->nextDay();

    $this->assertEquals(new EmptyCell(), $nextDayCell);
  }

  /** @test */
  public function a_populated_cell_with_five_neighbor_dies_by_overpopulation() {
    $cell = new PopulatedCell();
    $cell->addNeighbor(new PopulatedCell());
    $cell->addNeighbor(new PopulatedCell());
    $cell->addNeighbor(new PopulatedCell());
    $cell->addNeighbor(new PopulatedCell());
    $cell->addNeighbor(new PopulatedCell());

    $nextDayCell = $cell->nextDay();

    $this->assertEquals(new EmptyCell(), $nextDayCell);
  }

  /** @test */
  public function an_empty_cell_with_two_neighbors_becomes_populates() {
    $cell = new EmptyCell();
    $cell->addNeighbor(new PopulatedCell());
    $cell->addNeighbor(new PopulatedCell());

    $nextDayCell = $cell->nextDay();

    $this->assertEquals(new PopulatedCell(), $nextDayCell);
  }

  /** @test */
  public function an_empty_cell_with_three_neighbors_becomes_populates() {
    $cell = new EmptyCell();
    $cell->addNeighbor(new PopulatedCell());
    $cell->addNeighbor(new PopulatedCell());
    $cell->addNeighbor(new PopulatedCell());

    $nextDayCell = $cell->nextDay();

    $this->assertEquals(new PopulatedCell(), $nextDayCell);
  }

  /** @test */
  public function a_populated_cell_with_three_neighbors_survives() {
    $cell = new PopulatedCell();
    $cell->addNeighbor(new PopulatedCell());
    $cell->addNeighbor(new PopulatedCell());
    $cell->addNeighbor(new PopulatedCell());

    $nextDayCell = $cell->nextDay();

    $this->assertEquals(new PopulatedCell(), $nextDayCell);
  }

  /** @test */
  public function add_twice_the_same_neighbor_count_as_one_neighbor() {
    $cell = new PopulatedCell();
    $neighbor = new PopulatedCell();
    $cell->addNeighbor($neighbor);
    $cell->addNeighbor($neighbor);

    $nextDayCell = $cell->nextDay();

    $this->assertEquals(new EmptyCell(), $nextDayCell);
  }

}