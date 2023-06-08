<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\AdminPad;
use App\Helpers\Response;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

// use Illuminate\Support\Facades\Auth as FacadesAuth;

class AuthController extends Controller
{
    public function signUp(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'no_telpon' => 'required|string|max:255|unique:admin_pads',
            'password' => 'required|string|min:8'
        ]);

        if ($validator->fails()) {
            // return response()->json($validator->errors());
            return Response::validation(null, $validator->errors());
            //  $errors = $validator->errors();


        }

        try {
            $user = AdminPad::create([
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


    public function signIn(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'no_telpon' => 'required',
            'password' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            return Response::validation(null, $validator->errors());
        }

        try {
            if (!Auth::guard('adminpad')->attempt($request->only('no_telpon', 'password'))) {
                return Response::error(null, 'Unauthorised');
            }

            $user = AdminPad::where('no_telpon', $request->no_telpon)->firstOrFail();
            $token = $user->createToken('auth_token')->plainTextToken;
            $response = [
                'id' => $user->id,
                'nama' => $user->nama,
                'no_telpon' => $user->no_telpon,
            ];
            return Response::authResponse($response, 'Auth has been success', $token);
        } catch (\Throwable $th) {
            return Response::error(null, $th->getMessage());
        }
    }

    public function logout()
    {
        try {
            if (auth()->guard('adminpad')->check()) {
                $user = auth()->guard('adminpad')->user();
                $user->tokens()->delete();
                return Response::success('', 'Logout successfull');
            } else {
                return Response::error(null, 'User not authenticated');
            }
        } catch (QueryException $e) {
            return Response::error(null, 'Logout failed');
        }
    }
}
