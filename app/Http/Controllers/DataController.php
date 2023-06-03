<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Helpers\Response;
class DataController extends Controller
{
    public function getDaftar(){
        try {
            $data = DB::table('t_daftar')->get();
            return Response::success($data, 'Daftar pajak has been get successfull');
        } catch (\Throwable $th) {
            return Response::error(null, 'Daftar pajak failed create');
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
}
