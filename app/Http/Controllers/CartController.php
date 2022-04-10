<?php

namespace App\Http\Controllers;

use Srmklive\PayPal\Services\ExpressCheckout;

use App\Models\Product;
use Illuminate\Http\Request;
use Darryldecode\Cart;

class CartController extends Controller
{
    public function panier(Product $product)
        {
           return view('cart.panier')->with([
               "product"=>$product,
            ]);
        }
    public function add_product(Product $product,Request $request)
        {
            \Cart::add(
                        array(
                            'id' => $product->id,
                            'name' => $product,
                            'price' => $product->price,
                            'quantity' => $request->qty,
                            'attributes' => array(),
                            'ssociatedModel'=>$product
                
                            )
                );
            return redirect()->route("cart.show");
        }
    public function delete_order(Product $product)
        {
            \Cart::remove($product->id);
            if(\Cart::isEmpty())
              {
                return redirect()->route("home");
              }
            else 
               {
                return redirect()->route("cart.show");

               }
        }
    public function update_order(Product $product,Request $request)
        {
           \Cart::update($product->id, array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->qty
                
                )
            ));
            return redirect()->route("cart.show");
            
        }
    public function cart()
        {  
             return view('cart.cart')->with([ "items"=>\Cart::getContent()]);
        }
   
} 
