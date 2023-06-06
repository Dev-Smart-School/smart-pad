<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Helpers\Response;
use Validator;
class DataController extends Controller
{
    public function getDaftar(){
        try {
        $params = request('npwpd');
        $query = DB::table('t_daftar');

        if ($params) {
            $query->where('npwpd', $params);
        }
        $data = $query->get();

            return Response::success($data, 'Daftar pajak has been get successfull');
        } catch (\Throwable $th) {
            return Response::error(null, $th->getMessage());
        }
    }

    public function storeDaftar(Request $request){
         $validator = Validator::make($request->all(), [
            'npwpd' => 'required|unique:t_daftar',
            'nama_bu' => 'required',
            'alamat_bu' => 'required',
            'nama_wp' => 'required',
            'alamat_wp' => 'required',
            'no_telp' => 'required|numeric'
        ]);
        if ($validator->fails())
        {
            return response(['errors'=>$validator->errors()->all()], 422);
        }

        try {
           
          $data = DB::table('t_daftar')->insert([
                 'npwpd' => $request->npwpd,
                'nama_bu' => $request->nama_bu,
                'alamat_bu' => $request->alamat_bu,
                'nama_wp' => $request->nama_wp,
                'alamat_wp' => $request->alamat_wp,
                'no_telp' => $request->no_telp
            ]);

           return Response::success($data, 'Category has been create successfull');
        } catch (QueryException $e) {
            return Response::error(null, 'Category failed create');
        }
    }

    public function getUuData(){
        try {
            $data = DB::table('t_uudata')->get();
            return Response::success($data, 'Daftar pajak has been get successfull');
        } catch (\Throwable $th) {
            return Response::error(null, 'Daftar pajak failed create');
        }
    }

    public function get_uutap(){
        try {
            $params = request('npwpd');
            $query = DB::table('t_uutap');

            if ($params) {
                $query->where('npwpd_gab', $params);
            }
            
            $data = $query->get();
            return Response::success($data, 'Daftar pajak has been get successfull');
        } catch (\Throwable $th) {
            return Response::error(null, 'UUtap failed get');
        }
    }
}
