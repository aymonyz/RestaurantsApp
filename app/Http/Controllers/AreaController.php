<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;


class AreaController extends Controller
{
    //
    public function index(){
        return view('Areas');
    }
    //
    public function store(Request $request)
{
    $data = $request->validate([
        'area' => 'required|string|max:255',
    ]);

    // Process the form data, e.g., save it to the database
    Area::create($data);

    return redirect()->route('area.index'); // Redirect to a "Thank You" page
}
}
