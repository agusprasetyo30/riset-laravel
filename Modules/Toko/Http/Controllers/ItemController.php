<?php

namespace Modules\Toko\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Toko\Entities\Category;
use Modules\Toko\Entities\Item;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $items = Item::all();
        
        return view('toko::item.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource. 
     * @return Renderable
     */
    public function create()
    {
        return view('toko::item.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        Item::create([
            'name'       => $request->get('name'),
            'price'      => $request->get('price'),
            'created_by' => \Auth::user()->id
        ]);

        return redirect()->route('test.toko.item.index');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $item = Item::find($id);

        return view('toko::item.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $item = Item::find($id);

        $item->update([
            'name'  => $request->get('name'),
            'price' => $request->get('price')
        ]);

        return redirect()->route('test.toko.item.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }

    /*** Category ***/

    /**
     * Undocumented function
     *
     * @param [type] $id
     * @return void
     */
    public function addItemCategory($id)
    {
        $item = Item::find($id);

        $categories = Category::all();

        return view('toko::item.add-category', compact('categories', 'item'));
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @param [type] $id
     * @return void
     */
    public function saveItemCategory(Request $request, $id)
    {
        Item::find($id)->category()->attach([
            // Ini sebagai parameter input M-M polymorphic adalah 'name' karena pada model category yang fillable adalah 'name'
            // Dan nantinya diisi dengan ID Category yang nantinya akan dimasukan ke dalam relasi
            'name'  => $request->get('id_category'),
        ]);

        return redirect()->route('test.toko.item.index');
    }

    /**
     * Undocumented function
     *
     * @param [type] $id_item
     * @param [type] $id_category
     * @return void
     */
    public function deleteItemCategory($id_item, $id_category)
    {
        Item::find($id_item)
            ->category()
            ->detach($id_category);

        return redirect()->route('test.toko.item.index');
    }
}
