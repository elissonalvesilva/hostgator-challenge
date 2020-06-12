<?php

namespace App\Controllers;

use App\Models\Products;
use Psr\Http\Message\{
    ServerRequestInterface as Request,
    ResponseInterface as Response
};
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProductsController extends BaseController
{
    /**
     * Get all products
     * 
     * @param Request $request
     * @param Response $response
     *
     * @return mixed
     */
    public function index(Request $request, Response $response)
    {
        $product = new Products();
        $products = $product->getAll();
        $data = array('shared' => $products);
        $payload = json_encode($data);

        $response->getBody()->write($payload);
        return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(200);
    }

    /**
     * Get product by id
     * 
     * @param Request $request
     * @param Response $response
     *
     * @return mixed
     */
    public function getProduct(Request $request, Response $response, $args)
    {
        $this->setParams($request, $response, $args);
        
        $product_id = $this->args['pid'];
        $product = new Products();
        $product = $product->getProductById($product_id);

        if ($product->error) {
            return $this->jsonResponse($product->message, $product->code);
        }

        return $this->jsonResponse($product->data, http_response_code());
    }
}