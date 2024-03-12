<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\ItemPrice;
use App\Models\Group;
use Illuminate\Support\Facades\DB;


class ItemController extends Controller
{
    //
    public function store(Request $request){
       // dd($request->all());

$is_active = $request->has('is_active') ? true : false;

        $data = $request->validate([
                'arabicName' => 'required|string',
                'englishName' => 'required|string',
                'abbreviatedArabicname' => 'required|string',
                'abbreviatedEnglishname' => 'required|string',
                'itemNumber' => 'required|integer',
                'unit' => 'required|string|in:متر,قطعة', // Add more options if needed

                'group' => 'required|string'// Add more options if needed

        ]);
        $data ['is_active'] = $is_active;



    
        // Now $data contains the validated form input, and you can use it to save to the database or perform other actions.
    
        // Example: Save to the database
        Item::create($data);

       
        return back()->with('success', 'تم حفظ العنصر بنجاح!');

    
    }
    public function show(){
        // جلب جميع العناصر
        $items = Item::all();
    
        // جلب جميع الأسعار
        $itemsPrices = ItemPrice::all();
    
        // جلب العناصر التي تحتوي على قيمة معينة (مثلاً price = 1)
        // استبدل 'columnName' بالاسم الفعلي للعمود و'1' بالقيمة المطلوبة
        $filteredItems = Item::where('is_active', 1)->get();
        $groups=Group::where('IsActive', 1)->get();
    
        // إرجاع العرض مع البيانات الثلاثة
        return view('product-details', [
            'items' => $items,
            'itemsPrices' => $itemsPrices,
            'filteredItems' => $filteredItems,
            'groups'=>$groups
        ]);
    }
    
    public function yourMethod(Request $request){
        $filter = $request->input('filter');
    
        switch($filter) {
            case 'group':
                $items = Item::where('group', 'yourGroupValue')->get();
                break;
            // حالات أخرى لتصفية الأعمدة الأخرى
            default:
                $items = Item::all();
        }
        $groups=Group::where('IsActive', 1)->get();
        $item = DB::table('items_prices')
    ->join('items', 'items_prices.item_name', '=', 'items.arabicName')
    ->select('items_prices.item_name', 'items_prices.price', 'items.unit')
    ->where('items_prices.item_name', '=', 'known_item_name') // replace 'known_item_name' with an actual item name
    ->first();

dd($item);
  
       
        

        // قم بإرجاع العرض مع العناصر المصفاة
        return view('cards', ['product-details' => $items,'groups'=>$groups
    ]);
    }
    public function index(Request $request)
{
    $query = Item::query();

    if ($request->has('filter')) {
        switch ($request->filter) {
            case 'urgent':
                // تعديل الاستعلام لتصفية الحالات العاجلة
                break;
            case 'ongoing':
                // تعديل الاستعلام لتصفية الإجراءات
                break;
            case 'military':
                // تعديل الاستعلام لتصفية المقاتلين
                break;
            case 'civilian':
                // تعديل الاستعلام لتصفية كتب الوزارات
                break;
            default:
                // الاستعلام الافتراضي دون تصفية
                break;
        }
    }

    $items = $query->get();
    return view('items.cards', compact('items'));
}

    /**
     * حذف مورد محدد.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // العثور على العنصر بالمعرف وحذفه
        $item = Item::findOrFail($id);
        $item->delete();

        // إعادة توجيه المستخدم مع رسالة نجاح
        return redirect()->back()->with(['message' => 'تم حفظ العنصر بنجاح']);
    }
    public function update(Request $request, $id)
    {
        $item = Item::findOrFail($id);
    
        // تحقق من وجود الحقل 'is_active' وتحويله إلى قيمة صحيحة
        $is_active = $request->has('is_active') ? 1 : 0;
    
        // تجميع البيانات، بما في ذلك القيمة المُحولة لـ 'is_active'
        $data = $request->all();
        $data['is_active'] = $is_active;
    
        // تحديث البيانات في قاعدة البيانات
        $item->update($data);
    
        return redirect()->back()->with(['message' => 'تم حفظ العنصر بنجاح']);
        
    }
    
}
