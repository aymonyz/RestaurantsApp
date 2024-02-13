<?php

namespace App\Http\Controllers;

use App\Models\Branch_data;
use Illuminate\Http\Request;

class Branch_dataController extends Controller
{public function store(Request $request)
    {
        // التحقق من الصحة مع رسائل خطأ مخصصة
        $messages = [
            'name_ar.required' => 'حقل الاسم بالعربية مطلوب.',
            'name_ar.string' => 'حقل الاسم بالعربية يجب أن يكون نصياً.',
            'name_ar.max' => 'حقل الاسم بالعربية يجب ألا يتجاوز 150 حرفاً.',
            'name_en.required' => 'حقل الاسم بالإنجليزية مطلوب.',
            'name_en.string' => 'حقل الاسم بالإنجليزية يجب أن يكون نصياً.',
            'name_en.max' => 'حقل الاسم بالإنجليزية يجب ألا يتجاوز 150 حرفاً.',
            'address_ar.required' => 'حقل العنوان بالعربية مطلوب.',
            'address_ar.string' => 'حقل العنوان بالعربية يجب أن يكون نصياً.',
            'address_ar.max' => 'حقل العنوان بالعربية يجب ألا يتجاوز 150 حرفاً.',
            'address_en.required' => 'حقل العنوان بالإنجليزية مطلوب.',
            'address_en.string' => 'حقل العنوان بالإنجليزية يجب أن يكون نصياً.',
            'address_en.max' => 'حقل العنوان بالإنجليزية يجب ألا يتجاوز 150 حرفاً.',
            // يمكنك إضافة المزيد من رسائل الخطأ هنا
        ];
    
        $validatedData = $request->validate([
            'name_ar' => 'required|string|max:150',
            'name_en' => 'required|string|max:150',
            'address_ar' => 'required|string|max:150',
            'address_en' => 'required|string|max:150',
            'phone1' => 'nullable|string|max:50',
            'phone2' => 'nullable|string|max:50',
            'short_name' => 'nullable|string|max:20',
            // يمكنك إضافة المزيد من الحقول هنا
        ], $messages);
    
        $branch = new Branch_data();
        $branch->name_ar = $request->name_ar;
        $branch->name_en = $request->name_en;
        $branch->address_ar = $request->address_ar;
        $branch->address_en = $request->address_en;
        $branch->phone1 = $request->phone1;
        $branch->phone2 = $request->phone2;
        $branch->short_name = $request->short_name;
        // أضف باقي الحقول هنا بنفس الطريقة
        $branch->save();
    
        return redirect()->back()->with('success', 'تم حفظ البيانات بنجاح');
        
    }

public function index()
{
    $branches = Branch_data::all(); // تأكد من أن هذا السطر يسترجع البيانات بشكل صحيح
    return view('controlpanel', compact('branches')); // تأكد من أن 'interface1' هو اسم الواجهة الصحيح
}
public function edit($id)
{
    $branch = Branch_data::findOrFail($id); // استرجاع الفرع المطلوب للتعديل
    return view('eidet', compact('branch'));
}


public function update(Request $request, $id)
{
    $messages = [
        'name_ar.required' => 'حقل الاسم بالعربية مطلوب.',
        'name_ar.string' => 'حقل الاسم بالعربية يجب أن يكون نصياً.',
        'name_ar.max' => 'حقل الاسم بالعربية يجب ألا يتجاوز 150 حرفاً.',
        'name_en.required' => 'حقل الاسم بالإنجليزية مطلوب.',
        'name_en.string' => 'حقل الاسم بالإنجليزية يجب أن يكون نصياً.',
        'name_en.max' => 'حقل الاسم بالإنجليزية يجب ألا يتجاوز 150 حرفاً.',
        'address_ar.required' => 'حقل العنوان بالعربية مطلوب.',
        'address_ar.string' => 'حقل العنوان بالعربية يجب أن يكون نصياً.',
        'address_ar.max' => 'حقل العنوان بالعربية يجب ألا يتجاوز 150 حرفاً.',
        'address_en.required' => 'حقل العنوان بالإنجليزية مطلوب.',
        'address_en.string' => 'حقل العنوان بالإنجليزية يجب أن يكون نصياً.',
        'address_en.max' => 'حقل العنوان بالإنجليزية يجب ألا يتجاوز 150 حرفاً.',
        // يمكنك إضافة المزيد من رسائل الخطأ هنا
    ];

    $validatedData = $request->validate([
        'name_ar' => 'required|string|max:150',
        'name_en' => 'required|string|max:150',
        'address_ar' => 'required|string|max:150',
        'address_en' => 'required|string|max:150',
        'phone1' => 'nullable|string|max:50',
        'phone2' => 'nullable|string|max:50',
        'short_name' => 'nullable|string|max:20',
        // يمكنك إضافة المزيد من الحقول هنا

    ], $messages);
    $branch = Branch_data::find($id);
    $branch->name_ar = $request->name_ar;
    $branch->name_en = $request->name_en;
    $branch->address_ar = $request->address_ar;
    $branch->address_en = $request->address_en;
    $branch->phone1 = $request->phone1;
    $branch->phone2 = $request->phone2;
    $branch->short_name = $request->short_name;
    // تحديث باقي الحقول هنا

    $branch->save();

    return redirect()->route('controlpanel.index')->with('success', 'تم تحديث البيانات بنجاح');
}
public function destroy($id)
{
    $branch = Branch_data::find($id);
    $branch->delete();
    return redirect()->route('controlpanel.index')->with('success', 'تم حذف الفرع بنجاح');
}

}


