<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PhpParser\Node\Expr\Cast\Object_;

class InstagramController extends Controller
{
    public function index($lang)
    {
        config(['app.locale' => $lang]);

        $client_id = env('INSTAGRAM_CLIEN_ID', '');
        $client_secret = env('INSTAGRAM_CLIEN_SECRET', '');
        $callback = env('INSTAGRAM_REDIRECT_URL', '');

        $url = 'https://www.instagram.com/oauth/authorize/?client_id=' . $client_id . '&redirect_uri=' . $callback . '&response_type=token';

        $url = env('INSTAGRAM_STRING_CONNECT');
//        $url = 'https://api.instagram.com/v1/users/self/media/recent/?access_token=2207028252.6dd3f5d.8ee1b837794843389924fb27561c3fb2';
        $json = file_get_contents($url);
        $obj = json_decode($json);
        $list = $obj->data;

        foreach ($list as $item) {
            $num_like = $item->likes->count;

            if (!$this->getByIdIns($item->id)) {
                $year = date('Y', $item->created_time);
                $month = date('m', $item->created_time);
                $day = date('d', $item->created_time);
                $date = $day . '/' . $month . '/' . $year;

                $this->insertInstagramDB($item->images->standard_resolution->url, $item->link, $date, $num_like, $item->id);
            } else {
                $this->updateLikeNumber($item->id, $num_like);
            }
        }

        $data = $this->getAll();

        $firstMonth = null;
        $secondMonth = null;

        if (isset($data[count($data) - 1])) {
            $item = $data[count($data) - 1];
            $firstMonth = DB::table('instagram')
                ->where('year', $item->year)
                ->where('month', $item->month)
                ->get();

            if (isset($data[count($data) - 2])) {
                $item = $data[count($data) - 2];
                $secondMonth = DB::table('instagram')
                    ->where('year', $item->year)
                    ->where('month', $item->month)
                    ->get();
            }
        }

        return view('instagram.index', ['data' => $data, 'dataFooter' => $this->getFooter(), 'firstMonth' => $firstMonth, 'secondMonth' => $secondMonth]);
    }

    public function view($lang)
    {
        config(['app.locale' => $lang]);
        $page = 0;

        if(isset($_GET['page'])) {
            $page = $_GET['page'];
        }

        $data = DB::table('instagram')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->skip($page * 20)->take(20)
            ->get();

        return view('admin.instagram-view', ['data' => $data, 'dataFooter' => $this->getFooter(), 'page' => $page]);
    }

    public function viewByMonth($lang, $monthName, $year)
    {
        config(['app.locale' => $lang]);
        $data = DB::table('instagram')
            ->where('year', $year)
            ->where('monthName', $monthName)
            ->get();

        return view('instagram.view-by-month', ['data' => $data, 'dataFooter' => $this->getFooter()]);
    }

    public function insert($lang)
    {
        config(['app.locale' => $lang]);

        return view('admin.instagram-insert');
    }

    public function update($lang, $id)
    {
        config(['app.locale' => $lang]);
        $data = $this->getById($id);

        return view('admin.instagram-insert', ['data' => $data, 'dataFooter' => $this->getFooter()]);
    }

    public function getAll()
    {
        return DB::table('instagram')
            ->orderBy('year')
            ->orderBy('month')
            ->orderBy('day')
            ->get();
    }

    public function getById($id)
    {
        return DB::table('instagram')
            ->where('id', $id)
            ->first();
    }

    public function getByIdIns($id)
    {
        return DB::table('instagram')
            ->where('idInstagram', $id)
            ->first();
    }

    public function insertInstagramAction()
    {
        $image = $_POST['image'];
        $link = $_POST['link'];
        $date = $_POST['date'];
        $num_like = $_POST['like'];

        $this->insertInstagramDB($image, $link, $date, $num_like);
    }

    public function updateInstagramAction($id)
    {
        $image = $_POST['image'];
        $link = $_POST['link'];
        $date = $_POST['date'];
        $like = $_POST['like'];

        $this->updateInstagramDB($id, $image, $link, $date, $like);

        $url = $_SERVER['HTTP_ORIGIN'] . '/' . config('app.locale') . '/admin/instagram/';
        header("Location: $url");
        die();
    }

    public function updateInstagramDB($id, $image, $link, $date, $like)
    {
        $arrDate = explode("/", $date);

        $monthName = date('F', mktime(0, 0, 0, $arrDate[1], 10));

        DB::table('instagram')
            ->where('id', $id)
            ->update(['image' => $image,
                'link' => $link,
                'day' => $arrDate[0],
                'month' => $arrDate[1],
                'year' => $arrDate[2],
                'monthName' => $monthName,
                'num_like' => $like
            ]);
    }

    public function updateLikeNumber($id, $num_like)
    {
        DB::table('instagram')
            ->where('idInstagram', $id)
            ->update(['num_like' => $num_like
            ]);
    }

    public function insertInstagramDB($image, $link, $date, $num_like, $idIns = '')
    {
        $arrDate = explode("/", $date);
        $create_date = Carbon::now();

        $monthName = date('F', mktime(0, 0, 0, $arrDate[1], 10));

        DB::table('instagram')->insert([
            'idInstagram' => $idIns,
            'image' => $image,
            'link' => $link,
            'day' => $arrDate[0],
            'month' => $arrDate[1],
            'year' => $arrDate[2],
            'create_date' => $create_date,
            'monthName' => $monthName,
            'num_like' => $num_like
        ]);
    }

    public function deleteInstagramDB($id)
    {
        DB::table('instagram')
            ->where('id', $id)
            ->delete();

        $url = $_SERVER['HTTP_HOST'] . '/' . config('app.locale') . '/admin/instagram/';
        header("Location: $url");
        die();
    }
}
