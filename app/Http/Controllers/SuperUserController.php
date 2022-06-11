<?php

namespace App\Http\Controllers;
use App\Models\SuperUser;
use Illuminate\Http\Request;

class SuperUserController extends Controller
{

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return SuperUser::all();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        //
        $fields = $request->validate([
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
        ]);


        $check=SuperUser::where('phone', $fields['phone'])->first();
      

        if($check){

            $token = $check->createToken('providerLogin')->plainTextToken;

            $respons= [
    
                'super'=>$check,
                'token'=>$token
            ];
    
            return response($respons,201);


        }else{
            $super=  SuperUser::create($request->all());

            $token= $super->createToken('super')->plainTextToken;
           
    
            $respons= [
    
                'super'=>$super,
                'token'=>$token
    
            ];
           
            return response($respons,201);
        }
       
    

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

        return SuperUser::find($id);


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

        $super_user = SuperUser::find($id);
        $super_user->update($request->all());
        return $super_user;

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
        return SuperUser::destroy($id);
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
        return SuperUser::where('name', 'like', '%'.$name.'%')->orWhere('phone', 'like', '%'.$name.'%')->orWhere('email', 'like', '%'.$name.'%')->get();
    }
}
