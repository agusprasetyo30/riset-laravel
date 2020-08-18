<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;

use App\Todo;

class BarcodeQrController extends Controller
{
    public function index()
    {
        $todo_data = Todo::all();

        return view('barcode-qrcode.index', compact('todo_data'));
    }
}
