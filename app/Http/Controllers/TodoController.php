<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        switch ($request->get('type')) {
            case 'add':
                return view('dummy-todo.add');
                break;

            case 'edit':
                $todo_edit = Todo::findOrFail($request->get('id'));

                return view('dummy-todo.edit', compact('todo_edit'));
                break;

            case null:
                $todo_data = Todo::all();

                return view('dummy-todo.index', compact('todo_data'));
                break;
            
            default:
                abort(404);
                break;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Todo::create($request->only('todo'));
        
        return redirect()->route('dummy.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Todo::where('id', '=', $id)->update([
            'todo' => $request->get('todo'),
            'status' => $request->get('status')
        ]);
        
        return redirect()->route('dummy.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $todo_data = Todo::findOrFail($request->get('id'));

        $todo_data->delete();

        return redirect()->route('dummy.index');
    }
}
