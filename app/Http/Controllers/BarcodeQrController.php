<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;

use App\Todo;
use DNS1D;
use DNS2D;

class BarcodeQrController extends Controller
{
    public function index()
    {
        $todo_data = Todo::all();
        $mencoba = "agus p";
        return view('barcode-qrcode.index', compact('todo_data', 'mencoba'));
    }

    public function getTodoByID($id, Request $request)
    {
        $data = Todo::where("id", $id)
            ->first();

        switch ($request->get('type')) {
            case 'barcode':
                $barcode = DNS1D::getBarcodeHTML( $data->todo_id_string, "C128", 4, 100, 'black', true);
                return $barcode;
                
                break;

            case 'qrcode':
                $qrcode = DNS2D::getBarcodeHTML( $data->todo_id_string, "QRCODE", 7, 7);
                return $qrcode;
                
                break;
        }

        

        // return response()->json([
        //     'error' => false,
        //     'data'  => $data,

        // ], 200);
    }
}
