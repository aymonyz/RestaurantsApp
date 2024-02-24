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
use App\Models\branches; // Add this line
use App\Models\address; // Add this line
class InvoiceController extends Controller
{
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

        $groups=Group::where('IsActive', 1)->get();
        $customers=Customer::all();
        $paymentMethods=PaymentMethod::all();
        $additionalServices=AdditionalService::all();
        //dd($additionalServices);

        return view('cards', [
            'items' => $items,
            'groups' => $groups,
            'customers' => $customers,
            'paymentMethods' => $paymentMethods,
            'additionalServices' => $additionalServices,
            
            

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
}
