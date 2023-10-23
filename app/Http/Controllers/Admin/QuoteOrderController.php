<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

use App\Models\Users;
use App\Models\UserQuote;
use App\Models\Business;
use App\Models\Goods;
use App\Models\GoodsImage;

class QuoteOrderController extends Controller
{
    public function index(Request $request)
    {
        return "Quote";
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
}
