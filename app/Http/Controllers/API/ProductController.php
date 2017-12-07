<?php
namespace App\Http\Controllers\API; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use DB;
class ProductController extends Controller
{
    
    public function index(Request $request)
    {
	/*$products = DB::table('categories')
            ->join('products', 'categories.id', '=', 'products.categoryid')
           
            ->select('categories.*', 'categories.id','products.productname', 'products.id','products.price','products.unit','products.manufacturer','products.image','products.baseprice','products.productnameinarabic','products.manufacturerinarabic')
            ->get();      
*/
           $products = DB::table('products')
            ->join('categories', 'categories.id', '=', 'products.categoryid')
           
            ->select('products.*', 'categories.categorytype', 'categories.id','categories.categoryinarabic','products.id')
            ->get(); 
      
        return response(array(
                'error' => false,
                 
                'products' =>$products->toArray(),
	
               ),200); 
      
    }


public function getFavouriteProducts(Request $request)
    {
           $products = DB::table('products')
            ->join('categories', 'categories.id', '=', 'products.categoryid')

            ->select('products.*', 'categories.categorytype', 'categories.id','categories.categoryinarabic','products.id')
            ->get(); 
	$user = Auth::user();
	$finalProductArray = array();
        foreach ($products->toArray() as $product) {
                $favouriteProductCount = DB::table('favouriteproducts')->where([['userid', '=', $user->id], ['productid', '=', $product->id]])->count();
		if($favouriteProductCount > 0) {
			$product->is_favourite = true;
		} else {
			$product->is_favourite = false;
		}
		array_push($finalProductArray, $product);
        }

        return response(array(
                'error' => false,
                'products' => $finalProductArray,
		'user' => $user
               ),200); 

    }
public function favouriteProductsTest() {
	//$arr = DB::table('favouriteproducts')->where([['userid', '=', $user->id], ['productid', '=', $product->id]])->count();
        $arr = DB::table('favouriteproducts')->get();

	return response(array(
                'error' => false,
                'products' => $arr->toArray(),
               ),200); 

}

         public function create(Request $request)
    {
	 
          Product::create($request->all());
          return response(array(
                'error' => false,
                'message' =>'Product created successfully',
		'successStatus' => 200,

		
		
               ),200);
    
}
    

    public function show($id)
    {
        $Product = Product::find($id);
	
        return response(array(
                'error' => false,
                'Product' =>$Product,
		
               ),200);
    } 
    public function update(Request $request, $id)
    {
        Product::find($id)->update($request->all());
	
        return response(array(
                'error' => false,
                'message' =>'Product updated successfully',
		
               ),200);
    }
    public function destroy($id)
    {
        
       Product::find($id)->delete();
	
        return response(array(
		
                'error' => false,
                'message' =>'Product deleted successfully',
		
               ),200);
    }
}
?>



