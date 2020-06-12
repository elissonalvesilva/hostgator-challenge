<?php

declare(strict_types=1);

namespace Tests\Controllers;

use stdClass;
use Tests\TestBase;

class HealthCheckTest extends TestBase {

  public function testHealth () {
    $method = "GET";
    $path = "/health";

    $assertion = new stdClass;
    $assertion->code = 200;
    $assertion->shared = new stdClass;
    $assertion->shared->status = 'ok';

    $response = $this->makeRequest($method, $path);

    $this->assertEquals($assertion, $response);
  }
}