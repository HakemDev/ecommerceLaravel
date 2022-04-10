<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rules\Exists;

class ProductController extends Controller
{
    public function __construct()
        {
            $this->middleware('iadmin');
        }
          
    public function index()
        {
            $products=Product::all();
            return view('product.index',compact('products'));
        }
    public function delete($id)
        {
            $products=Product::whereId($id)->first();
            $title=$products->title;
            $products->delete();
            return redirect()->route("show.product")->with(['success'=>"produit $title est supprimé"]);
        }
    public function edit($id)
        {
            $cat=Category::all();
            $products=Product::whereId($id)->first();
            return view('product.edit',compact('products'),compact('cat'));

        }
    public function update(Request $request,$id)
        {   
             $product=Product::whereId($id)->first();
            $this->validate($request,[
                "title"=>"required | min:3",
                "description"=>"required | min:10",
                "price"=>"required",
                "file"=>"required | image | mimes:png,jpg,jpeg |max:2048",
                "old_price"=>"required",
                "instock"=>"required",
                "categorie_id"=>"required",
            ]);
            
            if($request->has("file"))
                {
                    $image_path=public_path($product->image);
                    if(File::exists($image_path))
                      {
                        unlink($image_path);
                      }
                      $file=$request->file('file');
                      $imagename=time()."_". $file->getClientOriginalName();
                      $file->move(public_path("image/products"),$imagename);
                      $product->image="image/products/".$imagename;
                }
            $product->update([
                'title'=>$request->title,
                'description'=>$request->description,
                'price'=>$request->price,
                'old_price'=>$request->old_price,
                'instock'=>$request->instock,
                'image'=>$product->image,
                'category_id'=>$request->categorie_id,
            ]);
            
           return redirect()->route('edit.product',$product->id)->with([
            'success'=>'Votre Produit est bien Modifié'
        ]);;
        }
        public function show_add()
           {
             return view('product.add')->with([ "cat"=>Category::all()]);
           }
        public function add(Request $request)
           {
               
                
                $this->validate($request,[
                        "title"=>"required | min:3",
                    "description"=>"required | min:10",
                    "price"=>"required",
                    "file"=>"required | image | mimes:png,jpg,jpeg |max:2048",
                    "old_price"=>"required",
                    "instock"=>"required",
                    "categorie_id"=>"required",
                ]);
                if($request->has('file'))
                {
                    $file=$request->file('file');
                    $imagename=time()."_".$file->getClientOriginalName();
                    $file->move(public_path("image/products"),$imagename);
                    $imagename="image/products/".$imagename;
                    
                    
                    Product::create
                        ([ 
                            'category_id'=>$request->categorie_id,
                            'title'=>$request->title,
                            'description'=>$request->description,
                            'price'=>$request->price,
                            'old_price' =>$request->old_price,
                            'instock'=>$request->instock,
                            'image'=>$imagename,
                            
                        ]);
                    return redirect()->route('show.product')->with([
                        'success'=>'Votre Produit est bien Ajoutés'
                    ]);
                   }
                    
             
           }
}
