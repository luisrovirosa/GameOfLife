<?php

namespace GameOfLife\Tests;

use GameOfLife\Cell;
use GameOfLife\World;

class WorldTest extends \PHPUnit_Framework_TestCase {
  /** @test */
  public function a_one_dimension_world_with_two_cells_connects_the_first_cell_with_the_second() {
    $cellProphecy = $this->prophesize(Cell::class);
    $neighbor = $this->prophesize(Cell::class)->reveal();
    $cells = [$cellProphecy->reveal(), $neighbor];

    new World($cells);

    $cellProphecy->addNeighbor($neighbor)->shouldHaveBeenCalledTimes(1);
  }
}