<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

use App\Models\Business;
use App\Models\Good;
use App\Models\GoodsImage;
use App\Models\WithdrawMethod;

class BusinessManageController extends Controller
{
    public function getBusinessList(Request $request)
    {
        $pageTitle = "Business Advertisement For Investors";
        $businesses = Business::orderBy('name')->orderBy('id')->get();
        return view('admin.business.index', compact('pageTitle', 'businesses'));
    } 

    public function create(Request $request)
    {
        return;
    }

    public function edit(Request $request) 
    {
        return;
    }

    public function update(Request $request)
    {
        return;
    }

    public function delete(Request $request)
    {
        return;
    }

    public function changeStatus($id)
    {
        Business::changeStatus($id);
    }
}
