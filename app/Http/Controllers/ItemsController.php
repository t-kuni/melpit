<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Payjp\Charge;
use Payjp\Error\InvalidRequest;
use Payjp\Payjp;

class ItemsController extends Controller
{
    public function showItems(Request $request)
    {
        $query = Item::query();

        // カテゴリで絞り込み
        if ($request->filled('category')) {
            list($categoryType, $categoryID) = explode(':', $request->input('category'));

            if ($categoryType === 'primary') {
                $query->whereHas('secondaryCategory.primaryCategory', function ($query) use ($categoryID) {
                    $query->where('id', $categoryID);
                });
            } else if ($categoryType === 'secondary') {
                $query->whereHas('secondaryCategory', function ($query) use ($categoryID) {
                    $query->where('id', $categoryID);
                });
            }
        }

        // キーワードで絞り込み
        if ($request->filled('keyword')) {
            $keyword = '%' . $this->escape($request->input('keyword')) . '%';
            $query->where(function ($query) use ($keyword) {
                $query->where('name', 'LIKE', $keyword);
                $query->orWhere('description', 'LIKE', $keyword);
            });
        }

        $items = $query->orderBy('id', 'DESC')->get();

        return view('items.items')
            ->with('items', $items);
    }

    private function escape(string $value, string $char = '\\')
    {
        return str_replace(
            [$char, '%', '_'],
            [$char . $char, $char . '%', $char . '_'],
            $value
        );
    }

    public function showItemDetail(Item $item)
    {
        return view('items.item_detail')
            ->with('item', $item);
    }

    public function showBuyItemForm(Item $item)
    {
        if (!$item->isStateSelling) {
            abort(404);
        }

        return view('items.item_buy_form')
            ->with('item', $item);
    }

    public function buyItem(Request $request, Item $item)
    {
        $user = Auth::user();

        if (!$item->isStateSelling) {
            abort(404);
        }

        $token = $request->input('card-token');

        Payjp::setApiKey(config('payjp.secret_key'));
        try {
            Charge::create([
                'card'     => $token,
                'amount'   => $item->price,
                'currency' => 'jpy'
            ]);
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('type', 'danger')
                ->with('message', '購入処理が失敗しました。');
        }

        $item->state     = Item::STATE_BOUGHT;
        $item->bought_at = Carbon::now();
        $item->buyer_id  = $user->id;
        $item->save();

        return redirect()->route('item', [$item->id])
            ->with('message', '商品を購入しました。');
    }
}
