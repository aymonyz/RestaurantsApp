<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expenses; // استخدم النموذج الصحيح هنا

class ExpensesController extends Controller
{
    public function store(Request $request)
    {
       
        // التحقق من صحة البيانات
        $validatedData = $request->validate([
            'nameMsrof' => 'required|max:150',
            'desMsrof' => 'required|max:150',
        ]);
    
        // إنشاء نفقة جديدة
        $expense = new Expenses(); // استخدم النموذج الصحيح هنا
        $expense->nameMsrof = $request->nameMsrof; // تعديل هنا
        $expense->desMsrof = $request->desMsrof; // تعديل هنا
        $expense->save();
        
    
        // إعادة توجيه مع رسالة نجاح
        return redirect()->back()->with('success', 'تم إضافة النفقة بنجاح.');
    }
    
    public function index()
    {
        
        $expenses = Expenses::all(); // استرجاع جميع النفقات
        //dd($expenses); // اختبار (احذف هذا السطر بعد الاختبار
        return view('avatar', ['expenses'=>$expenses]); // تمرير البيانات إلى الواجهة
    }
    
    
    public function destroy($id)
    {
        $expense = Expenses::findOrFail($id);
        $expense->delete();
        return redirect()->route('Expenses.index')->with('success', 'تم حذف النفقة بنجاح.');
    }

    public function edit($id)
    {
        $expense = Expenses::findOrFail($id);
        return view('edit', compact('expense'));
    }

    public function update(Request $request, $id)
    {
        $messages = [
            'nameMsrof.required' => 'حقل الاسم مطلوب.',
            'nameMsrof.max' => 'حقل الاسم يجب ألا يتجاوز 150 حرفاً.',
            'desMsrof.required' => 'حقل الوصف مطلوب.',
            'desMsrof.max' => 'حقل الوصف يجب ألا يتجاوز 150 حرفاً.',
        ];
        
        $request->validate([
            'nameMsrof' => 'required|max:150',
            'desMsrof' => 'required|max:150',
        ]
    );

        $expense = Expenses::findOrFail($id);
        $expense->update([
            'nameMsrof' => $request->nameMsrof,
            'desMsrof' => $request->desMsrof,
        ]);

        return redirect()->route('Expenses.index')->with('success', 'تم تحديث النفقة بنجاح.');
    }

}
