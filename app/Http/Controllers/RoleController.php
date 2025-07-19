<?php
namespace App\Http\Controllers;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RoleController extends Controller
{
    public function index()
    {
        $users = User::select('id', 'name', 'email')->with('roles')->get()
            ->map(function ($user) {
                $user->role = $user->roles->pluck('name')->first() ?? '—';
                return $user;
            });

        $roles = Role::pluck('name');

        return Inertia::render('Role/Index', [
            'users' => $users,
            'roles' => $roles
        ]);
    }

    public function assign(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'role' => 'required|exists:roles,name',
        ]);

        $user = User::findOrFail($request->user_id);
        $user->syncRoles([$request->role]);

        return back()->with('success', 'Role updated!');
    }
}
