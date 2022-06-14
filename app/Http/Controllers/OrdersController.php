<?php

namespace App\Http\Controllers;

use App\Models\Lemo;
use App\Models\Order;
use App\Models\Provier;
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
     
            'user_name'=>'required',
            'user_phone'=>'required',
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
       $fields= $request->validate([
            'status'=>'required',


        ]);
        $status=$fields['status'];
        $order = Order::find($id);
        if($status=='7'){
          if($order['status']=='0'){
            $order->update($request->all());
            return $order;
          }else{
            return 'You need to be faster';
          }
            

        }

        $order->update($request->all());
     
        if($status=='11'){
            $driver = Provier::find($order['provider_id']);
            $lemo = Lemo::find($driver['from']);

            $palance = $lemo['palance'];
            $palanceAfter= $palance- ($order['fee']*5/100) ;
        //    $doit= $lemo->update(['palance'=>$persantag]);
            if($palanceAfter<0){
                $providers=   Provier::  where('from', '=' ,$lemo['id'])->update(['blocked'=>'1']);
                return $providers;
            }
            
           return $palanceAfter;

        }
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

            /**
     * Search for phone 
     *
     * @param  str  $phone
     * @return \Illuminate\Http\Response
     */
    public function my_orders($phone)
    {
        //
        return Order::where('user_phone', '=' ,$phone)->get();
    }

                /**
     * Search for phone 
     *
     * @param  str  $phone
     * @return \Illuminate\Http\Response
     */
    public function getorders($phone)
    {


         
        //
        return Order::where([['car_type', '=' ,$phone],['status', '=' ,'0']])->get();
    }



                /**
     * Search for phone 
     *
     * @param  str  $phone
     * @return \Illuminate\Http\Response
     */
    public function dohaverunning($phone)
    {
        //
        return Order::where('provider_phone', '=' ,$phone)->get();
    }
}
