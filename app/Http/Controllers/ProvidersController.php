<?php

namespace App\Http\Controllers;
use App\Models\Provier;
use Illuminate\Http\Request;

class ProvidersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Provier::all();

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
            'phone'=>'required',
            'car_model'=>'required',
            'car_number'=>'required',
            'late'=>'required',
            'longe'=>'required',
            'active'=>'required',
            'blocked'=>'required',
            'varified'=>'required',
            'on_trip'=>'required',
            'from'=>'required',
            'image'=>'required',
            'car_type'=>'required',

        ]);
        return Provier::create($request->all());
    

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

        return Provier::find($id);


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

        $provider = Provier::find($id);
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
        return Provier::destroy($id);
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
        return Provier::where('name', 'like', '%'.$name.'%')->get();
    }
}
