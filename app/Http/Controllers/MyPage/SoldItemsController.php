<?php

namespace App\Http\Controllers\MyPage;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;

class SoldItemsController extends Controller
{
    public function showSoldItems()
    {
        $items = Item::orderBy('id', 'DESC')
            ->get();

        return view('mypage.sold_items')
            ->with('items', $items);
    }
}
