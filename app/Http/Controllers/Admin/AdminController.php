<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Permission;

class AdminController extends Controller
{
    // Tampilkan halaman pengaturan permission untuk user tertentu
    public function editPermissions($userId)
    {
        $user = User::findOrFail($userId);
        $permissions = Permission::all();

        return view('admin.edit-permissions', compact('user', 'permissions'));
    }

    // Proses update permission untuk user
    public function updatePermissions(Request $request, $userId)
    {
        $user = User::findOrFail($userId);
        $selectedPermissions = $request->input('permissions', []); // array of permission names

        // Sinkronisasi permission
        $user->syncPermissions($selectedPermissions);

        return redirect()->back()->with('success', 'Permissions updated successfully.');
    }
}
