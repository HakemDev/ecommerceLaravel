<?php

namespace App\Http\Controllers;

use App\Mail\PayProduct;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PhpParser\Node\Stmt\Foreach_;
use Srmklive\PayPal\Services\ExpressCheckout;
use Srmklive\PayPal\Services\AdaptivePayments;
class PayerController extends Controller
{ 
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    public function payer()
    {
        if(\Cart::isEmpty())
               {
                return redirect()->route('cart.show')->with(["errorLink"=>"votre panier est vide,essayer de remplir" ]);
               }
        $data =[];
        $data['items'] =[];
            foreach(\Cart::getContent() as $item)
                {
                  array_push( $data['items'], [
                    'name' =>$item->name->title,
                    'price' => (int) ($item->price/9),
                    'desc'  => $item->name->description,
                    'qty' =>  $item->quantity
                  ]);
                }
          
        
        $data['invoice_id'] = auth()->user()->id;
        $data['invoice_description'] = "Commande #{$data['invoice_id']}";
        $data['return_url'] =route("payer.succes");
        $data['cancel_url'] = route("payer.cancel");
        
        $total = 0;
        foreach($data['items'] as $item) 
        {
            $total += $item['price']*$item['qty'];
        }
        
       

       
        $data['total'] = $total;
         $paypalModule = new ExpressCheckout;
         $response = $paypalModule->setExpressCheckout($data);
         $response = $paypalModule->setExpressCheckout($data, true);
         return redirect($response["paypal_link"]);


       
        return 'hey';



        /*
        //give a discount of 10% of the order amount
        $data['shipping_discount'] = round((10 / 100) * $total, 2);
        */
    }
    public function cancel()
       {
           return redirect()->route('cart.show')->with(['info'=>'vous avez annuler le paiement']);
       }
    public function success(Request $request)

    {     
        
        $paypalModule = new ExpressCheckout; 
        $reponse = $paypalModule->getExpressCheckoutDetails($request->token);
        if (in_array(strtoupper($reponse['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING']))
         {
            foreach(\Cart::getContent() as $item)
              {
                  Order::create([
                      'user_id '=>auth()->user()->id,
                      'product_name'=>$item->name->title,
                      'price'=>$item->price,
                      'total'=>$item->price * $item->quantity,
                      'paid'=>1
                  ]);
                
              }
           \Cart::clear();
              return redirect()->route('cart.show')->withsuccess('paiement effectué avec succes');

        }
        
    }

    public function livr()
         {     
              if(\Cart::isEmpty())
               {
                return redirect()->route('cart.show')->with(["errorLink"=>"votre panier est vide,essayer de remplir" ]);
               }
             foreach(\Cart::getContent() as $item)
                {  

                    Order::create([
                                   'user_id'=>auth()->user()->id,
                                   'product_name'=>$item->name->title,
                                   'price'=>$item->price,
                                   'total'=>$item->price*$item->quantity,
                                   'paid'=>0,
                                   'delivred'=>0
                    ]);
                    
                }
                echo auth()->user()->id."<br>";
                echo $item->name->title;
                echo $item->price;
                echo $item->price * $item->quantity;
                $items=\Cart::getContent();
                $user=User::whereId($id)->first();
                $name=$user->name;
                Mail::to($user)->send(new PayProduct($items,$name));
                \Cart::clear();
                    $user=User::whereId($id)->first();
                    $mail=$user->email ;    
                    return redirect()->route('cart.show')->with(["success"=>"votre commande est bien effectué on va confirmer votre livraison sur votre 
                    Addresse Mail $mail" ]);
         }

    
}
