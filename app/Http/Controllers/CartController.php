<?php

namespace App\Http\Controllers;
use App\Models\Cart;



use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function store(Request $request)
    {
        $data = request()->all();
        //dd('hello');

        $urgent = request()->has('urgent') ? true : false;
        $delivery = request()->has('delivery') ? true : false;

        $data['urgent'] = $urgent;
        $data['delivery'] = $delivery;

        $data['discount'] = isset($data['discount']) ? $data['discount'] : 0;
        $data['customerId'] = isset($data['customerId']) ? $data['customerId'] : Null;

        Cart::create($data);
        return redirect()->back()->with(['message' => 'تم حفظ الفاتورة بنجاح']);


    


    }
}
