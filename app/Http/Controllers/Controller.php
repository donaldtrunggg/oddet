<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getFooter() {
        $data = DB::table('instagram')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->select('year', 'month')->distinct()->get();

        return $data;
    }
}
