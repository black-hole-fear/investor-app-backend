<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Transaction;
use App\Models\UserQuote;

class GoodsManageController extends Controller
{
    public function index(Request $request)
    {
        return "Goods";
    }

    public function create(Request $request)
    {
        return;
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
        return;
    }
}
