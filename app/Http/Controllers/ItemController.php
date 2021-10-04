<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Log;
use App\Events\UserLog;

class ItemController extends Controller
{
    public function index() {
        if(auth()->user()){
            $items = Item::get();
            return view('items.index', compact('items'));
        }else{
            return redirect('/');   
        }
    }

    public function create(){
        return view('items.create');
    }

    public function store(Request $request){
        $this->validate($request, $this->rules());

        $item = Item::create($request->all());

        $log_entry = 'Added an item "' . $item->name . '" with ID#' . $item->id;
        event(new UserLog($log_entry));

        return redirect('/items')->with('Message', 'New item has been added');   
    }

    public function edit(Item $item){
        return view('items.edit', ['item'=>$item]);
    }

    public function update(Request $request, Item $item){
        $this->validate($request, $this->rules());
        $item->update($request->all());

        $log_entry = 'Updated an item "' . $item->name . '" with ID#' . $item->id;
        event(new UserLog($log_entry));

        return redirect('/items')->with('Message', "Updated Successfully!");   
    }

    public function rules(){
        return [
            'name'              => 'required',
            'description'       => 'required',
            'price'             => 'required|numeric|between:0, 9999.99',
            'quantity'          => 'required|numeric'
        ];
    }

    public function delete(Request $request){
        $itemId = $request['item_id'];
        $item = Item::find($itemId);
        $item->delete();

        $log_entry = 'Deleted an item "' . $item->name . '" with ID#' . $item->id;
        event(new UserLog($log_entry));

        return  redirect('/items')->with('Message', "The item $item->name has been deleted successfully.");   
    }
}
