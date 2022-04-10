<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable=['product_name',
        'user_id',
         'price',
         'total',
         'paid',
         'delivred',];
    protected function product()
    {
        return $this->hasMany('App\Models\Product');
    }
    public function getRouteKeyName()
      {
        return "id"; 
      }
    
}
