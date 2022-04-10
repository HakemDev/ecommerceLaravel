<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Console\Command;
use Illuminate\Http\Request;

class CommandesController extends Controller
{

    public function __construct()
        {
            $this->middleware('iadmin');
        }

    public function index()
         {
             return view('commande.index')->with(['commandes'=>Order::latest()->paginate(4),
                  ]);
         }
    public function edit1($id)
         {
            $order=Order::whereId($id)->first();
            if($order->paid)
               {
                   $order->paid=0;
               }
            else 
               {
                   $order->paid=1;
               }
            $order->save();
            return redirect()->route('show.commande')->with(['success'=>" Changement d'état de livraison d'ordre est bien effectuée"]);
         }
    public function edit2($id)
         {
            $order=Order::whereId($id)->first();
            if($order->delivred)
               {
                   $order->delivred=0;
               }
            else 
               {
                   $order->delivred=1;
               }
            $order->save();
            return redirect()->route('show.commande')->with(['success'=>" Changement d'état de paiement d'ordre est bien effectuée"]);
         }
    public function delete($id)
         {
            $order=Order::whereId($id)->first();
            
            $order->delete();
            return redirect()->route('show.commande')->with(['success'=>" Ordre $id est supprimé"]);
         }
         

}
