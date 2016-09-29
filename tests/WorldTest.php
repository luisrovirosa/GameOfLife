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

  /** @test */
  public function a_one_dimension_world_with_two_cells_connects_the_second_cell_with_the_first() {
    $cellProphecy = $this->prophesize(Cell::class);
    $neighbor = $this->prophesize(Cell::class)->reveal();
    $cells = [$neighbor, $cellProphecy->reveal()];

    new World($cells);

    $cellProphecy->addNeighbor($neighbor)->shouldHaveBeenCalledTimes(1);
  }

  /** @test */
  public function a_one_dimension_world_with_three_cells_connects_the_first_cell_with_the_third() {
    $cellProphecy = $this->prophesize(Cell::class);
    $neighbor = $this->prophesize(Cell::class)->reveal();
    $cells = [$cellProphecy->reveal(), $this->prophesize(Cell::class)->reveal(), $neighbor];

    new World($cells);

    $cellProphecy->addNeighbor($neighbor)->shouldHaveBeenCalledTimes(1);
  }

  /** @test */
  public function a_one_dimension_world_with_three_cells_connects_the_second_cell_with_the_third() {
    $cellProphecy = $this->prophesize(Cell::class);
    $neighbor = $this->prophesize(Cell::class)->reveal();
    $cells = [$this->prophesize(Cell::class)->reveal(), $cellProphecy->reveal(), $neighbor];

    new World($cells);

    $cellProphecy->addNeighbor($neighbor)->shouldHaveBeenCalledTimes(1);
  }
}