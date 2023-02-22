<?php

namespace App\Traits;

use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

trait LivewireAble
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $name = '';
    protected $data;
    protected $model;
    public $sortBy = 'id';
    public $sortDirection = 'desc';
    public $sortAscending = true;
    public $loading = false;
    public $selectedIds = [];

    public function load()
    {
        session()->flash('success', __("messages.reload_success"));

        return redirect(request()->header('Referer'));
    }

    public function sortBy($field)
    {
        if ($this->sortBy === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
            $this->sortAscending = !$this->sortAscending;
        } else {
            $this->sortBy = $field;
            $this->sortDirection = 'asc';
            $this->sortAscending = true;
        }
    }

    public function delete()
    {
        if (!$this->selectedIds) {
            session()->flash('alert_primary', __("messages.please_select_one"));
        } else {
            try {
                DB::beginTransaction();
                $this->model->whereIn('id', $this->selectedIds)->delete();
                $this->selectedIds = [];

                session()->flash('alert_danger', __("messages.delete_success"));
                DB::commit();
            } catch (\Throwable $th) {
                DB::rollBack();

                session()->flash('alert_danger', __("messages.delete_fail"));
            }
        }
    }
}
