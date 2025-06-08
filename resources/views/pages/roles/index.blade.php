@extends('layouts.dashboard')

@section('title', 'Roles')

@push('breadcrumbs')
    <x-dashboard.breadcrumbs :breadcrumbs="[
            'Dashboard' => route('home.index'),
            'Roles' => route('roles.index'),
        ]" />
@endpush

@section('content')

<!-- Table Section -->
<div class="max-w-[85rem] md:px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
  <!-- Card -->
  <div class="flex flex-col">
    <div class="-m-1.5">
      <div class="p-1.5 align-middle">
        <div class="bg-white border border-gray-200 rounded-xl shadow-2xs overflow-hidden dark:bg-neutral-800 dark:border-neutral-700">
          <!-- Header -->
          @php
              $buttons =  [[
            "tag" => "a",
            "href" => route("roles.create", ['prev' => request()->fullUrl()]),
            "icon" => '<svg xmlns="http://www.w3.org/2000/svg" class="size-4" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus-icon lucide-plus"><path d="M5 12h14"/><path d="M12 5v14"/></svg>',
            "text" => __('Create'),
        ]]
          @endphp
          <x-dashboard.components.table.table-header title="{{__('role.manage_roles')}}" description=""
          :buttons="$buttons"
          />
          <!-- End Header -->
          <!-- Table -->
          @php
              $th_names = [
                'Id', 'Name', 'Permissions', 'Created At', 'Actions'
              ];
          @endphp
          <x-dashboard.tables.roles.roles-table>
            <x-slot name="header">
                @foreach ($th_names as $name)
                    <th class="px-6 py-3 text-start">
                        {{ ucfirst($name) }}
                    </th>
                @endforeach
            </x-slot>
            <x-slot name="body">
                @foreach ($roles as $role)
                    <tr style="height: 100px; max-height: auto;">
                        <td class="px-6 py-3 dark:text-white">{{$role->id}}</td>
                        <td class="px-6 py-3 dark:text-white">{{$role->name}}</td>
                        <td class="px-6 py-3 dark:text-white">
                            @foreach ($role->permissions as $permission)
        <span class="inline-block bg-gray-200 text-sm px-2 py-1 rounded mr-1 mb-1 dark:bg-neutral-900">
            {{ $permission->name }}
        </span>
    @endforeach
                        </td>
                        <td class="px-6 py-3 dark:text-white">{{$role->created_at}}</td>
                        <td class="px-6 py-3 dark:text-white">
                            <x-dashboard.components.dropdown.dropdown
                            class="inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700 p-1"
                            id="{{$role->id}}">
                            <x-slot:button
                            >
                                 <svg xmlns="http://www.w3.org/2000/svg" class="size-4" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-ellipsis-vertical-icon lucide-ellipsis-vertical"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
                            </x-slot:button>
                                <x-slot:links>
                                    <x-dashboard.components.dropdown.dropdown-link
                                        title="{{ __('Edit') }}"
                                        class="flex items-center max-w-auto justify-start gap-x-2 p-2 rounded-lg text-sm w-32 text-gray-800 dark:text-white hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700"
                                        href="{{ route('roles.edit', ['role' => $role->id, 'prev' => request()->fullUrl()]) }}"
                                        icon='<svg xmlns="http://www.w3.org/2000/svg" class="size-4" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pencil-icon lucide-pencil"><path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/><path d="m15 5 4 4"/></svg>'
                                        />
                                       <x-dashboard.components.modal-btn modalId="delete-role-modal"
                            class="flex items-center max-w-auto justify-start gap-x-2 p-2 rounded-lg text-sm w-32 text-gray-800 hover:bg-red-200 hover:text-red-700 focus:outline-hidden focus:bg-red-100 dark:text-white"
                            onclick="openDeleteModal(`delete-role-modal`, `{{route('roles.destroy', $role->id)}}`)">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash2-icon lucide-trash-2"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/><line x1="10" x2="10" y1="11" y2="17"/><line x1="14" x2="14" y1="11" y2="17"/></svg>
                            {{__('role.delete_role')}}
                        </x-dashboard.components.modal-btn>
                                </x-slot:links>
                            </x-dashboard.components.dropdown.dropdown>
                        </td>
                    </tr>
                @endforeach
            </x-slot>
          </x-dashboard.tables.roles.roles-table>
          <!-- End Footer and Table -->
         
        </div>
      </div>
    </div>
  </div>
  <!-- End Card -->
</div>
<!-- End Table Section -->

<x-dashboard.components.modal modalId="delete-role-modal" modalTitle="Delete Role"
        action="" method="DELETE" submitButtonText="{{__('actions.delete')}}" submitBtnBg="bg-red-600 hover:bg-red-700 focus:bg-red-700">
        <div>
            <div class="relative">
                <span class="dark:text-white">
                   {{__('role.confirm_delete_role')}}
                </span>
            </div>
        </div>
</x-dashboard.components.modal>
  

@endsection

@once
@push('scripts')

@endpush
@endonce