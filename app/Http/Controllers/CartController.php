<?php
namespace App\Http\Controllers;
use App\Models\Cart;

use Illuminate\Support\Facades\Log;


use Illuminate\Http\Request;
use App\Models\CartItem;

use App\Models\ItemPrice;



class CartController extends Controller
{
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

        $data = $request->all();

        // Handle the boolean values for 'urgent' and 'delivery'
        $data['urgent'] = $request->has('urgent');
        $data['delivery'] = $request->has('delivery');

        // Set default values for 'discount' and 'customerId'
        $data['discount'] = $data['discount'] ?? 0;
        $data['customerId'] = $data['customerId'] ?? null;

        // Create a new cart instance
        $cart = Cart::create($data);

        // Iterate over each item and create it with validation for NaN values
        foreach ($request->items as $item) {
            $cart->items()->create([
                'name' => $item['name'],
                'price' => $item['price'],
                'width' => $this->validateDimension($item['width']),
                'height' => $this->validateDimension($item['height']),
                'numberOfMeters' => $this->validateDimension($item['numberOfMeters']),
                'quantity' => $item['quantity'],
            ]);
        }

        return redirect()->back()->with(['message' => 'تم حفظ الفاتورة بنجاح']);
    }

    /**
     * Validate the dimension value and convert NaN to null.
     *
     * @param mixed $value The value to validate.
     * @return float|null The validated float value, or null if it's not valid.
     */
    protected function validateDimension($value)
    {
        return is_numeric($value) ? (float)$value : null;

    }
}    