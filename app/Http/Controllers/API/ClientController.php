<?php

namespace App\Http\Controllers\API;

//use Illuminate\Http\Request;
use Illuminate\Http\Request;
use App\Http\Controllers\API\mobileno;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Client;
use DB;
class ClientController extends Controller
{
 
 public function create(Request $request)
    {
	 
          Client::create($request->all());
          return response(array(
                'error' => false,
                'message' =>'Client added successfully',
		'successStatus' => 200,
		
		
               ),200);
    
}

 public function display($mobileno)
    {
        $Client = Client::find($mobileno);
 //$Ahlancustomer = DB::table('ahlancustomers');
//$Ahlancustomer = Ahlancustomer::find($mobileno);
   //$Ahlancustomer = DB::table('ahlancustomers')
                   //->whereColumn('mobileno', '=', $Ahlancustomer)
                   //->whereColumn('mobileno', '=', $request->input($mobileno))
                   //->get();  
//$Ahlancustomer = Ahlancustomer::where('mobileno', 'LIKE', $mobileno)->get();
 /*$Ahlancustomer = DB::table('ahlancustomers')

            ->join('ahlanstatements', 'ahlancustomers.royaltyid', '=', 'ahlanstatements.royaltyid')
           ->whereColumn('ahlancustomers.mobileno', '=', $mobileno)
            ->select('ahlanstatements.*', 'ahlancustomers.royaltyid', 'ahlancustomers.name','ahlancustomers.mobileno','ahlanstatements.id')
            ->get(); 
      
*/
	
       $Client = Client::paginate(5);

        return response(array(
                'error' => false,
                'Client' =>$Client->toArray(),
		
               ),200);
    } 
    
    
}



?>

   
