<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }

    public function store(Request $request)
    {
        Role::create(['name' => $request->name]);
        return redirect()->route('roles.index');
    }

    public function edit(Role $role)
    {
        return view('roles.edit', compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        $role->update(['name' => $request->name]);
        return redirect()->route('roles.index');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('roles.index');
    }
    public function run()
{
    // إنشاء الأدوار
    $adminRole = Role::create(['name' => 'admin']);
    $staffRole = Role::create(['name' => 'staff']);
    $customerRole = Role::create(['name' => 'customer']);

    // إنشاء الصلاحيات
    $permissions = [
        'view_laundry',
        'edit_laundry',
        'create_invoice',
        'view_report',
        // أضف المزيد حسب الحاجة
    ];

    foreach ($permissions as $permission) {
        Permission::create(['name' => $permission]);
    }

    // تعيين الصلاحيات للأدوار
    $adminRole->givePermissionTo(Permission::all());
    // يمكنك تعديل الصلاحيات لكل دور حسب الحاجة
}
public function showUsers() {
    $users = User::all(); // أو أي استعلام آخر لجلب المستخدمين
    return view('forgot', compact('users'));
}

}
