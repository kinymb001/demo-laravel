<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Tag;
use App\Models\Category;
use App\Models\Article;

class TruncateController extends Controller
{
    public function __construct()
    {
        $this->middleware("CheckPassword");
    }

    public function resetTags(Request $request)
    {
        try {
            DB::statement('SET FOREIGN_KEY_CHECKS=0');

            Tag::truncate();

            session()->flash('success', __("messages.reset_success"));
        } catch (\Throwable $th) {

            session()->flash('error', __("messages.reset_fail", ["messages" => $th->getMessage()]));
        }

        return redirect()->back();
    }

    public function resetCategories(Request $request)
    {
        try {
            DB::statement('SET FOREIGN_KEY_CHECKS=0');

            Category::truncate();

            session()->flash('success', __("messages.reset_success"));
        } catch (\Throwable $th) {

            session()->flash('error', __("messages.reset_fail", ["messages" => $th->getMessage()]));
        }

        return redirect()->back();
    }

    public function resetrtArticles(Request $request)
    {
        try {
            DB::statement('SET FOREIGN_KEY_CHECKS=0');

            Article::truncate();

            session()->flash('success', __("messages.reset_success"));
        } catch (\Throwable $th) {

            session()->flash('error', __("messages.reset_fail", ["messages" => $th->getMessage()]));
        }

        return redirect()->back();
    }

}