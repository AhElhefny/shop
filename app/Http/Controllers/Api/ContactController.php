<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ContactController extends Controller
{
    public function contact(){
//        $token=\request()->header('auth-token');
//        if($token) {
            $rules = [
                'name' => ['required', 'min:7', 'max:255'],
                'email' => ['required', 'min:7', 'max:255', Rule::unique('contact_us', 'email')],
                'subject' => ['required', 'min:7', 'max:255'],
                'message' => ['required', 'min:7'],
            ];
            $data = Validator::make(\request()->except(['_token', 'Api_password']), $rules);
            if ($data->fails()) {
                return response()->json([
                    'errors' => $data->errors()
                ]);
            } else {
                ContactUs::create(request()->except(['_token', 'Api_password']));

                return response()->json([
                    'status' => true,
                    'ErrNum' => '',
                    'msg' => 'OK',

                ]);
            }
//        }else{
//            return response()->json(['error Msg'=>'token Not Found']);
//        }
    }
}
