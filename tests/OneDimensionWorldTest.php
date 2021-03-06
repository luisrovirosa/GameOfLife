<?php

namespace GameOfLife\Tests;

use GameOfLife\Cell;
use GameOfLife\EmptyCell;
use GameOfLife\World;
use Prophecy\Argument;

class OneDimensionWorldTest extends \PHPUnit_Framework_TestCase {
  /** @test */
  public function with_two_cells_connects_the_first_cell_with_the_second() {
    $cellProphecy = $this->prophesize(Cell::class);
    $neighbor = $this->prophesize(Cell::class)->reveal();
    $cells = [[$cellProphecy->reveal(), $neighbor]];

    new World($cells);

    $cellProphecy->addNeighbor($neighbor)->shouldHaveBeenCalled();
  }

  /** @test */
  public function with_two_cells_connects_the_second_cell_with_the_first() {
    $cellProphecy = $this->prophesize(Cell::class);
    $neighbor = $this->prophesize(Cell::class)->reveal();
    $cells = [[$neighbor, $cellProphecy->reveal()]];

    new World($cells);

    $cellProphecy->addNeighbor($neighbor)->shouldHaveBeenCalled();
  }

  /** @test */
  public function with_three_cells_connects_the_first_cell_with_the_third() {
    $cellProphecy = $this->prophesize(Cell::class);
    $neighbor = $this->prophesize(Cell::class)->reveal();
    $cells = [[$cellProphecy->reveal(), $this->prophesize(Cell::class)->reveal(), $neighbor]];

    new World($cells);

    $cellProphecy->addNeighbor($neighbor)->shouldHaveBeenCalled();
  }

  /** @test */
  public function with_three_cells_connects_the_second_cell_with_the_third() {
    $cellProphecy = $this->prophesize(Cell::class);
    $neighbor = $this->prophesize(Cell::class)->reveal();
    $cells = [[$this->prophesize(Cell::class)->reveal(), $cellProphecy->reveal(), $neighbor]];

    new World($cells);

    $cellProphecy->addNeighbor($neighbor)->shouldHaveBeenCalled();
  }

  /** @test */
  public function with_three_cells_connects_the_third_cell_with_the_first() {
    $cellProphecy = $this->prophesize(Cell::class);
    $neighbor = $this->prophesize(Cell::class)->reveal();
    $cells = [[$neighbor, $this->prophesize(Cell::class)->reveal(), $cellProphecy->reveal()]];

    new World($cells);

    $cellProphecy->addNeighbor($neighbor)->shouldHaveBeenCalled();
  }

  /** @test */
  public function with_three_cells_connects_the_third_cell_with_the_second() {
    $cellProphecy = $this->prophesize(Cell::class);
    $neighbor = $this->prophesize(Cell::class)->reveal();
    $cells = [[$this->prophesize(Cell::class)->reveal(), $neighbor, $cellProphecy->reveal()]];

    new World($cells);

    $cellProphecy->addNeighbor($neighbor)->shouldHaveBeenCalled();
  }

  /** @test */
  public function a_cell_is_not_neighbor_of_himself() {
    $cellProphecy = $this->prophesize(Cell::class);
    $cell = $cellProphecy->reveal();
    $cells = [[$cell, $this->prophesize(Cell::class)->reveal()]];

    new World($cells);

    $cellProphecy->addNeighbor($cell)->shouldNotHaveBeenCalled();
  }

  /** @test */
  public function with_four_cells_is_not_connected_the_first_and_the_third() {
    $cellProphecy = $this->prophesize(Cell::class);
    $neighbor = $this->prophesize(Cell::class)->reveal();
    $cells = [
      [
        $cellProphecy->reveal(),
        $this->prophesize(Cell::class)->reveal(),
        $neighbor,
        $this->prophesize(Cell::class)->reveal()
      ]
    ];

    new World($cells);

    $cellProphecy->addNeighbor($neighbor)->shouldNotHaveBeenCalled();
  }

  /** @test */
  public function next_day_calls_next_day_of_the_first_cell() {
    $cellProphecy = $this->prophesize(Cell::class);
    $cells = [[$cellProphecy->reveal()]];

    (new World($cells))->nextDay();

    $cellProphecy->nextDay()->shouldHaveBeenCalled();
  }

  /** @test */
  public function next_day_calls_next_day_of_the_second_cell() {
    $cellProphecy = $this->prophesize(Cell::class);
    $cells = [
      [
        $this->prophesize(Cell::class)->reveal(),
        $cellProphecy->reveal(),
        $this->prophesize(Cell::class)->reveal()
      ]
    ];

    (new World($cells))->nextDay();

    $cellProphecy->nextDay()->shouldHaveBeenCalled();
  }

  /** @test */
  public function next_day_calls_next_day_of_the_third_cell() {
    $cellProphecy = $this->prophesize(Cell::class);
    $cells = [
      [
        $this->prophesize(Cell::class)->reveal(),
        $this->prophesize(Cell::class)->reveal(),
        $cellProphecy->reveal()
      ]
    ];

    (new World($cells))->nextDay();

    $cellProphecy->nextDay()->shouldHaveBeenCalled();
  }

  /** @test */
  public function two_consecutive_day_calls_next_day_of_the_calls_the_object_returned() {
    $cellProphecy = $this->prophesize(Cell::class);
    $nextDayCellProphecy = $this->prophesize(Cell::class);
    $cellProphecy->nextDay()->willReturn($nextDayCellProphecy->reveal());
    $cells = [[$cellProphecy->reveal()]];
    $world = (new World($cells));

    $world->nextDay();
    $world->nextDay();

    $nextDayCellProphecy->nextDay()->shouldHaveBeenCalled();
  }

  /** @test */
  public function next_day_sets_the_neighbors_of_the_resulting_cells() {
    $cellProphecy = $this->prophesize(Cell::class);
    $nextDayCellProphecy = $this->prophesize(Cell::class);
    $cellProphecy->nextDay()->willReturn($nextDayCellProphecy->reveal());
    $cellProphecy->addNeighbor(Argument::any())->shouldBeCalled();
    $cells = [[$cellProphecy->reveal(), new EmptyCell()]];
    $world = (new World($cells));

    $world->nextDay();

    $nextDayCellProphecy->addNeighbor(Argument::any())->shouldHaveBeenCalled();
  }

}
