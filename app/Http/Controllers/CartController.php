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
    {dd($request->all());
        $validated = $request->validate([
            // قواعد التحقق من الصحة
        ]);
    
        // إنشاء سجل السلة
        $cart = Cart::create([
            'customer_id' => $validated['customer_id'],
            // الحقول الأخرى
        ]);
    
        // إضافة عناصر السلة
        foreach ($validated['items'] as $item) {
            $cartItem = $cart->items()->create([
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                // الحقول الأخرى
            ]);
    
            // إضافة الإضافات لكل عنصر
            foreach ($item['additions'] as $addition) {
                $cartItem->additions()->create([
                    'addition_id' => $addition['addition_id'],
                    // الحقول الأخرى
                ]);
            }
        }
    
        // حساب الإجماليات وتحديث السلة
        // ...
    
        return response()->json(['message' => 'Cart saved successfully!'], 200);
    }
}    