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

    protected function setParams(Request $request, Response $response, array $args = [])
    {
        $this->request = $request;
        $this->response = $response;
        $this->args = $args;
    }
    /**
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


    /**
     * @return array
     */
    protected function getInput()
    {
        return $this->request->getParsedBody();
    }

}