<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Ahlanstatement;
use App\Ahlancustomer;
use DB;
class AhlanstatementController extends Controller
{
    
public function index(Request $request)
    {

     
        $Ahlanstatement = Ahlanstatement::paginate(5);
	
        return response(array(
                'error' => false,
                'Stores' =>$Ahlanstatement->toArray(),
	
               ),200); 
      
    }
      
	
       

public function destroy($id)
    {
        Ahlanstatement::find($id)->delete();
	
        return response(array(
		
                'error' => false,
                'message' =>'Product deleted successfully',
		
               ),200);

    }
         public function create(Request $request)
    {
	 
          Ahlanstatement::create($request->all());
          return response(array(
                'error' => false,
                'message' =>'statement added successfully',
		'successStatus' => 200,
		
		
               ),200);
    
}
     public function show($royaltyid)
    {
$royaltyid = Ahlanstatement::find($royaltyid);
      $ahlanstatements = DB::table("ahlanstatements");
       $ahlanstatements = $ahlanstatements->select('*');
$ahlanstatements = $ahlanstatements->where('royaltyid', '=', $royaltyid)->get();
       
   
       //$Ahlanstatement = DB::table('ahlanstatements')->where('royaltyid', '=', $royaltyid)->first();
     
      //$Ahlanstatement = Ahlanstatement::find($royaltyid);
        $Ahlanstatement = Ahlanstatement::paginate(5);
       
	
        return response(array(
                'error' => false,
                'Ahlanstatement' =>$Ahlanstatement->toArray(),
		
               ),200);
    } 

   
}




