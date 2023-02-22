<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use App\Models\Article;
use App\Models\Tag;
use Illuminate\Http\Response;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Mail\ForgotPassword;
use Illuminate\Support\Facades\Mail;
use App\Jobs\SendEmailJob;
use Carbon\Carbon;
use App\Events\LockAccUser;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        // Article::addAllToIndex();
        // if($request->has('search')){
        // $results= Article::searchByQuery(['match' => ['name' => $request->search]]);
        // $results = Article::search($request->search);
        // dd($results);
        // }

        $posts = Article::with(["user", "category"])->latest()->take(5)->get();

        return view('client.home.index', [
            "posts" => $posts,
        ]);
    }

    public function create(Request $request)
    {
        // Article::addAllToIndex();
        $data = [];
        if ($request->has('search')) {
            $data = Article::searchByQuery(['match' => ['name' => $request->search]]);
            // dd($data);
        }
        // $a = User::find(9);
        // event(new LockAccUser("hello abc cao van sơn", $a));
        // broadcast(new LockAccUser("123 4546", $a))->toOthers();

        return view("client.search.index", ["data" => $data]);
    }

    public function show($slug)
    {
        $post = Article::with(["user", "category", "tags"])->whereSlug($slug)->first();
        $post->update([
            "view" => $post->view += 1,
        ]);
        // $posts = Article::with(["user", "category"])->latest()->take(5)->get();
        $post_same = Article::with(["user", "category"])->where("category_id", "=", $post->category_id)->latest()->take(10)->get();

        return view('client.blogs.index', [
            "post" => $post,
            // "posts" => $posts,
            "post_same" => $post_same,
        ]);
    }

    public function changeLanguage($language)
    {
        \Session::put('website_language', $language);

        return redirect()->back();
    }

    public function refresh()
    {

        Artisan::call('cache:clear');
        Artisan::call('route:cache');
        Artisan::call('route:clear');
        Artisan::call('view:clear');
        Artisan::call('config:cache');
        Artisan::call('config:clear');

        return redirect()->back();
    }

    public function email($slug)
    {
        $name = new SendEmailJob($slug . " cao sơn");
        dispatch($name);

        return redirect()->back();
    }
}
