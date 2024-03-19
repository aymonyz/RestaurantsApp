<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expenses; 
use App\Models\Establishment; // تغيير النموذج المستخدم إلى Establishment

class CostController extends Controller
{
    public function store(Request $request)
    {
        
        $request->validate([
            'Establishmentneam' => 'required|max:150',
            'Establishmentdecebshan' => 'required|max:150',
            'name' => 'required',
        ]);
        
        Establishment::create([
            'Establishmentneam' => $request->Establishmentneam,
            'Establishmentdecebshan' => $request->Establishmentdecebshan,
            'name' => $request->name, // Save the name of the expense group directly
        ]);
        
        return redirect()->back()->with('success', 'تم إضافة المصروف بنجاح');
        
        
    }
    
    // باقي الوظائف مثل index و edit و update و destroy تبقى كما هي


    public function index()
    {
        $expenses = Expenses::all(); // Assuming Expenses model contains expenses groups
        $establishments = Establishment::all();
        dd($establishments); // Check if establishments are being fetched correctly
        return view('alerts', compact('expenses', 'establishments'));
    }

    public function edit($id)
    {
        $establishment = Establishment::find($id);
        if (!$establishment) {
            return redirect()->back()->with('error', 'المصروف غير موجود');
        }
        $expenses = Expenses::all(); // Assuming Expenses model contains expenses groups
        return view('Establishmentneam-edit', compact('establishment', 'expenses'));
    }
    
    
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'Establishmentneam' => 'required|max:150',
            'Establishmentdecebshan' => 'required|max:150',
            'name' => 'required',
        ]);
        $expense = Establishment::find($id);
        if (!$expense) {
            return redirect()->back()->with('error', 'المصروف غير موجود');
        }
        $expense->update([
            'Establishmentneam' => $request->Establishmentneam,
            'Establishmentdecebshan' => $request->Establishmentdecebshan,
            'name' => $request->name,
        ]);
        return redirect()->back()->with('success', 'تم تعديل المصروف بنجاح');
    }
    
    public function destroy($id)
    {
        $establishment = Establishment::find($id);
        if (!$establishment) {
            return redirect()->back()->with('error', 'المصروف غير موجود');
        }
    
        $establishment->delete();
        return redirect()->back()->with('success', 'تم حذف المصروف بنجاح');
    }
    
}
