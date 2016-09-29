<?php

namespace GameOfLife\Tests;

use GameOfLife\Cell;
use GameOfLife\World;

class TwoDimensionWorldTest extends \PHPUnit_Framework_TestCase {
  /** @test */
  public function with_one_cell_connects_the_up_cell_with_the_down() {
    $cellProphecy = $this->prophesize(Cell::class);
    $neighbor = $this->prophesize(Cell::class)->reveal();
    $cells = [[$cellProphecy->reveal()], [$neighbor]];

    new World($cells);

    $cellProphecy->addNeighbor($neighbor)->shouldHaveBeenCalledTimes(1);
  }

  /** @test */
  public function with_one_cell_connects_the_down_cell_with_the_up() {
    $cellProphecy = $this->prophesize(Cell::class);
    $neighbor = $this->prophesize(Cell::class)->reveal();
    $cells = [[$neighbor], [$cellProphecy->reveal()]];

    new World($cells);

    $cellProphecy->addNeighbor($neighbor)->shouldHaveBeenCalledTimes(1);
  }
}