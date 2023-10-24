<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Transaction;
use App\Models\UserQuote;
use App\Models\Good;

class GoodsManageController extends Controller
{
    public function index(Request $request)
    {
        $pageTitle = "Goods List For Businesses";
        $goodsList = Good::orderBy('name')->get();

        return view('admin.goods.index', compact('pageTitle', 'goodsList'));
    }

    public function create(Request $request)
    {
        $pageTitle = 'New Goods Create';
        return view('admin.goods.create', compact('pageTitle'));
    }

    public function edit(Request $request) 
    {
        return;
    }

    public function delete(Request $request)
    {
        return;
    }

    public function changeStatus(Request $request)
    {
        $id = $request->id;
        return Good::changeStatus($id);
    }

    public function getBusinessList(Request $request)
    {
        return;
    }
}
