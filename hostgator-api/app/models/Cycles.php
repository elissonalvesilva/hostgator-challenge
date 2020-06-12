<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cycles extends Model
{
    protected $table = 'cycles';
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

    public function products() {
       return $this->belongsTo('App\Models\Products', 'id', 'product_id');
    }
}