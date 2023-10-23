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
        $pageTitle = 'New Business Add';
        return view('admin.business.create', compact('pageTitle'));
    }

    public function store(Request $request)
    {
        //validation is needed in this part
        //
        $business = new Business;
        if ($request->file())
        {
            $file = $request->file('image');
            $file_name = time().'_'.$request->image->getClientOriginalName();
            $file->move(public_path('/assets/images/business'), $file_name);
        }
        
        $business->name = $request->name;
        $business->title = $request->title;
        $business->details = $request->description;
        $business->currency = $request->currency;
        $business->quotes_unit_price = $request->rate;
        $business->image_path = '/assets/images/business/'.$file_name;
        $business->save();

        $notify[] = ['success', 'Business is created successfully'];
        return back()->withNotify($notify);
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
        return Business::changeStatus($id);
    }
}
