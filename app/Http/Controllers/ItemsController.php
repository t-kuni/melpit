<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    public function showItems() {
        $items = Item::orderBy('id', 'DESC')->get();

        return view('items.items')
            ->with('items', $items);
    }
}
