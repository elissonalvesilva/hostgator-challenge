<?php

namespace App\Controllers;

use App\Controllers\Controller;
use Psr\Http\Message\{
    ServerRequestInterface as Request,
    ResponseInterface as Response
};

class HealthController extends Controller
{
    /**
     * Return status ok if 
     * applications is up
     * 
     * @param Request $request
     * @param Response $response
     * @param [type] $args
     * @return void
     */
    public function health(Request $request, Response $response)
    {
        $data = array('status' => 'ok');
        $payload = json_encode($data);

        $response->getBody()->write($payload);
        return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(201);
    }
}
