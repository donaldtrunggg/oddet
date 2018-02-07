<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

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
}
