<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Ahlancustomer;

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

       /* public function show($id)
    {
        $Ahlancustomer = Ahlancustomer::find($id);
	
        return response(array(
                'error' => false,
                'Ahlancustomer' =>$Ahlancustomer,
		
               ),200);
    } 


*/



 public function show($mobileno)
    {
       // $Ahlancustomer = Ahlancustomer::find($id);

$Ahlancustomer = Ahlancustomer::find($id);
$Ahlancustomer = Ahlancustomer::where('mobileno', 'LIKE', $mobileno)->get();


//public function get_view($id)
//{
   /*if (is_numeric($mobileno))
   {
       $Ahlancustomer = Ahlancustomer::find($mobileno);
   }
   else
   {
       $mobileno = 'mobileno'; // This is the name of the column you wish to search

       $Ahlancustomer = Ahlancustomer::where($mobileno , '=', $mobileno)->first();
   
         //$Ahlancustomer = Ahlancustomer::paginate(5);

*/

	//Ahlancustomer::where('mobileno', '=' ,$mobileno)->first();
        $Ahlancustomer = Ahlancustomer::paginate(5);

        return response(array(
                'error' => false,
                'Ahlancustomer' =>$Ahlancustomer,
		
               ),200);
    } 
    
    
}



?>
