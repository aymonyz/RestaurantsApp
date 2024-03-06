<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OtherInvoiceData;

class OtherInvoiceDataController extends Controller
{
    //
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'delivery_date' => 'nullable|date',
        'invoice_note' => 'nullable|string',
        'bottom_note1' => 'nullable|string',
        'bottom_note2' => 'nullable|string',
    ]);

    OtherInvoiceData::create($validatedData);

    return redirect()->back()->with('success', 'Data saved successfully');
}
}
