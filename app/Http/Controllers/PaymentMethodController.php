<?php

namespace App\Http\Controllers;
use App\Models\PaymentMethod;

use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $paymentMethods=PaymentMethod::all();
        return view('settings.payment-methods.index',['paymentMethods'=>$paymentMethods]);
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
        $payment_appearance = $request->has('payment_appearance') ? true : false;

        $validatedData = $request->validate([
            'paymethod_arabic' => 'required|max:255',
            'paymethod_english' => 'required|max:255',
            'discount_percentage' => 'required|numeric',
            'total_price' => 'required|numeric',
        ]);
        $validatedData ['payment_appearance'] = $payment_appearance ;

    
        $paymentMethod = PaymentMethod::create($validatedData);
    
        return redirect()->route('payment_methods.index')->with('success', 'تم بنجاح إضافة طريقة الدفع');
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
        $paymentMethod = PaymentMethod::find($id);
    return view('settings.payment_methods.edit', ['paymentMethod' => $paymentMethod]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $paymentMethod = PaymentMethod::find($id);
        $payment_appearance = $request->has('payment_appearance') ? true : false;

        $updatedValidatedData = $request->validate([
            'paymethod_arabic' => 'required|max:255',
            'paymethod_english' => 'required|max:255',
            'discount_percentage' => 'required|numeric',
            'total_price' => 'required|numeric',
        ]);
        $updatedValidatedData ['payment_appearance'] = $payment_appearance ;
    $paymentMethod->update($updatedValidatedData);
    return redirect()->route('payment_methods.index')->with('success', 'تم تحديث البيانات بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $paymentMethod = PaymentMethod::find($id);
        $paymentMethod->delete();
        return redirect()->route('payment-methods.index')->with('success', 'تم حذف طريقة الدفع بنجاح');
    }
}
