<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Order::all();

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
            'user_id'=>'required',
            'start_address'=>'required',
            'start_late'=>'required',
            'start_longe'=>'required',
            'end_address'=>'required',
            'end_late'=>'required',
            'end_longe'=>'required',
            'fee'=>'required',
            'car_type'=>'required',
            'distance'=>'required',
            'status'=>'required',


        ]);
        return Order::create($request->all());
    

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

        return Order::find($id);


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

        $order = Order::find($id);
        $order->update($request->all());
        return $order;

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
        return Order::destroy($id);
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
        return Order::where('name', 'like', '%'.$name.'%')->get();
    }
}