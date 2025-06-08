<?php

namespace App\Http\Controllers\Pages\Role;

use App\Helpers\Flash;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $roles = Role::with(['permissions'])->select(['id','name','created_at'])->get();
        return view('pages.roles.index', [
            'roles' => $roles,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $permissions = Permission::select(['id','name'])->get();
        return view('pages.roles.create', [
            'permissions' => $permissions,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // return $request;
       $request->merge([
        'permissions' => $request->input('permissions', [])
       ]);

        $validated_data = $request->validate([
            'role_name' => 'required|string|min:3|max:255|unique:roles,name',
            'permissions' => 'array|min:1',
            'permissions.*' => 'exists:permissions,name',
        ]);

        try {

            DB::beginTransaction();

            $role = Role::create([
                'name' => $validated_data['role_name'],
            ]);

            $role->syncPermissions($validated_data['permissions']);

            DB::commit();

            Flash::success(__('role.role_created_successfully'));

            return back();
        } catch (Exception $e) {

            Flash::error($e->getMessage());
            return back();
        }
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
        $role = Role::with(['permissions'])->select(['id','name'])->findOrFail($id);
        // dd($role->permissions);
        return view('pages.roles.edit', [
            'role' => $role,
            'permissions' => Permission::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
            $request->merge([
        'permissions' => $request->input('permissions', [])
       ]);

        $validated_data = $request->validate([
            'role_name' => 'required|string|min:3|max:255|unique:roles,name,'.$id,
            'permissions' => 'array|min:1',
            'permissions.*' => 'exists:permissions,name',
        ]);

        try {

            DB::beginTransaction();

            $role = Role::findOrFail($id);

            $role->syncPermissions($validated_data['permissions']);

            DB::commit();

            Flash::success(__('role.role_updated_successfully'));

            return back();
        } catch (Exception $e) {

            Flash::error($e->getMessage());
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
         try {

            DB::beginTransaction();

            Role::destroy($id);

            DB::commit();

            Flash::success(__('role.role_deleted_successfully'));

            return back();
        } catch (Exception $e) {
            Flash::error($e->getMessage());
            return back();
        }
    }
}
