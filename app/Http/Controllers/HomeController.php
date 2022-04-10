<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth')->except('index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
        {
            $produit=Product::latest()->paginate(3);
           $cats=Category::all();
           $acces=1;
            return view('welcome',compact('produit'),compact('cats'))->with(['acces'=>$acces]);
        }

    public function show($id)
       {
           $cat=Category::whereId($id)->first();
           $produit=$cat->product;
           
           return view('product.show')->with([
                                             "produit"=>Category::whereId($id)->first()->product,
                                             "cats"=>Category::all()]);
       }
}
