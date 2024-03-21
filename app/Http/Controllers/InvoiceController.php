<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\ItemPrice;
use App\Models\Group;
use App\Models\Customer;
use App\Models\PaymentMethod;
use App\Models\AdditionalService;
use App\Models\Branch_data;
use App\Models\Area; // Add this line
use App\Models\Branch; // Add this line
use App\Models\BranchData; // Add this line
use App\Models\branches; // Add this line
use App\Models\address; // Add this line
use App\Models\Cart; // Add this line
use App\Models\Invoice; // Add this line
use Carbon\Carbon;

use Illuminate\Support\Facades\Log;

class InvoiceController extends Controller
{
// تأكد من استخدام النموذج الصحيح

public function search(Request $request)
{
    

    $dateFrom = $request->input('date_from');
    $dateTo = $request->input('date_to');

    // تعديل تاريخ النهاية ليشمل نهاية اليوم
    $dateToEnd = Carbon::createFromFormat('Y-m-d', $dateTo)->endOfDay();
    $dateFrom = Carbon::createFromFormat('Y-m-d', $request->input('date_from'))->startOfDay()->toDateTimeString();
    $dateToEnd = Carbon::createFromFormat('Y-m-d', $request->input('date_to'))->endOfDay()->toDateTimeString();
    Log::info('Date From: ' . $dateFrom);
Log::info('Date To: ' . $dateToEnd);
    $invoices = Invoice::whereBetween('created_at', [$dateFrom, $dateToEnd])->get();
    DB::enableQueryLog();
    // الاستعلام هنا
    $invoices = Invoice::whereBetween('created_at', [$dateFrom, $dateToEnd])->get();
    $log = DB::getQueryLog();
    Log::info(print_r($log, true));
    
// هذا سيوقف التنفيذ ويعرض البيانات المُرجعة من الاستعلام
    
    return view('mail-read', compact('invoices'));
}

public function showPaidInvoicesReport(Request $request)
{
    $invoices = Invoice::where('status', 'paid')
                ->whereBetween('created_at', [$request->startDate, $request->endDate])
                ->get();

    // لا حاجة لتمرير startDate و endDate كمتغيرات منفصلة، يمكن الوصول إليهما مباشرة من الطلب في العرض
    return view('mail-settings', compact('invoices'));
}


    //
    public function show(){
        
        $items = DB::table('items_prices')
        ->join('items', 'items_prices.item_name', '=', 'items.arabicName')
        ->select('items_prices.id', 'items_prices.item_name', 'items_prices.price', 'items.unit', 'items.group')
        ->get();
        $items = DB::table('items_prices')
        ->join('items', 'items_prices.item_name', '=', 'items.arabicName')
        ->join('images', 'items.id', '=', 'images.item_id') // Join for image
        ->select('items_prices.id', 'items_prices.item_name', 'items_prices.price', 'items.unit', 'items.group', 'images.src') // Add 'images.path'
        ->get();
        $items = DB::table('items_prices')
    ->join('items', 'items_prices.item_name', '=', 'items.arabicName')
    ->joinSub(function ($query) {
        $query->select('item_id', DB::raw('MAX(created_at) as max_created_at'))
            ->from('images')
            ->groupBy('item_id');
    }, 'latest_images', function ($join) {
        $join->on('items.id', '=', 'latest_images.item_id');
    })
    ->join('images', function ($join) {
        $join->on('items.id', '=', 'images.item_id')
            ->on('images.created_at', '=', 'latest_images.max_created_at');
    })
    ->select('items_prices.id', 'items_prices.item_name', 'items_prices.price', 'items.unit', 'items.group', 'images.src')
    ->get();

        $groups=Group::where('IsActive', 1)->get();
        $customers=Customer::all();
        $paymentMethods=PaymentMethod::all();
        $additionalServices=AdditionalService::all();

        
        $branchData = DB::table('branch_data')->get();
        $branches = DB::table('branches')->get();
        $branch = DB::table('branches')->where('name', 'الخالدية')->get();
        $underExecutionInvoices = Cart::with(['customer', 'items'])->where('status', 'under-execution')->get();
        $readyForDeliveryInvoices = Cart::with(['customer', 'items'])->where('status', 'ready for delivery')->get();
        $totalUnderExecutionPriceSum  = Cart::where('status', 'under-execution')->sum('totalPrice');
$totalReadyForDeliveryPriceSum  = Cart::where('status', 'ready for delivery')->sum('totalPrice');

$underExecutionCartsCount = Cart::Where('status', 'under-execution')->count();
$readyForDeliveryCartsCount = Cart::Where('status', 'ready for delivery')->count();

      // dd($branch);

        return view('cards', [
            'items' => $items,
            'groups' => $groups,
            'customers' => $customers,
            'paymentMethods' => $paymentMethods,
            'additionalServices' => $additionalServices,
            'branchData' => $branchData,
            'underExecutionInvoices' => $underExecutionInvoices,
            'readyForDeliveryInvoices' => $readyForDeliveryInvoices,
            'totalUnderExecutionPriceSum' => $totalUnderExecutionPriceSum,
            'totalReadyForDeliveryPriceSum' => $totalReadyForDeliveryPriceSum,
            'underExecutionCartsCount' => $underExecutionCartsCount,
            'readyForDeliveryCartsCount' => $readyForDeliveryCartsCount
            

        ]);
    }
    public function store(){
        $data = request()->validate([
            'item_name' => 'required|string|not_in:""',
            'service_type' => 'required|string',
            'price' => 'required|numeric|between:0.01,9999999.99',
        ]);

        $urgent = request()->has('urgent') ? true : false;
        $data['urgent'] = $urgent;

        ItemPrice::create($data);
    }
    public function showCards()
    {
        $addresses = Address::all(); // Retrieve all addresses from the database
        $branches = Branch::all(); // Retrieve all branches from the database

        return view('cards', ['addresses' => $addresses, 'branches' => $branches]);
    }
    public function index()
    {
        $invoices = Cart::all(); // استرداد جميع الفواتير من قاعدة البيانات
        $branchData = DB::table('branch_data')->get();
        return view('mail-read', compact('invoices','branchData')); // تمريرها إلى الـ view
    }
    // public function search(Request $request)
    // {
    //     $query = Invoice::query();
        
    //     if ($request->filled('date_from')) {
    //         $query->whereDate('created_at', '>=', $request->date_from);
    //     }
    
    //     if ($request->filled('date_to')) {
    //         $query->whereDate('created_at', '<=', $request->date_to);
    //     }
    
    //     // تسجيل الاستعلام SQL في ملف السجلات
    //     \Log::info($query->toSql());
    //     // تسجيل البيانات المرتبطة بالاستعلام (Bindings) في ملف السجلات
    //     \Log::info($query->getBindings());
    
    //     $invoices = $query->get();
    
    //     return view('mail-read', compact('invoices'));
    // }
    
    
    

}
