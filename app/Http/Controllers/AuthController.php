<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\User;


class AuthController extends Controller
{
    //


    public function add(Request $request){ 

        $fields =$request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required'

        ]);
        $user=User::create($request->all());


        $token = $user->createToken('userLogin')->plainTextToken;

        $respons= [

            'user'=>$user,
            'token'=>$token
        ];

        return response($respons,201);


    }

    public function login(Request $request){ 

 
            $fields =$request->validate([
                'email'=>'required',
                'password'=>'required'
    
            ]);
            $user=User::where('email', $fields['email'])->where('password', $fields['password'])->first();
    
            if(!$user){
    
                return response(0);
            }
            $token = $user->createToken('userLogin')->plainTextToken;
    
            $respons= [
    
                'user'=>$user,
                'token'=>$token
            ];
    
            return response($respons,201);
    
    
        }
    
    



   
        public function logout(Request $request){ 

           auth()->user()->tokens->each(function($token, $key) {
                $token->delete();
            });

            return 1;


        }
   
   
   
    
   
   
   
   
    }
