<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Traits\LivewireAble;

class UsersLivewire extends Component
{
    use LivewireAble;

    public $selectedRole = '';

    public function __construct()
    {
        $this->model = new User;
    }

    public function submitForm()
    {
        $this->validate([
            'name' => 'required',
        ]);
    }

    public function render()
    {
        $this->loading = true;

        $this->data = $this->model->where('name', 'like', '%' . $this->name . '%')
            ->when($this->selectedRole != '', function ($q) {
                return $q->whereHas('roles', function ($tag) {
                    $tag->where('roles.id', '=', $this->selectedRole);
                });
            })
            ->with("roles")
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(10);

        $this->loading = false;

        return view('livewire.users-livewire', ["data" => $this->data]);
    }
}
