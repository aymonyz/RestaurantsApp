<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class CustomerController extends Controller
{
    // إضافة عميل جديد مع التحقق من عدم تكرار أرقام الهواتف
    public function store(Request $request)
    {
        // التحقق من وجود رقم الهاتف
        $existingCustomer = Customer::where('mobileNumber', $request->mobileNumber)
            ->orWhere('mobileNumber2', $request->mobileNumber)
            ->first();

        if ($existingCustomer) {
            // إذا وُجد العميل، أعد إلى الصفحة مع رسالة خطأ
            return back()->withErrors(['mobileNumber' => 'العميل موجود بالفعل.']);
        }

        // التحقق من صحة بيانات الطلب
        $data = $request->validate([
            'branch' => 'nullable', 
            'country' => 'nullable',
            'mobileNumber' => 'required|digits:9|unique:customers,mobileNumber', 
            'mobileNumber2' => 'nullable|digits:9|unique:customers,mobileNumber2', 
            'name' => 'nullable|max:255', 
            'apartmentNumber' => 'nullable|max:255',
            'buildingNumber' => 'nullable|max:255', 
            'address' => 'nullable|max:255', 
            'discount' => 'nullable|numeric|between:0,100',
            'email' => 'nullable|email|max:255', 
            'taxNumber' => 'nullable|max:255', 
            'otherData' => 'nullable|max:255', 
            'priceList' => 'nullable',
        ]);

        // محاولة إنشاء سجل العميل
        try {
            Customer::create($data);
            return back()->with('success', 'تم حفظ العميل بنجاح');
        } catch (QueryException $e) {
            // التعامل مع الاستثناءات
            return back()->withErrors(['error' => 'حدث خطأ أثناء حفظ البيانات.']);
        }
    }

    // عرض جميع العملاء
    public function index() {
        $customers = Customer::all();
        return response()->json($customers);
    }

    // البحث عن عميل
    public function search(Request $request) {
        $searchTerm = $request->get('term');
        $result = Customer::where('name', 'LIKE', '%' . $searchTerm . '%')
                          ->orWhere('mobileNumber', 'LIKE', '%' . $searchTerm . '%')
                          ->orWhere('address', 'LIKE', '%' . $searchTerm . '%')
                          ->get();
        
        return response()->json($result);
    }
}
