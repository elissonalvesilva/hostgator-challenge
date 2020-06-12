<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cycles extends Model
{
    // table name
    protected $table = 'cycles';
    // hidden propertys from response
    protected $hidden = ["created_at", "updated_at", "product_id", "id"];

    /**
     * @var array
     */
    protected $fillable = [
        'type',
        'priceRenew',
        'priceOrder',
        'months'
    ];

    /**
     * Relations with Products by foreign key product_id
     * Product   -  Cycles
     *    1      -    N 
     */
    public function products() {
       return $this->belongsTo('App\Models\Products', 'id', 'product_id');
    }
}