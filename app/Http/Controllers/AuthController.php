<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Hash;
use Auth;
use App\Models\User;
use App\Helpers\Response;

class AuthController extends Controller
{
    public function signUp(Request $request){

         $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'no_telpon' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        try {
            $user = User::create([
                'nama' => $request->nama,
                'no_telpon' => $request->no_telpon,
                'password' => Hash::make($request->password)
            ]);

            $token = $user->createToken('auth_token')->plainTextToken;

            return Response::authResponse($user, 'Auth has been success', $token);
        } catch (\Throwable $th) {
           return Response::error(null, $th->getMessage());
        //    'Register failed'
        }

    }


    public function signIn(Request $request){
      
         $validator = Validator::make($request->all(), [
            'no_telpon' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails())
        {
            return response(['errors'=>$validator->errors()->all()], 422);
        }

       try {
         if (! Auth::attempt($request->only('no_telpon', 'password'))) {
            return Response::error(null, 'Unauthorised');
        }

        $user = User::where('no_telpon', $request->no_telpon)->firstOrFail();
        $token = $user->createToken('auth_token')->plainTextToken;
        $response = [
            'id' => $user->id,
            'nama' => $user->nama,
            'no_telpon' => $user->no_telepon,
        ];
        return Response::authResponse($response, 'Auth has been success', $token);
       } catch (\Throwable $th) {
            return Response::error(null, $th->getMessage());
       }
    }

    public function logout(){
        try {
             $data = Auth::user()->tokens()->delete();
           return Response::success('', 'Logouts successfull');
        } catch (QueryException $e) {
            return Response::error(null, 'Logout failed');
        }
    }
}
