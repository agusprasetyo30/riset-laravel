<?php

namespace App\Http\Controllers;

use App\Exports\TodoReportCollection;
use App\Exports\TodoReportQuery;
use App\Exports\TodoReportView;
use App\Imports\TodoImports;
use App\Todo;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class BulkExcelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todo_data = Todo::all();

        return view('bulk-excel.index', compact('todo_data'));
    }

    // EXPORT

    /**
     * fungsi controller untuk mendownload file excel dengan menggunakan COLLECTION
     *
     * @return void
     */
    public function printExcelCollection()
    {
        return Excel::download(new TodoReportCollection, 'todos.xlsx');
    }

    /**
     * fungsi controller untuk mendownload file excel dengan menggunakan QUERY
     *
     * @return void
     */
    public function printExcelQuery()
    {
        // filter data yang di print hanya yang berstatus SHOW
        return Excel::download(new TodoReportQuery('SHOW'), 'todos.xlsx');
    }

    /**
     * fungsi controller untuk mendownload file excel dengan menggunakan VIEW tabel pada halaman
     *
     * @return void
     */
    public function printExcelView()
    {
        // filter data yang di print hanya yang berstatus SHOW
        // tidak menggunakan Excel, karena pada TodoReportView sudah menggunakan Exportable
        return (new TodoReportView)->download('todos.xlsx');
    }

    // IMPORT
    // TODO : untuk file dengan format .xlsx tidak bisa

    /**
     * Direct ke halaman import
     *
     * @return void
     */
    public function importPage()
    {
        return view('bulk-excel.import');
    }

    /**
     * fungsi untuk mengatur dan mengimport data excel
     *
     * @param Request $request
     * @return void
     */
    public function importFileExcel(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'file' => 'required|mimes:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,xls',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');

            Excel::import(new TodoImports, $file);
            return redirect()->back()->with(['success' => 'Upload success']);
        }

        return redirect()->back()->with(['error' => 'Please choose file before']);
    }
}
