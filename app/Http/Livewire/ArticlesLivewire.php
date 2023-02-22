<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Article;
use App\Traits\LivewireAble;

class ArticlesLivewire extends Component
{
    use LivewireAble;

    public $selectedCategory = '';
    public $selectedTag = '';
    public $table = "articles.";

    public function __construct()
    {
        $this->model = new Article;
        $this->sortBy = $this->table . $this->sortBy;
    }

    public function selectedTag($selectedTag)
    {
        $this->selectedTag = $selectedTag;
    }

    protected $listeners = ['postAdded' => 'selectedTag'];

    public function isChecked($id)
    {
        $data = Article::find($id);
        if ($data->checked) {
            $bool = 0;
        } else {
            $bool = 1;
        }
        $data->update([
            "checked" => $bool,
        ]);

        session()->flash('alert_success', __("messages.checked_success"));
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

        $test = array_map(function ($item) {
            return $this->table . $item;
        }, $this->model->getTableColumns());

        $this->data = $this->model->where($this->table . 'name', 'like', '%' . $this->name . '%')
            ->select($test)
            ->with(["user", "category"])
            ->when($this->selectedCategory != '', function ($q) {
                return $q->where('category_id', '=', $this->selectedCategory);
            })
            ->when($this->selectedTag != '', function ($q) {
                return $q->whereHas('tags', function ($tag) {
                    $tag->where('tags.id', '=', $this->selectedTag);
                });
            })
            ->join('users', $this->table . 'user_id', '=', 'users.id')
            ->join('categories', $this->table . 'category_id', '=', 'categories.id')
            // ->with(["user", "category"])
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(10);
        $this->loading = false;
        // dd($this->data);
        return view('livewire.articles-livewire', ["data" => $this->data]);
    }
}
