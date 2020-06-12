<?php declare(strict_types=1);

namespace App\Controllers;

use Psr\Http\Message\{
  ServerRequestInterface as Request,
  ResponseInterface as Response
};

abstract class BaseController extends Controller
{
    /**
     * @var Request $request
     */
    protected $request;
    /**
     * @var Response $response
     */
    protected $response;

    /**
     * @var array $args
     */
    protected $args;

    /**
     * Set Params
     * @param Request $request - Requests Params
     * @param Response $response - Response Params
     * @param Array $args - Array of Arguments
     * @return void
     */
    protected function setParams(Request $request, Response $response, array $args = []): void
    {
        $this->request = $request;
        $this->response = $response;
        $this->args = $args;
    }
    /**
     * Return a json response to API and 
     * make a result response by status code
     * 
     * @param string $status
     * @param mixed $message
     * @param int $code
     * @return Response
     */
    protected function jsonResponse($message, int $code):  Response
    {
        $result = [];
        if ($code < 400) {
            $result = [
                'code' => $code,
                'shared' => $message,
            ];
        } else {
            $result = [
                'code' => $code,
                'message' => $message,
            ];
        }

        $payload = json_encode($result);
        $this->response->getBody()->write($payload);
        return $this->response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus($code);
    }

}