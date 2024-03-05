<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;
use App\Models\CartItem;

use App\Models\ItemPrice;



class CartController extends Controller
{
    //
    public function store(Request $request)
    {
        $cart = new Cart;
        $cart->discount = $request->input('discount');
        $cart->discountType = $request->input('discountType');
        $cart->urgent = $request->input('urgent');
        $cart->delivery = $request->input('delivery');
        $cart->deliveryCost = $request->input('deliveryCost');
        $cart->paymentMethod = $request->input('paymentMethod');
        // other fields
        $cart->save();
    }
}    