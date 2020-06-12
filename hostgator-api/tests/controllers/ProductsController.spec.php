<?php

declare(strict_types=1);

namespace Tests\Controllers;

use App\Models\Products;
use stdClass;
use Tests\TestBase;

class ProductsControllerTest extends TestBase
{
  
  /**
   * Test a return All products from Model
   * 
   * Mock a product list
   */
  public function testAllProducts () {
    $assertion = new stdClass;
    $assertion->code = 200;
    $assertion->shared = new stdClass;
    $assertion->shared->data = new stdClass;
    $assertion->shared->data->id = 1;
    $assertion->shared->data->name = 'Test plan';

    $cycleAssertion = new stdClass;
    $cycleAssertion->type = "monthly";
    $cycleAssertion->priceRenew = "24.19";
    $cycleAssertion->priceOrder = "24.19";
    $cycleAssertion->months = 1;
    $assertion->shared->data->cycles = [ $cycleAssertion ];

    $stub = $this->createMock(Products::class);

    $stub->method('getAll')
         ->willReturn($assertion);

    $this->assertEquals($assertion, $stub->getAll());
  }

  /**
   * Test a return product by id from Model
   * 
   * Mock a product result
   */
  public function testGetProductById () {
    $assertion = new stdClass;
    $assertion->code = 200;
    $assertion->shared = new stdClass;
    $assertion->shared->data = new stdClass;
    $assertion->shared->data->id = 2;
    $assertion->shared->data->name = 'Test plan return by id';

    $cycleAssertion = new stdClass;
    $cycleAssertion->type = "getProductById";
    $cycleAssertion->priceRenew = "339.19";
    $cycleAssertion->priceOrder = "330.19";
    $cycleAssertion->months = 1;
    $assertion->shared->data->cycles = [ $cycleAssertion ];

    $stub = $this->createMock(Products::class);

    $stub->method('getProductById')
         ->willReturn($assertion);

    $this->assertEquals($assertion, $stub->getProductById(2));
  }

  /**
   * Test response if product is not found
   * 
   * Mock a product result
   */
  public function testProductByIdNotFound () {
    $assertion = new stdClass;
    $assertion->code = 404;
    $assertion->error = true;
    $assertion->message = "No query results for model [App\Models\Products]";

    $stub = $this->createMock(Products::class);

    $stub->method('getProductById')
         ->willReturn($assertion);

    $this->assertEquals($assertion, $stub->getProductById(5));
  }

  /**
   * Test response if product id is not equal to integer
   * 
   * Mock a product result
   */
  public function testProductIdDifferentToInteger () {
    $assertion = new stdClass;
    $assertion->statusCode = 404;
    $assertion->error = true;
    $assertion->type = "SERVER_ERROR";
    $assertion->message = "An internal error has occurred while processing your request.";

    $stub = $this->createMock(Products::class);

    $stub->method('getProductById')
         ->willReturn($assertion);

    $this->assertEquals($assertion, $stub->getProductById(5));
  }
}