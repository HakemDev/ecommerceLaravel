<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{   
   public function __construct()
   {
       
   }

   public function index()
       {
           return view('admin.index');
       }
    public function showloginform()
       {
           return view('admin.login');
       }
    public function store(Request $request)
       {
            $validator = validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required|min:4'
            ]);
           
            if (auth()->guard('admin')->attempt(['email' => $request->email, 'password' => $request->password ], $request->get("remember"))) 
                {
                    return "hey1";
                } 
            else 
                {
                return redirect()->route("admin.login")->with(["errorLink" => "Email ou mot de passe est incorrect" ]);
                }
       }
}
