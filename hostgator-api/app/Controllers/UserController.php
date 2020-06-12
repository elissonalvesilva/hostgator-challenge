<?php

namespace App\Controllers;

use App\Models\User;
use Psr\Http\Message\{
    ServerRequestInterface as Request,
    ResponseInterface as Response
};

class UserController extends Controller
{

    /**
     * @param Request $request
     * @param Response $response
     *
     * @return mixed
     */
    public function users(Request $request, Response $response)
    {

        // $email = $request->getAttribute('email');
        $userDetails     =   User::all();

        $data = array('name' => $userDetails);
        $payload = json_encode($data);

        $response->getBody()->write($payload);
        return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(201);
    }
}