<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Traits\LivewireAble;

class CategoriesLivewire extends Component
{
    use LivewireAble;

    public function __construct()
    {
        $this->model = new Category;
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
        
        return view('livewire.categories-livewire',["data" => $this->data]);
    }
}