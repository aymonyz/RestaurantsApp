<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branch;


class BranchController extends Controller
{
    public function index(){
        return view('Branches');
    }
    //
    public function store(Request $request)
{
    $data = $request->validate([
        'branch' => 'required|string|max:255',
    ]);

    // Process the form data, e.g., save it to the database
    Branch::create($data);

    return redirect()->route('branch.index'); // Redirect to a "Thank You" page
}
}
