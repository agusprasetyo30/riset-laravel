<?php

namespace App\Http\Controllers\Riset\Laravel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Todo;
use DNS1D;
use DNS2D;

class BarcodeQrController extends Controller
{
    /**
     * Untuk menampilkan halaman daftar data todo
     *
     * @return void
     */
    public function index()
    {
        $todo_data = Todo::all();
        return view('barcode-qrcode.index', compact('todo_data'));
    }

    /**
     * Fungsi untuk menampikan diagram barcode dan qrcode menggunakan AJAX
     *
     * @param [type] $id
     * @param Request $request
     * @return void
     */
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
    }
}
