@props([
    'rows' => [],
])

  @php
    $search = request('search');
    $sort = request('sort');
    $direction = request('direction');
@endphp

<form 
    method="GET" 
    action="{{ route('permissions.index') }}" 
    class="px-6 py-4 grid grid-cols-1 md:grid-cols-5 gap-4"
>

 @foreach(request()->except(['search', 'sort', 'direction']) as $key => $value)
        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
    @endforeach


    <input
        id="permission-search"
        name="search"
        type="text"
        value="{{ __($search) }}"
        placeholder="{{ __('Search by name') }}"
        class="w-full py-2 px-3 border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-300"
    />

    <select
        id="permission-sort-field"
        name="sort"
        onchange="this.form.submit()"
        class="w-full py-2 px-3 border border-gray-200 rounded-lg text-sm bg-white focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-300"
    >
        <option value="">{{ __('Sort by...') }}</option>
        <option value="name" {{ $sort === 'name' ? 'selected' : '' }}>{{ __('Name') }}</option>
        <option value="created_at" {{ $sort === 'created_at' ? 'selected' : '' }}>{{ __('Created Date') }}</option>
    </select>

    <select
        id="permission-sort-direction"
        name="direction"
        onchange="this.form.submit()"
        class="w-full py-2 px-3 border border-gray-200 rounded-lg text-sm bg-white focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-300"
    >
        <option value="asc" {{ $direction === 'asc' ? 'selected' : '' }}>{{ __('Ascending') }}</option>
        <option value="desc" {{ $direction === 'desc' ? 'selected' : '' }}>{{ __('Descending') }}</option>
    </select>

    <a href="{{route('permissions.index')}}" type="button" class="text-center py-3 px-4 justify-between inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-gray-800 text-white hover:bg-gray-900 focus:outline-hidden focus:bg-gray-900 disabled:opacity-50 disabled:pointer-events-none dark:bg-white dark:text-neutral-800">
        Reset Filters
        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-rotate-ccw-icon lucide-rotate-ccw"><path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"/><path d="M3 3v5h5"/></svg>
     </a>

     <button type="subbmit" class="text-center py-3 px-4 inline-flex justify-between items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-gray-500 text-white hover:bg-gray-600 focus:outline-hidden focus:bg-gray-600 disabled:opacity-50 disabled:pointer-events-none">
  Search
  <svg xmlns="http://www.w3.org/2000/svg" class="size-4" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search-icon lucide-search"><path d="m21 21-4.34-4.34"/><circle cx="11" cy="11" r="8"/></svg>
</button>

</form>


<div class="overflow-x-auto">
    <!-- Table -->
    <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
        <thead class="bg-gray-50 dark:bg-neutral-800">
            <tr>
                {{-- <th class="ps-6 py-3 text-start">
                    <label for="checkbox">
                        <input type="checkbox" class="...">
                    </label>
                </th> --}}
                <th class="ps-6 flex justify-between items-center lg:ps-3 xl:ps-0 pe-6 py-3 text-start">
                    <span class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">
                        {{ __('permissions.col_number') }}
                    </span>
                </th>
                 {{-- <th class="px-6 py-3 text-start">
                    <span class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">
                        {{ __('permissions.col_id') }}
                    </span>
                </th> --}}
                <th class="px-6 py-3 text-start">
                    <span class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">
                        {{ __('permissions.col_name') }}
                    </span>
                </th>
                <th class="px-6 py-3 text-start">
                    <span class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">
                        {{ __('permissions.col_created_at') }}
                    </span>
                </th>
                <th class="px-6 py-3 text-center">
                    <span class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">
                        {{ __('permissions.col_actions') }}
                    </span>
                </th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
            @php
                $i = 1;
                $i += ($rows->currentPage() - 1) * $rows->perPage();
            @endphp
            @foreach ($rows as $row)
                <tr>
                    {{-- <td class="ps-6 py-3 dark:text-white"><input type="checkbox" id="checkbox" class=""></td> --}}
                    <td class="px-6 py-3 dark:text-white">{{ $i++ }}</td>
                    {{-- <td class="px-6 py-3 dark:text-white">{{ $row->id }}</td> --}}
                    <td class="px-6 py-3 dark:text-white">{{ $row->name }}</td>
                    <td class="px-6 py-3 dark:text-white">{{ $row->created_at->format('d M Y') }}</td>
                    <td class="px-6 py-3 flex justify-center items-center gap-x-2">
                        <x-dashboard.components.modal-btn modalId="update-permission-modal"
                            class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-100 text-blue-800 hover:bg-blue-200 focus:outline-hidden focus:bg-blue-200 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-400 dark:bg-blue-800/30 dark:hover:bg-blue-800/20 dark:focus:bg-blue-800/20"
                            onclick="openUpdateModal(`update-permission-modal`, `{{route('permissions.update', $row->id)}}`, '{{ $row->name }}' )"
                            modalTitle="{{ __('permissions.edit') }}">
                            {{ __('permissions.edit') }}
                        </x-dashboard.components.modal-btn>
                        <x-dashboard.components.modal-btn modalId="delete-permission-modal"
                            class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-red-100 text-red-800 hover:bg-red-200 focus:outline-hidden focus:bg-red-200 disabled:opacity-50 disabled:pointer-events-none dark:text-red-500 dark:bg-red-800/30 dark:hover:bg-red-800/20 dark:focus:bg-red-800/20"
                            onclick="openDeleteModal(`delete-permission-modal`, `{{route('permissions.destroy', $row->id)}}`)"
                            modalTitle="{{ __('permissions.delete') }}">
                            {{__('permissions.delete') }}
                        </x-dashboard.components.modal-btn>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

