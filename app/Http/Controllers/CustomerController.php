<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CustomerController extends Controller
{
    public function store(Request $request)
    {
        // Validating the request data
        $data = $request->validate([
            'name' => 'nullable|max:255', // Assuming 'name' is the field name for the customer's name
            'country' => 'nullable', // Assuming 'country' is the field name for the customer's country
            'branch' => 'nullable', // Assuming 'branch' is the field name for the branch
            'mobileNumber' => 'nullable|digits:9', // Validating first mobile number
            'mobileNumber2' => 'nullable|digits:9', // Validating second mobile number, if provided
            'apartmentNumber' => 'nullable|max:255', // Validating apartment number
            'buildingNumber' => 'nullable|max:255', // Validating building number
            'address' => 'nullable|max:255', // Validating address
            'priceList' => 'nullable', // Assuming 'priceList' is the field name for the price list
            'discount' => 'nullable|numeric|between:0,100', // Validating discount, assuming a percentage
          //  'freeze' => 'nullable|boolean', // Validating freeze status
            'email' => 'nullable|email|max:255', // Validating email
            'taxNumber' => 'nullable|max:255', // Validating tax number
            'otherData' => 'nullable|max:255', // Validating other data, if provided
        ]);

        ;

        // Creating a new customer record
        $customer = Customer::create($data);

        // Redirecting back with a success message
        return back()->with('success', 'تم حفظ العميل بنجاح');
    }

    public function index() {
        $customers = Customer::all(); // أو استخدم Customer::select('name')->get(); لجلب أسماء العملاء فقط
        return response()->json($customers);
    }
    public function search(Request $request) {
        $search = $request->get('term');
        
        // تحديث الاستعلام ليشمل الحقول المطلوبة
        $result = DB::table('customers')
                    ->where('name', 'LIKE', '%'. $search. '%')
                    ->select('id', 'name', 'mobileNumber', 'address') // على سبيل المثال
                    ->get();
    
        return response()->json($result);
    }
    

}


