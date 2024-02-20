<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;

class GroupsController extends Controller
{
    public function index()
    {
        $groups = Group::all();
        return view('/products', compact('groups'));
    }

    public function store(Request $request)
    {
        $is_active = $request->has('is_active') ? true : false;

        //dd($request->all());
        $validatedData = $request->validate([
            'GroupNameArabic' => 'required|string|max:255',
            'GroupNameEnglish' => 'required|string|max:255',
            'Ranking' => 'required|integer',
        ]);
        $validatedData ['is_active'] = $is_active;


         Group::create($validatedData);
       

        return redirect()->route('groups.index');
    }

    public function edit($id)
    {
        $group = Group::findOrFail($id);
        return view('groups.edit', compact('group'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'GroupNameArabic' => 'required|string|max:255',
            'GroupNameEnglish' => 'required|string|max:255',
            'Ranking' => 'required|integer',
            'IsActive' => 'nullable|boolean',
        ]);

        $group = Group::findOrFail($id);
        $group->GroupNameArabic = $validatedData['GroupNameArabic'];
        $group->GroupNameEnglish = $validatedData['GroupNameEnglish'];
        $group->Ranking = $validatedData['Ranking'];
        $group->IsActive = $request->input('IsActive', false);
        $group->save();

        return redirect()->route('groups.index');
    }

    public function destroy($id)
    {
        $group = Group::findOrFail($id);
        $group->delete();

        return redirect()->route('groups.index');
    }
    
}
