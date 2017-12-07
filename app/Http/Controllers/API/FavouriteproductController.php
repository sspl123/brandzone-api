<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Favouriteproduct;

class FavouriteproductController extends Controller
{
     public function create(Request $request)
    {
	 
          Favouriteproduct::create($request->all());
          return response(array(
                'error' => false,
                'message' =>'Favouriteproduct added successfully',
		'successStatus' => 200,
		
		
               ),200);
    
}
public function show(Request $request)
    {

        $Favouriteproduct = Favouriteproduct::get();
	
        return response(array(
                'error' => false,
                'Favouriteproduct' =>$Favouriteproduct->toArray(),
	
               ),200); 
      
    }
}
