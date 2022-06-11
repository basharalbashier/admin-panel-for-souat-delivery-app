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
        
        return Provier::all();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addProvider(Request $request)
    {

        $request->validate([
            'imagee' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'imagee_local_id_image_front' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'imagee_local_id_image_back' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'imagee_license_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'imagee_vehicle_ownership_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name'=>'required',
            'phone'=>'required',
            'car_model'=>'required',
            'car_number'=>'required',
            'from'=>'required',
            'image'=>'required',
            'car_type'=>'required',
            'city'=>'required',
            'birthday'=>'required',
            'local_id_number'=>'required',
            'local_id_image_front'=>'required',
            'local_id_image_back'=>'required',
            'local_id_ex'=>'required',
            'license_number',
            'license_image'=>'required',
            'license_ex'=>'required',
            'vehicle_ownership_number'=>'required',
            'vehicle_ownership_ex'=>'required',
            'vehicle_ownership_image'=>'required',


        ]);


       
        if($request->hasfile('imagee','imagee_local_id_image_front','imagee_local_id_image_back','imagee_license_image','imagee_vehicle_ownership_image')){


                
                $input= $request->all();
                    $destinationPath = public_path('Images');


                    $profileImage =  $input['phone'] ;
                    $front=  $input['local_id_image_front'];
                    $back=  $input['local_id_image_back'];
                    $licens=  $input['license_image'];
                    $ownership=  $input['vehicle_ownership_image'];


                    $request->file('imagee')->move($destinationPath, $profileImage);
                    $request->file('imagee_local_id_image_front')->move($destinationPath, $front);
                    $request->file('imagee_local_id_image_back')->move($destinationPath, $back);
                    $request->file('imagee_license_image')->move($destinationPath, $licens);
                    $request->file('imagee_vehicle_ownership_image')->move($destinationPath, $ownership);

                    $insert['imagee'] = "$profileImage";
                    $insert['imagee_local_id_image_front'] = "$front";
                    $insert['imagee_local_id_image_back'] = "$back";
                    $insert['imagee_license_image'] = "$licens";
                    $insert['imagee_vehicle_ownership_image'] = "$ownership";

                    
                  $provider=  Provier::create($request->all());

                    $token= $provider->createToken('providertoken')->plainTextToken;
                   

                    $respons= [

                        'provider'=>$provider,
                        'token'=>$token

                    ];
                   
                    return response($respons,201);
                

        }
  
        
    

    }

    public function login(Request $request){
        $fields =$request->validate([
            'phone'=>'required'

        ]);
        $provider=Provier::where('phone', $fields['phone'])->first();

        if(!$provider){

            return response(0);
        }
        $token = $provider->createToken('providerLogin')->plainTextToken;

        $respons= [

            'provider'=>$provider,
            'token'=>$token
        ];

        return response($respons,201);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        

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
        
        return Provier::where('name', 'like', '%'.$name.'%')->orWhere('phone', 'like', '%'.$name.'%')->get();
    }


        /**
     * Search for phone 
     *
     * @param  str  $phone
     * @return \Illuminate\Http\Response
     */
    public function account($phone)
    {
        
        return Provier::where('phone', '=' ,$phone)->get();
    }
}
