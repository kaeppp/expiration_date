<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        
    public function store(Request $request, Item $item)
        {
            $input = $request["item"];
            $item->fill($input)->save();
            return redirect("/" . $item->id);
        }
}
