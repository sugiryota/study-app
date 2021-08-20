<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Validator;


class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::orderBy('created_at','desc')->get();
        return view('items.index',compact('items'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'url' => 'required',
            'text' => 'required',
        ]);
        if($validator->fails()){
            return redirect('item/create')
                ->withInput()
                ->withErrors($validator);
        }
        $items = new Item;
        $items->name = $request->name;
        $items->url = $request->url;
        $items->text = $request->text;
        $items->save();
        return redirect('/');
    }
    public function show($id) {
        $item = Item::findOrFail($id);
        return view('items.show')->with('item', $item);
    }
    public function destroy($id){
        $item = Item::findOrFail($id);
        $item->delete();
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
}
