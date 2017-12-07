<?php

namespace App\Http\Controllers\API;

//use Illuminate\Http\Request;
use Illuminate\Http\Request;
use App\Http\Controllers\API\mobileno;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Ahlancustomer;
use DB;
class AhlancustomerController extends Controller
{
 
 public function create(Request $request)
    {
	 
          Ahlancustomer::create($request->all());
          return response(array(
                'error' => false,
                'message' =>'customer added successfully',
		'successStatus' => 200,
		
		
               ),200);
    
}

 public function show($mobileno)
    {
        $Ahlancustomer = Ahlancustomer::find($mobileno);
	// $Ahlancustomer = Ahlancustomer::get();
        return response(array(
                'error' => false,
                'Ahlancustomer' =>$Ahlancustomer,
		
               ),200);
    }
    
/*public function display($royaltyid)
    {
        $Ahlancustomer = Ahlancustomer::find($royaltyid);
 

        return response(array(
                'error' => false,
                'Ahlancustomer' =>$Ahlancustomer->toArray(),
		
               ),200);
    } 
    */
    
}



?>

   
