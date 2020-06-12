<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use stdClass;

class Products extends Model
{
    //table name
    protected $table = 'products';
    // hidden params from response
    protected $hidden = ["created_at", "updated_at"];

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'cycles'
    ];

    /**
     * Get all products created
     * @return Array $product - Return a product array
     */
    public function getAll() {
        $products = Products::all();
        $products->load('cycles');
        return $products;
    }

    /**
     * Get product by Id
     * 
     * @param Integer $id - product id
     * @return StdClass $response - builded response
     */
    public function getProductById(int $id): stdClass {
        $product_id = (int) htmlspecialchars(strip_tags($id));
        $response = new stdClass;
        try {
            $product = Products::findOrFail($product_id);
            $product->load('cycles');
            $response->code = 200;
            $response->data = $product;
            return $response; 
        } catch (ModelNotFoundException $e) {
            $response->code = 404;
            $response->error = true;
            $response->message = $e->getMessage();
            return $response;
        }
    }

    /**
     * Relations with Products by foreign key product_id
     * Product   -  Cycles
     *    1      -    N 
     */
    public function cycles() {
        return $this->hasMany('App\Models\Cycles' , 'product_id', 'id');
    }

}