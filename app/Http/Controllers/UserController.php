<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function store(Request $request)
{
    // التحقق من البريد الإلكتروني
    //dd($request->all());
    $existingUser = User::where('email', $request->email)->first();
    if ($existingUser) {
        return back()->withErrors(['email' => 'البريد الإلكتروني مستخدم بالفعل'])->withInput();
    }

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    // تحقق من وجود الصفحات في الطلب وتعيين الصلاحيات
   // تحقق من وجود الصفحات في الطلب وتعيين الصلاحيات
if ($request->has('pages')) {
    foreach ($request->pages as $page) {
        $permission = Permission::findOrCreate($page);
        $user->givePermissionTo($permission);

        // Debugging: Check if the permission is being processed.
        Log::info("Assigning permission: " . $permission->name);
    }
}


    return back()->with('success', 'تم إضافة المستخدم بنجاح');

}

}
