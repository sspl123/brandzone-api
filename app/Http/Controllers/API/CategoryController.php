<?php
namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Category;
use DB;
class CategoryController extends Controller
{
    //

public function destroy($id)
    {
        Category::find($id)->delete();
	
        return response(array(
		
                'error' => false,
                'message' =>'category deleted successfully',
		
               ),200);
    }

public function create(Request $request)
    {
          Category::create($request->all());
 $last = DB::table('categories')->latest()->first();
          return response(array(
                'error' => false,
                'message' =>'Category added successfully',
		'category'=>$last,

               ),200);
    
}


 public function index(Request $request)
    {
        // $Category = Category::find($id)->with('products')->get()
        //$categories = Category::with('products')->get();

        //category = Category::with('products')->find($categoryid);
        $Category = Category::get();
        
	
        return response(array(
                'error' => false,
                'Category' =>$Category->toArray(),
	
               ),200); 
      
    }


}
