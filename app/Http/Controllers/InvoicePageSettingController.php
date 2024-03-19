<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InvoicePageSetting;

class InvoicePageSettingController extends Controller
{
    //
    public  function index(){
        $invoiceSettings=InvoicePageSetting::first();
        return view('signin',['invoiceSettings'=>$invoiceSettings]);
    }
    public function store(Request $request)

    {
        $request->merge([
            'auto_change_letter' => $request->has('auto_change_letter'),
            'activate_washing_cycle' => $request->has('activate_washing_cycle'),
        ]);
        $data = $request->validate([
            'invoice_start_letter' => 'required|string|max:1',
            'max_per_letter' => 'required|integer',
            'default_tax' => 'required|numeric',
            'default_service' => 'required|string',
            'auto_change_letter' => 'required|boolean',
            'activate_washing_cycle' => 'required|boolean',
            'normal_processing_time' => 'required|integer',
            'quick_processing_time' => 'required|integer',
        ]);

        InvoicePageSetting::updateOrCreate(
            ['id' => 1], // Assuming you only have one settings record with an ID of 1
            $data
        );
        return redirect()->back()->with('success', 'تم حفظ الإعدادات بنجاح');
    }
}
