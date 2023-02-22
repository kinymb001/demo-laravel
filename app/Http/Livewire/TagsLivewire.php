<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Tag;
use App\Traits\LivewireAble;

class TagsLivewire extends Component
{
    use LivewireAble;

    public function __construct()
    {
        $this->model = new Tag;
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
            ->withCount("articles")
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(10);

        $this->loading = false;
        return view('livewire.tags-livewire', ["data" => $this->data]);
    }
}