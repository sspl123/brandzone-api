<?php
namespace App\Http\Controllers\API;
//use App\Http\Middleware\HttpsProtocol;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Ahlanstatement;
use App\Ahlancustomer;
use App\Store;
use DB;
class AhlanstatementController extends Controller
{

	public function getStatementList($mobileno) {

        $customerObj = Ahlancustomer::get()->where('mobileno', $mobileno);
		//return response(array('error' => true, 'msg' => $customerObj), 404);
		$statementArray = array();
		$customerObject = "";
		foreach ($customerObj as $customer) {
			//$customerObject = $customerObj[$key];
                    $customerObject = $customer;
                    $statementList = Ahlanstatement::get()->where('royaltyid', $customerObject['royaltyid']);
			foreach ($statementList as $statement) {
				 $stores = Store::get()->where('id', $statement['storeid']);
                                foreach ($stores as $store) {
                                         $statement['store'] = $store;
                                }

				array_push($statementArray, $statement);
			}
		}
		return response(array(
								'error' => false,
								'statements-list' =>$statementArray,
								'customer' => $customerObject
                       ),200);
	}

public function index($royaltyid)
    {

//$royaltyid = $request->attributes->get('royaltyid');

    /*$Ahlanstatement = DB::table('ahlanstatements')
   ->join('ahlancustomers','ahlanstatements.royaltyid','=','ahlancustomers.royaltyid')
  

   // ->join('ahlancustomers','ahlanstatements.royaltyid','=','ahlancustomers.mobileno')
    ->select('ahlancustomers.royaltyid', 'ahlanstatements.royaltyid',
	'ahlanstatements.invoiceno','ahlanstatements.dateofinvoice','ahlanstatements.totalamount', 
	'ahlanstatements.points','ahlanstatements.redeemedcomment')
   //->whereColumn('ahlancustomers.royaltyid', '= ', 1)
  
            ->get(); 
   //->join('customers','customers.royality_id','=', '?')
  

        //$Ahlanstatement = Ahlanstatement::paginate(5);
	*/
//$royaltyid = Ahlanstatement::find($royaltyid);
//$royaltyid = Ahlanstatement:: ahlancustomers.royaltyid;
  
$statementsArray = Ahlanstatement::get()->where('royaltyid', $royaltyid);

//$mobileno = Ahlanstatement::find('123456');
 //$mobileno = Ahlanstatement::where('ahlanstatements.mobileno', '=', '123456')->first();
 //$mobileno = DB::table('ahlancustomers')->pluck('mobileno');
 
/* $Ahlanstatement = DB::table('ahlanstatements')
            ->join('ahlancustomers', 'ahlanstatements.mobileno', '=', 'ahlancustomers.mobileno')
            ->join('stores', 'stores.id', '=', 'ahlanstatements.storeid')
			  //->select('stores.*', 'ahlancustomers.name', 'ahlancustomers.mobileno','ahlancustomers.royaltyid')
            ->select('ahlanstatements.*', 'ahlancustomers.name', 'ahlancustomers.mobileno',
			'ahlancustomers.royaltyid','stores.storename','stores.storenameinarabic',
			'stores.address','stores.city','stores.state')
			->where('ahlanstatements.mobileno','=', $mobileno)
            ->get();*/
/*$Ahlanstatement =  DB::table('ahlanstatements')
    ->join('ahlancustomers','ahlanstatements.mobileno','=','ahlancustomers.mobileno')
  

      ->join('stores','store.id','=','ahlanstatements.storeid')
        //->join('ahlancustomers', function($join)
      //  {
			//  $join->on('store.id', '=', 'ahlanstatements.storeid');
          //  $join->on('ahlancustomers.mobileno', '=', 'ahlanstatements.mobileno');
             
                   //  })
        ->get();
//$royaltyid = Ahlanstatement::find($royaltyid);
//$statementArray =  Ahlanstatement::get()->where(['royaltyid',$royaltyid],true);*/
        return response(array(
                'error' => false,
              // 'statements-list' =>$Ahlanstatement->toArray(),
		       'statements-list' =>$statementsArray,
	
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
public function test() {
$statementList = Store::get(array('stores.storename'))->where('id', 5);
return response(array(
                'error' => false,
		'msg' => 'Hello! This is test API',
		'statement' => $statementList
//		'input' => $id
               ),200); 
}
    /* public function show($royaltyid)
    {
$royaltyid = Ahlanstatement::find($royaltyid);
      Alanstatement = Ahlanstatement::paginate(5);
       
	
        return response(array(
                'error' => false,
                'Ahlanstatement' =>$Ahlanstatement->toArray(),
		
               ),200);
    } 

   */
}




