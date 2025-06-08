<?php

namespace App\Livewire\Tables;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
class PermissionTable extends Component
{
    use WithPagination;

    public $sortBy = 'created_at';
    private $allowed_columns = [
        'id', 'name', 'created_at'
    ];

    public function updatedSortBy()
    {
        // dd($this->sortBy);
    }

    public function render()
    {
        
        $rows = Permission::query()
            ->orderBy($this->sortBy, 'desc')
            ->paginate(5);

        return view('livewire.tables.permission-table', [
            'rows' => $rows,
        ]);
    }

    public function sortBy($column){
        dd($column);
        $this->sortBy = $column;
    }
}
