<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OtherInvoiceData;

class OtherInvoiceDataController extends Controller
{
    //
    public function save(Request $request)
{
    $validatedData = $request->validate([
        'deliveryDate' => 'nullable|date',
        'invoiceNote' => 'nullable|string',
        'bottomNote1' => 'nullable|string',
        'bottomNote2' => 'nullable|string',
    ]);

    OtherInvoiceData::updateOrCreate([], $validatedData);
    return response()->json(['success' => 'تم حفظ بيانات الفاتورة الأخرى بنجاح']);


}
public function get()
{
    $data = OtherInvoiceData::first();
    return response()->json($data);
}
}