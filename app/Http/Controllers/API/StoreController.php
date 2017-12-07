<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Store;

class StoreController extends Controller

{ public function index(Request $request)
    {

        $Store = Store::get();
	
        return response(array(
                'error' => false,
                'Stores' =>$Store->toArray(),
	
               ),200); 
      
    }

         public function create(Request $request)
    {
	 
          Store::create($request->all());
          return response(array(
                'error' => false,
                'message' =>'Store added successfully',
		'successStatus' => 200,
		
		
               ),200);
    
}
    

    public function show($id)
    {
        $Store = Store::find($id);
	
        return response(array(
                'error' => false,
                'Store' =>$Store,
		
               ),200);
    } 
    public function update(Request $request, $id)
    {
        Store::find($id)->update($request->all());
	
        return response(array(
                'error' => false,
                'message' =>'Store updated successfully',
		
               ),200);
    }
    public function destroy($id)
    {
        Store::find($id)->delete();
	
        return response(array(
		
                'error' => false,
                'message' =>'Store deleted successfully',
		
               ),200);
    }
}
?>


