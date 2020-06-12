<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Psr\Http\Message\{
    ServerRequestInterface as Request,
    ResponseInterface as Response
};

class HealthController extends BaseController
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
        $this->setParams($request, $response);
        $data = array('status' => 'ok');

        return $this->jsonResponse($data, http_response_code());
    }
}
