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

        $products = Products::all();
        $products->load('cycles');
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
        
        try {
            $product_id = $this->args['id'];
            $product = Products::findOrFail($product_id);
            $product->load('cycles');
            return $this->jsonResponse($product, http_response_code());
        } catch (ModelNotFoundException $e) {
            return $this->jsonResponse($e->getMessage(), http_response_code());
        }
        
    }
}