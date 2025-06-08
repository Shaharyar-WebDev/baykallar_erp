@props([
  'class' => ''
])
<div style="
    overflow-x: auto;
    min-height: 60vh;
">
<table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700 {{ $class }}">
  <thead class="bg-gray-50 dark:bg-neutral-700">
    <tr class="dark:text-white">
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