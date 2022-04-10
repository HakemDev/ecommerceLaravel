<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\ActivateYourAccount;

class ActivateController extends Controller
{
   public function ActivateAccount($code)
        {     
            $user=User::whereCode($code)->first();
            $user->code='null';
            $user->active=1;
            $user->save();
            Auth::login($user);
             return redirect()->route('home')->withsuccess("Vous étez maintenant connecté");
        }

    public function resendverification($id)
        {
            
            $user=User::whereId($id)->first();
            if($user->active)
               {
                   return redirect("/login")->withInfo("votre email est déja activer");
               }
            else 
               {
                   Mail::to($user)->send(new ActivateYourAccount($user->code));
                   return redirect('/login')->withSuccess("votre email d'activation est envoyé");
               }
               
        }
}
