<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Validator;
use Auth;


class ItemsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::where('user_id',Auth::user()->id)->orderBy('created_at','desc')->paginate(5);
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
        $items->user_id = Auth::user()->id;
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
    public function edit($id){
        $items = Item::where('user_id',Auth::user()->id)->find($id);
        return view('items.edit')->with('item', $items);
    }
    public function update(Request $request,$id){
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'url' => 'required',
            'text' => 'required',
        ]);
        if($validator->fails()){
            return redirect('item/'.$id.'/edit')
                ->withInput()
                ->withErrors($validator);
        }
        $items = Item::where('user_id',Auth::user()->id)->find($id);
        $items->name = $request->name;
        $items->url = $request->url;
        $items->text = $request->text;
        $items->save();
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
}