</div>    
    <!-- End Table -->

    <!-- Footer -->
    <div class="px-6 py-4 border-t border-gray-200 dark:border-neutral-700">
        <div>
            {{ $rows->appends(request()->except('page'))->links('pagination::tailwind')}}
        </div>
        <div class="flex gap-x-5 py-6">
    <!-- Dropdown -->
    
<form 
    method="GET" 
    action="{{ route('permissions.index') }}" 
    class="flex justify-between items-center px-6 py-4 w-full gap-4"
>
 @foreach(request()->except(['per_page']) as $key => $value)
        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
  @endforeach
<label for="per-page" class="flex items-center gap-x-2">
    Per Page
    <select class="w-64 border-gray-200 dark:border-neutral-700" onchange="this.form.submit()" name="per_page" id="per-page">
        <option value="5" {{request('per_page') == 5 ? 'selected' : ''}}>5</option>
        <option value="10" {{request('per_page') == 10 ? 'selected' : ''}}>10</option>
        <option value="15" {{request('per_page') == 15 ? 'selected' : ''}}>15</option>
        <option value="20" {{request('per_page') == 20 ? 'selected' : ''}}>20</option>
    </select>
</label>
    <!-- End Dropdown -->

    <!-- Go To Page -->
    <div class="flex items-center gap-x-2">
      <span class="text-sm text-gray-800 whitespace-nowrap dark:text-white">
        Go to
      </span>
      <input type="number" name="page" class="min-h-8 py-1 px-2.5 block w-12 border-gray-200 rounded-lg text-sm text-center focus:border-blue-500 focus:ring-blue-500 [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" style="-moz-appearance: textfield;">
      <span class="text-sm text-gray-800 whitespace-nowrap dark:text-white">
        page
      </span>
    </div>
    <!-- End Go To Page -->
  </div>
    </form>

        <div>

        </div>
    </div>
    <!-- End Footer -->

    <x-dashboard.components.modal modalId="update-permission-modal" modalTitle="{{ __('permissions.edit') }}" action=""
        method="PUT">
        <div>
            <label for="permission-name-edit"
                class="block text-sm mb-2 dark:text-white">{{ __('permissions.col_name') }}</label>
            <div class="relative">
                <input type="text" id="permission-name-edit" name="permission_name" value=""
                    class="py-2.5 sm:py-3 px-4 block w-full border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-800 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                    required>
            </div>
        </div>
    </x-dashboard.components.modal>

    <x-dashboard.components.modal modalId="delete-permission-modal" modalTitle="{{ __('permissions.delete') }}"
        action="" method="DELETE" submitButtonText="{{ __('actions.delete') }}">
        <div>
            <div class="relative">
                <span class="dark:text-white">
                    {{ __('permissions.confirm_delete_permission') }}
                </span>
            </div>
        </div>
    </x-dashboard.components.modal>

    @once
    @push('scripts')

        <script>
            const openUpdateModal = (formId, route, permissionName) => {
                let updateModalForm = document.getElementById(`${formId}-form`);
                updateModalForm.setAttribute('action', route);
                updateModalForm.querySelector('input[name="permission_name"]').value = permissionName;
        }
        </script>
    @endpush
    @endonce

