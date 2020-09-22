<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Users;
use function PHPUnit\Framework\isEmpty;

class UserController extends Controller
{
    public function __construct()
    {

    }

    public function authenticate(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',

            'password'=> 'required'
        ]);

//        return response()->json(['1' => $request->input('email'), '2' => $request->input('password') ]);



//        $user = Users::where('email', $request->input('email'))->first();
        $user = Users::where('email', $request->input('email'))->first();
        $email = $request->input('email');
        $thisUser = Users::where('email',$email)->first();

        if(empty($thisUser) == true)
        {
            return response()->json(['message' => 'User not found'], 404);
        }
        // REMAKE
        $hasher = app()->make('hash');
        $inputPass = $hasher->make($request->input('password'));
//        return response()->json(['status' => 'success', 'api_key' => $inputPass]);
//        if($inputPass == $user->password)
        if(Hash::check($request->input('password'),$user->password))
        {

            $apikey = base64_encode(Str::random(40));
            Users::where('email', $request->input('email'))->update(['api_key' => "$apikey"]);

            return response()->json(['status' => 'success', 'api_key' => $apikey]);
        }
        else{
            return response()->json(['status' => 'fail'], 401);
        }

//        return response()->json(['email' => $thisUser], 401);
//        return response()->json(['input_pass' => $request->input('password') , 'database_pass' => $user->password], 200);

//        if(Hash::check($request->input('password'), $user->password))
        if($request->input('password') == $user->password)
        {
            $apikey = base64_encode(Str::random(40));
            Users::where('email', $request->input('email'))->update(['api_key' => "$apikey"]);

            return response()->json(['status' => 'success', 'api_key' => $apikey]);


        }
        else{
            return response()->json(['status' => 'fail'], 401);
        }
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password'=> 'required'
        ]);

        $apikey = base64_encode(Str::random(40));


        $hasher = app()->make('hash');


        $name = $request->input('name');
        $email = $request->input('email');
        $password = $hasher->make($request->input('password'));
        $user = Users::create([
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'api_key' => $apikey
        ]);
        $user->save();

        return response()->json(['status' => 'success', 'created user' => $email], 200);




    }
}
