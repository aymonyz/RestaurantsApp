<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ItemPrice;

class ItemPriceController extends Controller
{
    //
    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'item_name' => 'required|string|not_in:""',
                'service_type' => 'required|string',
                'price' => 'required|numeric|between:0.01,9999999.99',
            ]);
    
            $urgent = $request->has('urgent') ? true : false;
            $data['urgent'] = $urgent;
    
            ItemPrice::create($data);
            return redirect()->back()->with(['message' => 'تم حفظ السعر بنجاح']);
    
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Dump validation errors for debugging
            dd($e->errors());
        }
    }  //delete
    
    public function destroy($id)
    {
        ItemPrice::destroy($id);
    }

}


