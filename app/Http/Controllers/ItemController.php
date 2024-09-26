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
    
}
