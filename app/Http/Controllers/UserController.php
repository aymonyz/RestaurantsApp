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
public function index()
{
    // جلب جميع المستخدمين من قاعدة البيانات
    $users = User::all();

    // تمرير المستخدمين إلى العرض
    return view('users.index', compact('users'));
}
public function edit(User $user) // استخدام Laravel Route Model Binding
{
    // تمرير المستخدم إلى العرض لإمكانية تحريره
    return view('users.edit', compact('user'));
}

public function update(Request $request, $id)
{
    // تحقق من البيانات الواردة
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . $id,
        'password' => 'sometimes|nullable|string|min:8',
    ]);

    // جلب المستخدم من قاعدة البيانات
    $user = User::findOrFail($id);

    // تحديث البيانات
    $user->update([
        'name' => $request->name,
        'email' => $request->email,
        // تحديث كلمة المرور فقط إذا تم تقديمها
        'password' => $request->filled('password') ? Hash::make($request->password) : $user->password,
    ]);

    // إعادة توجيه الطلب مع رسالة نجاح
    return redirect()->route('users.index')->with('success', 'تم تحديث بيانات المستخدم بنجاح.');
}
public function destroy($id)
{
    $user = User::findOrFail($id);
    $user->delete();

    return redirect()->route('users.index')->with('success', 'تم حذف المستخدم بنجاح.');
}
}
