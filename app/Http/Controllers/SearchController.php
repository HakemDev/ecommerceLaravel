<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

class SearchController extends Controller
{
    //
   public function search(Request $request)
      {
          $final=[];
       $products=Product::all();
       $i=0;
       foreach($products as $product)
           {
       
            
            if(Str::contains(Str::lower($product->title),Str::lower( $request->search)))
              {
                   $product;
                     //  $array = Arr::add(['name' => 'Desk'], 'price', 100);

                     // ['name' => 'Desk', 'price' => 100]
                     $final[$i]=$product;
                     $i++;
              }
               
           }
          $final;
           $produit=$final;
           $cats=Category::all();
           $acces=0;
           return view('welcome',compact('produit'),compact('cats'))->with(['acces'=>$acces]);
      }
 
}
