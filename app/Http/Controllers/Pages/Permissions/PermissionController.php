<?php

namespace App\Http\Controllers\Pages\Permissions;

use Exception;
use App\Helpers\Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Illuminate\Validation\ValidationException;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        try {

            $per_page = 5;

            $validated = $request->validate([
                'search' => ['nullable', 'string', 'max:255'],
                'sort' => ['nullable', 'in:name,created_at'],
                'direction' => ['nullable', 'in:asc,desc'],
                'per_page' => ['nullable', 'integer', 'min:1', 'max:100'],
            ]);

            $per_page = $validated['per_page'] ?? $per_page;

            $query = Permission::query();

            if ($validated['search'] ?? false) {
                $query->where(function ($q) use ($validated) {
                    $q->where('name', 'like', '%' . $validated['search'] . '%')
                        ->orWhere('created_at', 'like', '%' . $validated['search'] . '%');
                });
            }

            if (($validated['sort'] ?? false) && ($validated['direction'] ?? false)) {
                $query->orderBy($validated['sort'], $validated['direction']);
            }

            $permissions = $query->paginate($per_page)->withQueryString();

            return view('pages.permissions.index', compact('permissions'));
        } catch (ValidationException $e) {

            Flash::error($e->getMessage());
            return back();
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            $validated_data = $request->validate([
                'permission_name' => 'required|string|max:255',
            ]);

            DB::beginTransaction();

            Permission::create([
                'name' => $validated_data['permission_name'],
            ]);

            DB::commit();

            Flash::success(__('permissions.permission_created_successfully'));

            return back();
        } catch (Exception | ValidationException $e) {
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        try {
            $validated_data = $request->validate([
                'permission_name' => 'required|string|max:255|unique:permissions,name,' . $id,
            ]);

            DB::beginTransaction();

            $permission = Permission::findOrFail($id);

            $permission->update([
                'name' => $validated_data['permission_name'],
            ]);


            DB::commit();

            Flash::success(__('permissions.permission_updated_successfully'));

            return back();
        } catch (Exception | ValidationException $e) {
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

            Permission::destroy($id);

            DB::commit();

            Flash::success(__('permissions.permission_deleted_successfully'));

            return back();
        } catch (Exception $e) {
            Flash::error($e->getMessage());
            return back();
        }
    }
}
