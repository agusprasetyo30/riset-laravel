<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;

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
                $config = [
                    'table' => 'todos',
                    'field' => 'todo_id_string',
                    'length' => 6,
                    'prefix' => 'ID-'
                ];
                
                // now use it
                $id_generate = IdGenerator::generate($config);

                return view('dummy-todo.add', compact('id_generate'));
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
        // 'todo', 'todo_id_string' : sesuai dengan Model TODO yang fillable
        Todo::create($request->only(['todo', 'todo_id_string']));
        
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
            'todo'          => $request->get('todo'),
            'status'        => $request->get('status'),
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
