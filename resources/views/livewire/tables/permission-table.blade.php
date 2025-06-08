<div>
    <!-- Table -->
    <div class="w-full">
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            <div class="px-6 py-4 border-r border-gray-200 dark:border-neutral-700">
                <select wire:model.live="sortBy"
                    class="py-3 px-4 pe-9 block w-full border-gray-200 rounded-full text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                    <option selected="" class="hidden">Sort By</option>
                    <option value="id">Id</option>
                    <option value="name">Name</option>
                    <option value="created_at">Created At</option>
                </select>
            </div>
        </div>
    </div>
    <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
        <thead class="bg-gray-50 dark:bg-neutral-800">
            <tr>
                <th class="ps-6 py-3 text-start"><input type="checkbox" class="..."></th>
                <th class="ps-6 flex justify-between items-center lg:ps-3 xl:ps-0 pe-6 py-3 text-start">
                    <span class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">
                        {{ __('permissions.col_number') }}
                    </span>
                    <button wire:click="sortBy('id')">
                        <x-dashboard.components.table.chevron-down />
                    </button>
                </th>
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
            @foreach ($rows as $row)
                <tr>
                    <td class="ps-6 py-3 dark:text-white"><input type="checkbox" class=""></td>
                    <td class="px-6 py-3 dark:text-white">{{ $row->id }}</td>
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
    <!-- End Table -->

    <!-- Footer -->
    <div class="px-6 py-4 border-t border-gray-200 dark:border-neutral-700">
        <div>
            {{ $rows->links('pagination::tailwind') }}
        </div>
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

    @push('scripts')

        <script>
            const openUpdateModal = (formId, route, permissionName) => {
                let updateModalForm = document.getElementById(`${formId}-form`);
                updateModalForm.setAttribute('action', route);
                updateModalForm.querySelector('input[name="permission_name"]').value = permissionName;
            }

            const openDeleteModal = (formId, route) => {
                let deleteModalForm = document.getElementById(`${formId}-form`);
                deleteModalForm.setAttribute('action', route);
            }
        </script>
    @endpush
</div>
