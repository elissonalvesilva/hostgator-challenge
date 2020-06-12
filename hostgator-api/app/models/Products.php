<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'cycles'
    ];

    public function cycles() {
        return $this->hasMany('App\Models\Cycles' , 'product_id', 'id');
    }
}