<?php

// ResetController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\YourModel; // Replace YourModel with the actual model name
use App\Models\Branch; // Replace Branch with the actual model name
use App\Models\Branch_data;
use App\Models\Branches;

class ResetController extends Controller
{

    // Method to load the form view
    public function index()
    {
        $branches = Branch_data::all();
        $areas = Branch::all(); // Assuming Branch is the model for areas, replace it with the actual model name
        return view('reset', compact('branches', 'areas'));
    }
    

    // Method to handle form submission
    public function store(Request $request)
    {
     
      
        
        $request->validate([
            'branch' => 'required|string',
            'area' => 'required|string', // This ensures that the 'area' field is not empty
        ]);
        

        // Create a new instance of your model and fill it with the request data
     Branch::create([
    'address' => $request->branch, // Update to match the field name in your database
    'name' => $request->area,
]);


        // Optionally, you can redirect the user after successful submission
        return redirect()->back()->with('success', 'تم حفظ البيانات بنجاح!');
    }

    // Method to handle deletion of an area
    public function delete(Request $request)
    {
        $area = Branch::find($request->id);
        if ($area) {
            $area->delete();
            return redirect()->back()->with('success', 'تم حذف المنطقة بنجاح!');
        } else {
            return redirect()->back()->with('error', 'لم يتم العثور على المنطقة للحذف!');
        }
    }
    public function showAreasForm()
    {
        $areas = Branch::all(); // Assuming Branch is the model for areas, replace it with the actual model name
        return view('ad-castoar', compact('areas'));

    }
    public function someMethod()
    {
        $Branches = Branch::all(); // جلب جميع السجلات باستخدام Eloquent
        return view('ad-castoar', compact('Branches')); // تمرير البيانات إلى العرض
    }

    public function showBranchesPage()
    {
        $branches = branch::all(['address']); // احرص على استبدال Branch بالموديل الخاص بجدول branches
        return view('ad-castoar', compact('branches'));
    }
    
}

