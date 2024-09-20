<?php

namespace App\Http\Controllers;

use App\Http\Requests\Roles\StoreRoleRequest;
use App\Http\Requests\Roles\UpdateRoleRequest;
use Illuminate\Http\Request;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $roles = Role::orderBy('name', "ASC")->paginate(5);
        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::orderBy('name', "ASC")->get();
        return view('roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoleRequest $request)
    {
        // Create the role
        $role = Role::create(['name' => $request->name]);

        // If permissions are provided, assign them to the role
        if (!empty($request->permission)) {
            foreach ($request->permission as $name) {
                $role->givePermissionTo($name);
            }
        }
        toast('Role created successfully.', 'success');
        // Redirect to the roles index with a success message
        return redirect()->route('roles.index');
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
    public function edit(Role $role)
    {
        $role = Role::findOrFail($role->id);
        $permissions = Permission::orderBy('name', 'ASC')->get();
        $hasPermissions = $role->permissions->pluck('name')->toArray();
        return view('roles.edit', compact('role', 'permissions', 'hasPermissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        $role = Role::findorFail($role->id);
        $role->update(['name' => $request->name]);

        // If permissions are provided, assign them to the role
        if (!empty($request->permission)) {
            $role->syncPermissions($request->permission); // Syncs the provided permissions with the role
        } else {
            // If no permissions are provided, remove all permissions
            $role->syncPermissions([]);
        }
        toast('Role created successfully.', 'success');
        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role = Role::findorFail($role->id);
        if ($role === null) {
            return false;
        }
        $role->delete();
        alert('Role deleted successfully', 'success');
        return back();
    }
}
