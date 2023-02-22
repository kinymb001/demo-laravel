<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;
use App\Jobs\ExcelsJob;
use App\Exports\TagsExport;
use App\Exports\CategoriesExport;
use Illuminate\Support\Carbon;

class ExportController extends Controller
{

    public $excel;

    public function __construct(Excel $excel)
    {
        $this->excel = $excel;
    }

    public function exportTags()
    {
        return $this->excel->download(new TagsExport(), 'tags-' . Carbon::now() . '.xlsx');
    }

    public function exportCategories()
    {
        return $this->excel->download(new CategoriesExport(), 'categories-' . Carbon::now() . '.xlsx');
    }

}