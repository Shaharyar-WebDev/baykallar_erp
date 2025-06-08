@props([
  'class' => ''
])
<div style="
    overflow-x: auto;
">
<table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-800 min-h-[80vh] {{ $class }}"
       style="
           overflow-x: auto;
       ">
  <thead class="bg-gray-50 dark:bg-neutral-800">
    <tr>
      {{-- Column headers slot --}}
      {{ $header }}
    </tr>
  </thead>

  <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
    {{-- Table rows slot --}}
    {{ $body }}
  </tbody>
</table>

<!-- Footer -->
    <div class="inline-flex gap-x-2">
      {{-- Pagination slot --}}
      {{ $pagination ?? '' }}
    </div>
</div>
</div>