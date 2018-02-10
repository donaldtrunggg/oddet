<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategoryController extends Controller
{
    public function index($lang)
    {
        config(['app.locale' => $lang]);

        $page = 0;

        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        }

        if (isset($_GET['q'])) {
            $posts = DB::table('posts')
                ->join('posts_lang', 'posts.slug', '=', 'posts_lang.slug')
                ->where('posts_lang.lang', $lang)
                ->where('posts_lang.title', 'like', '%' . $_GET['q'] . '%')
                ->skip($page * 5)->take(5)
                ->get();
        } else {
            $posts = DB::table('posts')
                ->join('posts_lang', 'posts.slug', '=', 'posts_lang.slug')
                ->where('posts_lang.lang', $lang)->skip($page * 5)->take(5)
                ->get();
        }

        return view('index', ['posts' => $posts, 'page' => $page, 'dataFooter' => $this->getFooter()]);
    }

    public function category($lang, $category)
    {
        config(['app.locale' => $lang]);

        $page = 0;
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        }

        if (isset($_GET['q'])) {
            $posts = DB::table('posts')
                ->join('posts_lang', 'posts.slug', '=', 'posts_lang.slug')
                ->where('posts.cat_slug', $category)
                ->where('posts_lang.lang', $lang)
                ->where('posts_lang.title', 'like', '%' . $_GET['q'] . '%')
                ->skip($page * 5)->take(5)
                ->get();
        } else {
            $posts = DB::table('posts')
                ->join('posts_lang', 'posts.slug', '=', 'posts_lang.slug')
                ->where('posts.cat_slug', $category)
                ->where('posts_lang.lang', $lang)->skip($page * 5)->take(5)
                ->get();
        }
        return view('index', ['posts' => $posts, 'page' => $page, 'dataFooter' => $this->getFooter()]);
    }

    // SEND MAIL
    public function saveMailSubcrible()
    {
        $email = $_POST['email'];
        $create_date = Carbon::now();

        $status = 0; // cannot save

        if(!$this->getByEmail($email)) {
            DB::table('subcrible')->insert([
                'mail' => $email,
                'lang' => config('app.locale'),
                'create_date' => $create_date
            ]);

            $status = 1; // Success
        }
        else {
            $status = 2; // Already Exist
        }

        echo $status;
    }

    public function getByEmail($email)
    {
        return DB::table('subcrible')
            ->where('mail', $email)
            ->first();
    }
}
