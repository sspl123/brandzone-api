<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;

class UserController extends Controller
{

    public $successStatus = 200;

    /**
     * login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(){

        if(Auth::attempt(['mobileno' => request('mobileno'), 'password' => request('password')])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')->accessToken;
	     $success['id'] =  $user->id;
             $success['name'] =  $user->name;
	     $success['email'] =  $user->email;
	     $success['mobileno'] =  $user->mobileno;
              $success['dateOfBirth'] =  $user->dateOfBirth;
	     $success['profileimage'] =  $user->profileimage;
             $success['status'] =  $user->status;
	    $success['role'] =  $user->role;
	  $success['gender'] =  $user->gender;
             
            return response()->json(['success' => $success], $this->successStatus);
        }
        else{
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }

    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            //'name' => 'required',
            //'email' => 'required|email',
            //'gender' => 'required|gender',
	    'mobileno' => 'required',
            'password' => 'required',
            //'c_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);            
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')->accessToken;
        $success['name'] =  $user->name;
         $success['id'] =  $user->id;
          $success['email'] =  $user->email;  
$success['mobileno'] =  $user->mobileno;



        return response()->json(['success'=>$success], $this->successStatus);
    }

 public function index(Request $request)
    {

        $User = User::get();
	
        return response(array(
                'error' => false,
                'User' =>$User->toArray(),
	
               ),200); 
      
    }
 public function show($id)
    {
        $User = User::find($id);
	
        return response(array(
                'error' => false,
                'User' =>$User,
		
               ),200);
    } 

public function update(Request $request, $id)
    {
        User::find($id)->update($request->all());
	
        return response(array(
                'error' => false,
                'message' =>'User updated successfully',
		
               ),200);
    }
public function updatestatus(Request $request, $id)
    {
    
       $User = User::find($id);
      
	$User->status=$request->input('status');
     
        $User->save();

        return response(array(
                'error' => false,
                'message' =>'status updated successfully',
		
               ),200);
    }
    /**
     * details api
     *
     * @return \Illuminate\Http\Response
     */
    public function details()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this->successStatus);
    }
}
