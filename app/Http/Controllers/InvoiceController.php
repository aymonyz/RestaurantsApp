<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ItemPrice;
use App\Models\Group;

class InvoiceController extends Controller
{
    //
    public function show(){
        $items=ItemPrice::all();
        $groups=Group::where('IsActive', 1)->get();

        return view('cards',['items'=>$items,'groups'=>$groups]);
    }

}
