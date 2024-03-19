<?php

namespace App\Http\Controllers;
use App\Models\DeliverySetting;

use Illuminate\Http\Request;

class DeliverySettingController extends Controller
{
    //
    public function store(Request $request)
    {
        $data = $request->validate([
            'enable_delivery_service' => 'required|boolean',
            'min_delivery_order' => 'required|numeric',
            'delivery_service_fee' => 'required|numeric',
        ]);

       
       DeliverySetting::updateOrCreate(
            ['id' => 1], // Assuming you only have one settings record with an ID of 1
            $data
        );

        return back()->with('success', 'Settings saved successfully.');
    }
}
