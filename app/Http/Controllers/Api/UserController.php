<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends Controller
{
//auth:
    public function __construct()
    {
        $this->middleware('api', ['except' => ['login']]);
    }
    public function login(Request $request){
        $rules=[
            'email' =>['required',Rule::exists('users','email')],
            'password' => ['required','min:6']
        ];
        $validator=Validator::make($request->except(['Api_password']),$rules);
        if($validator->fails()){
            return  response() -> json(['errors' => $validator->errors()]);
        }
        $data=$request->only(['email','password']);
        $token=Auth::guard('User_api')->attempt($data);
        return $this->respondWithToken($token);
    }

    public function logout(){
        $token=\request()->header('auth-token');
        if($token){
            JWTAuth::setToken($token)->invalidate();
            return response()->json(['msg'=>'U R logged out successfully']);
        }
        else{
            return response()->json(['msg'=>'error']);
        }
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('User_api')->factory()->getTTL() * 60
        ]);
    }

    public function register(Request $request){
        $rules=[
            'name' => ['required','min:5','max:100'],
            'email' => ['required','min:5','max:100','email',Rule::unique('users','email')],
            'password' => ['required','min:5','max:100'],
            'image' => ['required','image'],
        ];

        $data=Validator::make($request->all(),$rules);
        if($data->fails()){
            return response()->json(['Error' => $data->errors()]);
        }
        $user=$request->all();
        $user['password']=bcrypt($request->password);
        User::create($user);
        return $this->login($request);
    }
}
