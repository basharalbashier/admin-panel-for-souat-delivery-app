<?php

namespace App\Http\Controllers;

use App\Models\Lemo;
use Illuminate\Http\Request;

class LemoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Lemo::all();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name'=>'required',
            'username'=>'required',
            'phone'=>'required',
            'password'=>'required',

        ]);
        return Lemo::create($request->all());
    

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        return Lemo::find($id);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $provider = Lemo::find($id);
        $provider->update($request->all());
        return $provider;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        return Lemo::destroy($id);
    }
        /**
     * Search for name 
     *
     * @param  str  $name
     * @return \Illuminate\Http\Response
     */
    public function search($name)
    {
        //
        return Lemo::where('name', 'like', '%'.$name.'%')->get();
    }
    public function login(Request $request){ 

 
        $fields =$request->validate([
            'username'=>'required',
            'password'=>'required'

        ]);
        $user=Lemo::where('username', $fields['username'])->where('password', $fields['password'])->first();

        if(!$user){

            return response(0);
        }
        $token = $user->createToken('lemologin')->plainTextToken;

        $respons= [

            'lemo'=>$user,
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
