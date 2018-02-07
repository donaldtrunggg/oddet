<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PostController extends Controller
{
    public function __construct()
    {
//        if(!isset($_SESSION['isADMIN']))
//            return view('404');
    }

    public function index($lang, $slug)
    {
        config(['app.locale' => $lang]);

        $post = DB::table('posts')
            ->join('posts_lang', 'posts.slug', '=', 'posts_lang.slug')
            ->where('posts_lang.lang', $lang)
            ->where('posts.slug', $slug)
            ->first();

        $post->slug = $slug;

        $previousUrl= DB::table('posts')->where('id', '<', $post->id)->first();
        $nextUrl = DB::table('posts')->where('id', '>', $post->id)->first();

        return view('post-detail', ['post' => $post, 'preUrl' => @$previousUrl->slug, 'nextUrl' => @$nextUrl->slug, 'dataFooter' => $this->getFooter()]);
    }

    public function insert()
    {
        $lang = 'vi';
        $slug = 'test-url';
        $title = 'test-title';
        $description = 'test-des';
        $cat_slug = 'test-cat';
        $create_date = Carbon::now();

        DB::table('posts')->insert([
            'slug' => $slug,
            'cate_slug' => $cat_slug,
            'create_date' => $create_date
        ]);

        DB::table('posts_lang')->insert([
            'slug' => $slug,
            'lang' => $lang,
            'title' => $title,
            'description' => $description
        ]);
    }
}
