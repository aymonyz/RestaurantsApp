<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
Use App\Models\PrintOption; 

class PrintOptionController extends Controller
{
public function store(Request $request)
{
    $validatedData = $request->validate([
        'invoiceStartLetter' => 'required|string',
        'maxPerLetter' => 'required|integer',
        'defaultTax' => 'required|string',
        'defaultService' => 'required|string',
        'autoChangeLetter' => 'nullable|boolean',
        'activateWashingCycle' => 'nullable|boolean',
        'normalProcessingTime' => 'required|integer',
        'quickProcessingTime' => 'required|integer',
    ]);

    PrintOption::create($validatedData);

    return back()->with('success', 'تم حفظ الإعدادات بنجاح!');
}

public function update(Request $request, $id)
{
    $printOption = PrintOption::findOrFail($id);
    // تحديث البيانات هنا
    return redirect()->route('some_route')->with('success', 'تم تحديث الإعدادات بنجاح!');
}

}
