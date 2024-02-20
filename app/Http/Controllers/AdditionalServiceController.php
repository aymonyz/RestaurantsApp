<?php

namespace App\Http\Controllers;

use App\Models\AdditionalService;
use Illuminate\Http\Request;

class AdditionalServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $additionalServices = AdditionalService::all();
        return view('services_and_items.additional_services.index',['additionalServices'=>$additionalServices]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'additional_service_name' => 'required|string',
            'additional_service_price' => 'required|numeric|between:0,999999.99',

        ]);
        AdditionalService::create($data);
        return redirect()->route('additional_services.index')->with('success', 'تم بنجاح إضافة الخدمة الإضافية');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $additionalService=AdditionalService::find($id);
        return view('services_and_items.additional_services.edit', ['additionalService' => $additionalService]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $data = $request->validate([
            'additional_service_name' => 'required|string',
            'additional_service_price' => 'required|numeric|between:0,999999.99',

        ]);
        $additionalService=AdditionalService::find($id);
        $additionalService->update($data);
        return redirect()->route('additional_services.index')->with('success', 'تم بنجاح تحديث الخدمة الإضافية');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $additionalService=AdditionalService::find($id);
        $additionalService->delete();
        return redirect()->route('additional_services.index')->with('success', 'تم بنجاح حذف الخدمة الإضافية');
        
    }
}
