<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable=[
           'title',
           'slug',
           'description',
           'price',
           'old_price',
           'instock',
           'image',
           'category_id',
    ];
    protected function category()
      {
          return $this->belongsTo('App\Models\Category');
      }
      public function getRouteKeyName()
      {
        return "id"; 
      }
            
}
