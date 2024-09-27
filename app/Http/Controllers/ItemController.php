<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Models\Item;

class ItemController extends Controller
{
    public function index(Item $item)
        {
            return view('items.index')->with(['items'=>$item->getPaginateByLimit()]);
        }
        
    public function create()
        {
            return view('items.create');
        }
        
    public function store(ItemRequest $request, Item $item)
        {
            $input = $request["item"];
            $item->fill($input)->save();
            
            return redirect("/");
        }
}
